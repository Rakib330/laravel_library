<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class adminlogin_controller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $this->loged_check();
        return view('admin.login');
    }
    public function loged_check() {
        $data = session()->get('adminid');
        if($data){
            return redirect('dashboard')->send();
        }
        else{
            return;
        }
    }
    public function logindo(Request $request) {
        $logindata = DB::table('tbl_admin')->where('adminemail',$request->adminemail)->where('adminpassword',md5($request->adminpass))->first();
        if($logindata){
            $data = array();
            $data['adminid']=$logindata->adminid;
            $data['adminname']=$logindata->adminname;
            $data['adminimage']=$logindata->adminimage;
            session()->put($data);
            return redirect('/dashboard');
        }else{
            session()->put('loginmsg','your email or password invalid!!!');
            return redirect('/login');
        }
    }
    public function logoutdo() {
        session()->put('adminid','');
        session()->put('adminname','');
        session()->put('adminimage','');
        return redirect('login');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
