@extends('admin.dashboard')
@section('dash-add')
<div class="add">
    <h3>Add Category</h3>
    <h2 style=" color:green; " >
        <?php
        echo session()->get('cmsg');
        session()->put('cmsg', '');
        ?>
    </h2>

    <form method="POST" action="{{URL::to('/save-category')}}">
        @csrf
        <div class="form-box">
            <div class="inputs"><label for="categoryname">CategoryName</label><input id="categoryname" type="text" name="categoryname"></div>
            <div class="inputs"><label for="categoryinfo">categoryinfo</label><textarea id="categoryinfo" name="categoryinfo"></textarea></div>
            <div class="inputs">
                <label for="categorystatus">CategoryStatus</label>
                <select name="categorystatus" id="categorystatus">
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