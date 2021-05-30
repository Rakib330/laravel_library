@extends('admin.dashboard')
@section('dash-add')
<div class="add">
    <h3>Add Author</h3>
    <h2 style=" color:green; " >
        <?php
        echo session()->get('amsg');
        session()->put('amsg', '');
        ?>
    </h2>

    <form method="POST" action="{{URL::to('/save-author')}}" enctype="multipart/form-data">
        @csrf
        <div class="form-box">
            <div class="inputs"><label for="authorname">Author Name</label><input id="authorname" type="text" name="authorname"></div>
            <div class="inputs"><label for="image">authorimage</label><input id="image"  type="file" name="authorimage"></div>
            <div class="inputs"><label for="authorinfo">authorinfo</label><textarea id="authorinfo" name="authorinfo"></textarea></div>
            <div class="inputs">
                <label for="authorstatus">Author Status</label>
                <select name="authorstatus" id="authorstatus">
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