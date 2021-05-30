@extends('admin.dashboard')
@section('dash-content')
<div class="manage">
    <h3>Manage Author</h3>
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
            <th>About</th>
            <th>Status</th>
            <th>Update</th>
            <th>Delete</th>
            </thead>
            <tbody>
                <?php $a=1; ?>
                @foreach($author as $v_author)
                <tr>
            <form method="POST" action="{{URL::to('update-author'.'/'.$v_author->authorid)}}" enctype="multipart/form-data">
                @csrf

                <td>{{$a++}}</td>
                <td><img src="{{$v_author->authorimage}}" alt="bookimage"><input id="image"  type="file" name="authorimage"></td>
                <td><input id="authorname" type="text" name="authorname" value="{{$v_author->authorname}}"></td>
                <td><textarea id="authorinfo" name="authorinfo">{{$v_author->authorinfo}}</textarea></td>

                <td><input type="submit" value="Update"></td>

            </form>
            <td>
                @if($v_author->authorstatus == 1)
                <a href="{{URL::to('status-2').'/'.'author'.'/'.$v_author->authorid}}"><button class="b1">Allowed</button></a>
                @else
                <a href="{{URL::to('status-1').'/'.'author'.'/'.$v_author->authorid}}"><button class="b2">Pending</button></a>
                @endif
            </td>
            <td><a class="delete" href="{{URL::to('delete').'/'.'author'.'/'.$v_author->authorid}}">X</a></td>
            </tr>
            @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection