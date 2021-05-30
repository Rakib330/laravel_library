@extends('admin.dashboard')
@section('dash-add')
<div class="add">
    <h3>Add Book</h3>
    <h2 style=" color:green; " >
        <?php
        echo session()->get('bmsg');
        session()->put('bmsg', '');
        ?>
    </h2>

    <form method="POST" action="{{URL::to('/save-book')}}" enctype="multipart/form-data">
        @csrf
        <div class="form-box">
            <div class="inputs"><label for="bookname">Book Name</label><input id="bookname" type="text" name="bookname"></div>
            <div class="inputs">
                <label for="authorname">Author Name</label>
                <select name="authorid" id="authorname">
                    <option disabled selected>Choose Author</option>
                    @foreach($all_author as $v_author)
                    <option value="{{$v_author->authorid}}">{{$v_author->authorname}}</option>
                    @endforeach
                </select>
            </div>
            <div class="inputs">
                <label for="category">Category Name</label>
                <select name="categoryid" id="category">
                    <option disabled selected>Choose Category</option>
                    @foreach($all_category as $v_category)
                    <option value="{{$v_category->categoryid}}">{{$v_category->categoryname}}</option>
                    @endforeach
                </select>
            </div>


            <div class="inputs"><label for="image">bookimage</label><input id="image"  type="file" name="bookimage"></div>
            <div class="inputs"><label for="available">Available</label><input id="available"  type="number" name="available"></div>
            <div class="inputs"><label for="bookprice">bookprice</label><input id="bookprice"  type="number" name="bookprice"></div>
            <div class="inputs"><label for="bookSKU">bookSKU</label><input id="bookSKU"  type="text" name="bookSKU"></div>
            <div class="inputs"><label for="bookinfo">bookinfo</label><textarea id="bookinfo" name="bookinfo"></textarea></div>
            <div class="inputs">
                <label for="bookstatus">Book Status</label>
                <select name="bookstatus" id="bookstatus">
                    <option value="1">Allow</option>
                    <option value="0">Pending</option>

                </select>
            </div>
        </div>
        <div class="submit-btn"><input type="submit"></div>

    </form>



</div>
@endsection