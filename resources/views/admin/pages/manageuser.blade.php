@extends('admin.dashboard')
@section('dash-content')
<div class="manage">
    <h3>Manage User</h3>
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
            <th>Image</th>
            <th>Name</th>
            <th>Roll</th>
            <th>Due</th>
            <th>About</th>
            <th>Status</th>
            <th>Update</th>
            <th>Delete</th>
            </thead>
            <tbody>
                <?php $a=1; ?>
                @foreach($user as $v_user)
                <tr>
            <form method="POST" action="{{URL::to('update-user'.'/'.$v_user->userid)}}" enctype="multipart/form-data">
                @csrf
                <td>{{$a++}}</td>
                <td><img src="{{$v_user->userimage}}" alt="userimage"><input id="image"  type="file" name="userimage"></td>
                <td><input id="username" type="text" name="username" value="{{$v_user->username}}"></td>
                <td><input id="userroll" type="number" name="userroll" value="{{$v_user->userroll}}"></td>
                <td><input id="userdue" type="number" name="userdue" value="{{$v_user->userdue}}"></td>
                <td><textarea id="userinfo" name="userinfo">{{$v_user->userinfo}}</textarea></td>

                <td><input type="submit" value="Update"></td>

            </form>
                <td>
                    @if($v_user->userstatus == 1)
                    <a href="{{URL::to('status-2').'/'.'user'.'/'.$v_user->userid}}"><button class="b1">Allowed</button></a>
                    @else
                    <a href="{{URL::to('status-1').'/'.'user'.'/'.$v_user->userid}}"><button class="b2">Pending</button></a>
                    @endif
                </td>
                <td><a class="delete" href="{{URL::to('delete').'/'.'user'.'/'.$v_user->userid}}">X</a></td>
            </tr>
            @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection