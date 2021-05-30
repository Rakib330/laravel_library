@extends('admin.dashboard')
@section('dash-content')
<div class="manage">
    <h3>Manage Category</h3>
    <h2 style=" color:green; " >
        <?php
        echo session()->get('imsg');
        session()->put('imsg', '');
        ?>
    </h2>
    <div class="manage-body">
        <table >
            <thead>
            <th>ID</th>
            <th>Name</th>
            <th>About</th>
            <th>Update</th>
            <th>Status</th>
            <th>Delete</th>
            </thead>
            <tbody>
                <?php $a=1; ?>
                @foreach($category as $v_category)
                <tr>
            <form method="POST" action="{{URL::to('update-category'.'/'.$v_category->categoryid)}}">
                @csrf
                <td>{{$a++}}</td>
                <td><input id="categoryname" type="text" name="categoryname" value="{{$v_category->categoryname}}"></td>

                <td><textarea id="categoryinfo" name="categoryinfo">{{$v_category->categoryinfo}}</textarea></td>

                <td><input type="submit" value="Update"></td>

            </form>
                <td>
                    @if($v_category->categorystatus == 1)
                    <a href="{{URL::to('status-2').'/'.'category'.'/'.$v_category->categoryid}}"><button class="b1">Allowed</button></a>
                    @else
                    <a href="{{URL::to('status-1').'/'.'category'.'/'.$v_category->categoryid}}"><button class="b2">Pending</button></a>
                    @endif
                </td>
                <td><a class="delete" href="{{URL::to('delete').'/'.'category'.'/'.$v_category->categoryid}}">X</a></td>
            </tr>
            @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection