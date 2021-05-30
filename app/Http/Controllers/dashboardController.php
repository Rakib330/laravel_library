<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class dashboardController extends Controller {

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {
        $this->loged_check();
        $available_books = DB::table('tbl_book')
                ->where('bookstatus', 1)
                ->sum('available');
        $all_users = DB::table('tbl_user')
                ->where('userstatus', 1)
                ->sum('userstatus');
        $all_authors = DB::table('tbl_author')
                ->where('authorstatus', 1)
                ->sum('authorstatus');
        $all_issues = DB::table('tbl_issue')
                ->where('issuestatus', 1)
                ->sum('issuestatus');
        $allm_issues = DB::table('tbl_issue')
                ->where('issuestatus', 0)
                ->where('issuestatus', 2)
                ->where('issuestatus', 3)
                ->sum('issuestatus');
        
        $books = DB::table('tbl_book')->where('bookstatus', 1)->get();
        $users = DB::table('tbl_user')->where('userstatus', 1)->get();
        $issues = DB::table('tbl_issue')->where('issuestatus', 1)->get();
        
        $total_books =$available_books + $all_issues;
        $issued_book = round((100 / $total_books) * $all_issues , 0);
        $ntrtnd = round((100 / $total_books) * $allm_issues , 0);
        
        
        $content = view('admin.pages.dashcontent')
                ->with('available_books', $available_books)
                ->with('all_users', $all_users)
                ->with('all_authors', $all_authors)
                ->with('all_issues', $all_issues)
                ->with('issued_book', $issued_book)
                ->with('ntrtnd', $ntrtnd)
                ->with('books', $books);
        return view('admin.dashboard')->with('dash-content', $content);
        
    }
    public function loged_check(){
        $data = session()->get('adminid');
        if($data){
            return;
        }else{
            return redirect('login')->send();
        }
    }

    public function add_book() {
        $this->loged_check();
        $all_category = DB::table('tbl_category')->where('categorystatus', 1)->get();
        $all_author = DB::table('tbl_author')->where('authorstatus', 1)->get();
        $content1 = view('admin.pages.addbook')
                ->with('all_category', $all_category)
                ->with('all_author', $all_author);

        $all_book = DB::table('tbl_book')
                ->join('tbl_author', 'tbl_book.authorid', 'tbl_author.authorid')
                ->join('tbl_category', 'tbl_book.categoryid', 'tbl_category.categoryid')
                ->orderby('bookid','DESC')
                ->get();
        $content2 = view('admin.pages.managebook')->with('books', $all_book)
                ->with('all_category', $all_category)
                ->with('all_author', $all_author);
        return view('admin.dashboard')
                        ->with('dash-content', $content2)
                        ->with('dash-add', $content1);
    }

    public function add_category() {
        $this->loged_check();
        $content1 = view('admin.pages.addcategory');

        $all_category = DB::table('tbl_category')
                ->get();
        $content2 = view('admin.pages.managecategory')->with('category', $all_category);
        return view('admin.dashboard')
                        ->with('dash-content', $content2)
                        ->with('dash-add', $content1);
    }

    public function add_author() {
        $this->loged_check();
        $content1 = view('admin.pages.addauthor');

        $all_author = DB::table('tbl_author')
                ->get();
        $content2 = view('admin.pages.manageauthor')->with('author', $all_author);
        return view('admin.dashboard')
                        ->with('dash-content', $content2)
                        ->with('dash-add', $content1);
    }

    public function add_user() {
        $this->loged_check();
        $content1 = view('admin.pages.adduser');

        $all_user = DB::table('tbl_user')
                ->get();
        $content2 = view('admin.pages.manageuser')->with('user', $all_user);
        return view('admin.dashboard')
                        ->with('dash-content', $content2)
                        ->with('dash-add', $content1);
    }

    public function add_issue() {
        $this->loged_check();
        $all_issue = DB::table('tbl_issue')->orderBy('issueid','DESC')->get();
        
        $all_books = DB::table('tbl_book')->where('bookstatus', 1)->where('available', '>', 0)->get();
        $all_category = DB::table('tbl_category')->where('categorystatus', 1)->get();
        $all_user = DB::table('tbl_user')->where('userstatus', 1)->get();
        $content1 = view('admin.pages.addissue')
                ->with('book', $all_books)
                ->with('issue', $all_issue)
                ->with('user', $all_user)
                ->with('category', $all_category);

        $content2 = view('admin.pages.manageissue')
                ->with('user', $all_user)
                ->with('book', $all_books)
                ->with('issue', $all_issue);
        return view('admin.dashboard')
                        ->with('dash-content', $content2)
                        ->with('dash-add', $content1);
    }

    public function save_category(Request $request) {
        $data = array();
        $data['categoryname'] = $request->categoryname;
        $data['categoryinfo'] = $request->categoryinfo;
        $data['categorystatus'] = $request->categorystatus;
        DB::table('tbl_category')->insert($data);
        session()->put('cmsg', 'Category Inserted Successfully!!!');
        return redirect('/add-category');
    }

    public function save_author(Request $request) {
        $data = array();
        $data['authorname'] = $request->authorname;
        if ($request->hasFile('authorimage')) {
            $file = $request->file('authorimage');
            $fileName = md5($file->getClientOriginalName() . time()) . "." . $file->getClientOriginalExtension();
            $fileurl = 'public/adminPanel/author_Images/';
            $file->move($fileurl, $fileName);
            $data['authorimage'] = $fileurl . $fileName;
        } else {
            $fileurl = 'public/adminPanel/author_Images/';
            $fileName = "NoImage.png";
            $data['authorimage'] = $fileurl . $fileName;
        }
        $data['authorinfo'] = $request->authorinfo;
        $data['authorstatus'] = $request->authorstatus;
        DB::table('tbl_author')->insert($data);
        session()->put('amsg', 'Author Inserted Successfully!!!');
        return redirect('/add-author');
    }

    public function save_user(Request $request) {
        $data = array();
        $data['username'] = $request->username;
        $data['userroll'] = $request->userroll;
        $data['userdue'] = $request->userdue;
        if ($request->hasFile('userimage')) {
            $file = $request->file('userimage');
            $fileName = md5($file->getClientOriginalName() . time()) . "." . $file->getClientOriginalExtension();
            $fileurl = 'public/adminPanel/user_Images/';
            $file->move($fileurl, $fileName);
            $data['userimage'] = $fileurl . $fileName;
        } else {
            $fileurl = 'public/adminPanel/user_Images/';
            $fileName = "NoImage.png";
            $data['userimage'] = $fileurl . $fileName;
        }
        $data['userinfo'] = $request->userinfo;
        $data['userstatus'] = $request->userstatus;
        DB::table('tbl_user')->insert($data);
        session()->put('umsg', 'User Inserted Successfully!!!');
        return redirect('/add-user');
    }

    public function save_book(Request $request) {
        $data = array();
        $data['bookname'] = $request->bookname;
        $data['authorid'] = $request->authorid;
        $data['categoryid'] = $request->categoryid;
        if ($request->hasFile('bookimage')) {
            $file = $request->file('bookimage');
            $fileName = md5($file->getClientOriginalName() . time()) . "." . $file->getClientOriginalExtension();
            $fileurl = 'public/adminPanel/book_Images/';
            $file->move($fileurl, $fileName);
            $data['bookimage'] = $fileurl . $fileName;
        } else {
            $fileurl = 'public/adminPanel/book_Images/';
            $fileName = "NoImage.png";
            $data['bookimage'] = $fileurl . $fileName;
        }
        $data['available'] = $request->available;
        $data['bookprice'] = $request->bookprice;
        $data['bookSKU'] = $request->bookSKU;
        $data['bookinfo'] = $request->bookinfo;
        $data['bookstatus'] = $request->bookstatus;
        DB::table('tbl_book')->insert($data);
        session()->put('bmsg', 'Book Inserted Successfully!!!');
        return redirect('/add-book');
    }

    public function save_issue(Request $request) {
        $data = array();
        $thebook = DB::table('tbl_book')->where('bookid', $request->bookid)->first();
        $theuser = DB::table('tbl_user')->where('userid', $request->userid)->first();
        $data['bookname'] = $thebook->bookname;
        $data['username'] = $theuser->username;
        $due = $thebook->bookprice - $request->issuebilling;
        $data['issuebilling'] = $due;
        $data['issueinfo'] = $request->issueinfo;
        $data['issuestatus'] = 1;
        DB::table('tbl_issue')->insert($data);
        
        $avaiablity = $thebook->available - 1;
        DB::table('tbl_book')->where('bookid', $request->bookid)->update(array('available' => $avaiablity));
        session()->put('imsg', 'Issue Inserted Successfully!!!');
        return redirect('/add-issue');
    }

    public function update_author(Request $request, $authorid) {
        $authorname = $request->authorname;
        if ($request->hasFile('authorimage')) {
            $file = $request->file('authorimage');
            $fileName = md5($file->getClientOriginalName() . time()) . "." . $file->getClientOriginalExtension();
            $fileurl = 'public/adminPanel/author_Images/';
            $file->move($fileurl, $fileName);
            $authorimage = $fileurl . $fileName;
        } else {
            $dbimage = DB::table('tbl_author')->where('authorid', $authorid)->first();
            $authorimage = $dbimage->authorimage;
        }
        $authorinfo = $request->authorinfo;
        DB::table('tbl_author')->where('authorid', $authorid)
                ->update(array('authorname' => $authorname, 'authorimage' => $authorimage, 'authorinfo' => $authorinfo));
        session()->put('amsg', 'Author Updated Successfully!!!');
        return redirect('/add-author');
    }

    public function update_book(Request $request, $bookid) {
        
        if ($request->hasFile('bookimage')) {
            $file = $request->file('bookimage');
            $fileName = md5($file->getClientOriginalName() . time()) . "." . $file->getClientOriginalExtension();
            $fileurl = 'public/adminPanel/book_Images/';
            $file->move($fileurl, $fileName);
            $bookimage = $fileurl . $fileName;
        } else {
            $dbimage = DB::table('tbl_book')->where('bookid', $bookid)->first();
            $bookimage = $dbimage->bookimage;
        }
        $bookname = $request->bookname;
        $authorid = $request->authorid;
        $categoryid = $request->categoryid;
        $available = $request->available;
        $bookprice = $request->bookprice;
        $bookSKU = $request->bookSKU;
        $bookinfo = $request->bookinfo;
        $data = DB::table('tbl_book')->where('bookid', $bookid)
                ->update(array('bookimage' => $bookimage,
            'bookname' => $bookname,
            'authorid' => $authorid,
            'categoryid' => $categoryid,
            'available' => $available,
            'bookprice' => $bookprice,
            'bookSKU' => $bookSKU,
            'bookinfo' => $bookinfo));
        session()->put('amsg', 'Author Updated Successfully!!!');
        return redirect('/add-book');
    }

    public function update_category(Request $request, $categoryid) {
        $categoryname = $request->categoryname;
        $categoryinfo = $request->categoryinfo;
        DB::table('tbl_category')->where('categoryid', $categoryid)
                ->update(array('categoryname' => $categoryname, 'categoryinfo' => $categoryinfo));
        session()->put('amsg', 'Author Updated Successfully!!!');
        return redirect('/add-category');
    }

    public function update_user(Request $request, $userid) {
        $username = $request->username;
        $userroll = $request->userroll;
        $userdue = $request->userdue;
        if ($request->hasFile('userimage')) {
            $file = $request->file('userimage');
            $fileName = md5($file->getClientOriginalName() . time()) . "." . $file->getClientOriginalExtension();
            $fileurl = 'public/adminPanel/user_Images/';
            $file->move($fileurl, $fileName);
            $userimage = $fileurl . $fileName;
        } else {
            $dbimage = DB::table('tbl_user')->where('userid', $userid)->first();
            $userimage = $dbimage->userimage;
        }
        $userinfo = $request->userinfo;
        DB::table('tbl_user')->where('userid', $userid)
                ->update(array('username' => $username,
                    'userroll' => $userroll,
                    'userdue' => $userdue,
                    'userimage' => $userimage,
                    'userinfo' => $userinfo));
        session()->put('amsg', 'Author Updated Successfully!!!');
        return redirect('/add-user');
    }

    public function update_issue(Request $request, $issueid) {
        
        $row_issue = DB::table('tbl_issue')->where('issueid', $issueid)->first();
        $row_book = DB::table('tbl_book')->where('bookname', $row_issue->bookname)->first();
        $available = $row_book->available + 1;
        DB::table('tbl_book')->where('bookname', $row_issue->bookname)
                ->update(array('available' => $available ));
        
        
        
        
        $bookname = $request->bookname;
        $username = $request->username;
        $issuebilling = $request->issuebilling;
        $issueinfo = $request->issueinfo;
        DB::table('tbl_issue')->where('issueid', $issueid)
                ->update(array('bookname' => $bookname, 'username' => $username, 'issuebilling' => $issuebilling, 'issueinfo' => $issueinfo));
        
        $thebook = DB::table('tbl_book')->where('bookname', $request->bookname)->first();
        $avaiablity = $thebook->available - 1;
        DB::table('tbl_book')->where('bookname', $request->bookname)->update(array('available' => $avaiablity));
        
        
        
        session()->put('amsg', 'Author Updated Successfully!!!');
        return redirect('/add-issue');
    }
    
    public function returned_book($issueid) {
        $row_issue = DB::table('tbl_issue')->where('issueid', $issueid)->first();
        $row_book = DB::table('tbl_book')->where('bookname', $row_issue->bookname)->first();
        $row_user = DB::table('tbl_user')->where('username', $row_issue->username)->first();
        
        
        $userdue = $row_user->userdue + $row_issue->issuebilling;
        DB::table('tbl_user')->where('username', $row_issue->username)
                ->update(array('userdue' => $userdue));
        
        $available = $row_book->available + 1;
        DB::table('tbl_book')->where('bookname', $row_issue->bookname)
                ->update(array('available' => $available ));
        
        $returned_date = date('Y-m-d');
        DB::table('tbl_issue')->where('issueid', $issueid)
                ->update(array('issuestatus' => 0,
                    'returndate' => $returned_date,
                    'issuebilling' => 0));
        return redirect('/add-issue');
    }
    
    public function status_2($from, $id) {
        
        DB::table('tbl_'.$from)->where($from.'id', $id)
                ->update(array($from.'status' => 0));
        return redirect('/add-'.$from);
        
    }
    public function status_1($from, $id) {
        
        DB::table('tbl_'.$from)->where($from.'id', $id)
                ->update(array($from.'status' => 1));
        return redirect('/add-'.$from);
        
    }
    
    public function delete($from, $id) {
        if($from == 'user'){
            $d_user = DB::table('tbl_user')->where('userid',$id)->first();
            DB::table('tbl_issue')->where('issuestatus',1)->where('username',$d_user->username)->update(array('issuestatus'=>2));
        }elseif ($from == 'book') {
            $d_book = DB::table('tbl_book')->where('bookid',$id)->first();
            DB::table('tbl_issue')->where('issuestatus',1)->where('bookname',$d_book->bookname)->update(array('issuestatus'=>3));
        }
        
        
        
        DB::table('tbl_'.$from)->where($from.'id', $id)
                ->delete();
        return redirect('/add-'.$from);
        
    }
    

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create() {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request) {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id) {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id) {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id) {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id) {
        //
    }

}
