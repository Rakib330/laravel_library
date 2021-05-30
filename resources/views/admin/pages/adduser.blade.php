@extends('admin.dashboard')
@section('dash-add')
<div class="add">
    <h3>Add User</h3>
    <h2 style=" color:green; " >
        <?php
        echo session()->get('umsg');
        session()->put('umsg', '');
        ?>
    </h2>

    <form method="POST" action="{{URL::to('/save-user')}}" enctype="multipart/form-data">
        @csrf
        <div class="form-box">
            <div class="inputs"><label for="username">User Name</label><input id="username" type="text" name="username"></div>
            <div class="inputs"><label for="userroll">User Roll</label><input id="userroll" type="number" name="userroll"></div>
            <input id="userdue" type="hidden" name="userdue" value="0">
            <div class="inputs"><label for="image">userimage</label><input id="image"  type="file" name="userimage"></div>
            <div class="inputs"><label for="userinfo">userinfo</label><textarea id="userinfo" name="userinfo"></textarea></div>
            <div class="inputs">
                <label for="userstatus">User Status</label>
                <select name="userstatus" id="userstatus">
                    <option disabled selected>Choose Status</option>
                    <option value="1">Allow</option>
                    <option value="0">Pending</option>
                </select>
            </div>
        </div>
        <div class="submit-btn"><input type="submit"></div>
    </form>

</div>
@endsection