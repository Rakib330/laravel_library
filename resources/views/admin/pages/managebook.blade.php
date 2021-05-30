@extends('admin.dashboard')
@section('dash-content')
<div class="manage">
    <h3>Manage Book</h3>
    <h2 style=" color:green; " >
        <?php
        echo session()->get('imsg');
        session()->put('imsg', '');
        ?>
    </h2>
    <div class="manage-body">

        <table>
            <thead>
            <th>ID</th>
            <th>Image</th>
            <th>Name</th>
            <th>Author</th>
            <th>Category</th>
            <th>Available</th>
            <th>Price</th>
            <th>SKU</th>
            <th>About</th>
            <th>Status</th>
            <th>Update</th>
            <th>Delete</th>
            </thead>
            <tbody>
                <?php $a=1; ?>
                @foreach($books as $v_books)
                <tr>
            <form name="booksform" method="POST" action="{{URL::to('update-book'.'/'.$v_books->bookid)}}" enctype="multipart/form-data">
                @csrf

                <td>{{$a++}}</td>
                <td><img src="{{$v_books->bookimage}}" alt="bookimage"><input id="image"  type="file" name="bookimage"></td>
                <td><input id="bookname" type="text" name="bookname" value="{{$v_books->bookname}}"></td>
                <td>
                    <select name="authorid" id="authorname">
                        <option selected value="{{$v_books->authorid}}">{{$v_books->authorname}}</option>
                        @foreach($all_author as $v_author)
                        <option value="{{$v_author->authorid}}">{{$v_author->authorname}}</option>
                        @endforeach
                    </select>
                </td>
                <td>
                    <select name="categoryid" id="categoryname">
                        <option selected value="{{$v_books->categoryid}}">{{$v_books->categoryname}}</option>
                        @foreach($all_category as $v_category)
                        <option value="{{$v_category->categoryid}}">{{$v_category->categoryname}}</option>
                        @endforeach
                    </select>
                </td>
                <td><input id="available"  type="number" name="available" value="{{$v_books->available}}"></td>
                <td><input id="bookprice"  type="number" name="bookprice" value="{{$v_books->bookprice}}"></td>
                <td><input id="bookSKU"  type="text" name="bookSKU" value="{{$v_books->bookSKU}}"></td>
                <td>
                    <textarea id="bookinfo" name="bookinfo">{{$v_books->bookinfo}}</textarea>
                </td>

                <td><input type="submit" value="Update"></td>

            </form>
                <td>
                    @if($v_books->bookstatus == 1)
                    <a href="{{URL::to('status-2').'/'.'book'.'/'.$v_books->bookid}}"><button class="b1">Allowed</button></a>
                    @else
                    <a href="{{URL::to('status-1').'/'.'book'.'/'.$v_books->bookid}}"><button class="b2">Pending</button></a>
                    @endif
                </td>
                <td><a class="delete" href="{{URL::to('delete').'/'.'book'.'/'.$v_books->bookid}}">X</a></td>
            </tr>

            @endforeach
            </tbody>
        </table>
    </div>
</div>

@endsection