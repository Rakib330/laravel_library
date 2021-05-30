@extends('admin.dashboard')
@section('dash-add')
<div class="add">
    <h3>Issue Book</h3>
    <h2 style=" color:green; " >
        <?php
        echo session()->get('imsg');
        session()->put('imsg', '');
        ?>
    </h2>

    <form method="POST" action="{{URL::to('/save-issue')}}">
        @csrf
        <div class="form-box">
            <div class="inputs">
                <label for="categoryname">Category</label>
                <select name="categoryid" id="category">
                    <option disabled selected>Choose Category</option>
                    @foreach($category as $v_category)
                    <option value="{{$v_category->categoryid}}">{{$v_category->categoryname}}</option>
                    @endforeach
                </select>
            </div>
            <div class="inputs">
                <label for="Book">Book Name</label>
                <select name="bookid" id="Book">
                    <option disabled selected>Choose Book</option>
                    @foreach($book as $v_book)
                    <option value="{{$v_book->bookid}}">{{$v_book->bookname}}</option>
                    @endforeach
                </select>
            </div>
            <div class="inputs">
                <label for="user">User Name</label>
                <select name="userid" id="user">
                    <option disabled selected>Choose User</option>
                    @foreach($user as $v_user)
                    <option value="{{$v_user->userid}}">{{$v_user->username}}</option>
                    @endforeach
                </select>
            </div>
            <div class="inputs"><label for="issuebilling">Payout</label><input id="issuebilling" type="number" name="issuebilling"></div>
            <div class="inputs"><label for="issueinfo">Comment</label><textarea id="issueinfo" name="issueinfo"></textarea></div>

        </div>
        <div class="submit-btn"><input type="submit"></div>
    </form>

</div>
@endsection