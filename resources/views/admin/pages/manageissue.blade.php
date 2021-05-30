@extends('admin.dashboard')
@section('dash-content')
<div class="manage">
    <h3>Manage Issue</h3>
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
            <th>Book</th>
            <th>User</th>
            <th>Due</th>
            <th>Issued</th>
            <th>Comment</th>
            <th>Returned</th>
            <th>Status</th>
            <th>Update</th>
            </thead>
            <tbody>
                <?php $a=1; ?>
                @foreach($issue as $v_issue)
                <tr>
            <form method="POST" action="{{URL::to('update-issue'.'/'.$v_issue->issueid)}}">
                @csrf
                <td>{{$a++}}</td>
                <td>
                    @if($v_issue->issuestatus == 1)
                    <select name="bookname" id="Book">
                        <option selected value="{{$v_issue->bookname}}">{{$v_issue->bookname}}</option>
                        @foreach($book as $v_book)
                        <option value="{{$v_book->bookname}}">{{$v_book->bookname}}</option>
                        @endforeach
                    </select>
                    @else
                    {{$v_issue->bookname}}
                    @endif
                </td>
                <td>
                    @if($v_issue->issuestatus == 1)
                    <select name="username" id="user">
                        <option selected value="{{$v_issue->username}}">{{$v_issue->username}}</option>
                        @foreach($user as $v_user)
                        <option value="{{$v_user->username}}">{{$v_user->username}}</option>
                        @endforeach
                    </select>
                    @else
                    {{$v_issue->username}}
                    @endif
                </td>

                <td>
                    @if($v_issue->issuebilling > 0)
                    <input id="issuebilling" type="number" name="issuebilling" value="{{$v_issue->issuebilling}}">
                    @else
                    No Due <input id="issuebilling" type="hidden" name="issuebilling" value="0">
                    @endif
                </td>
                <td>{{date($v_issue->issuedate)}}</td>
                <td>
                    @if($v_issue->issuestatus == 1)
                    <textarea id="issueinfo" name="issueinfo">{{$v_issue->issueinfo}}</textarea>
                    @else
                    {{$v_issue->issueinfo}}
                    @endif
                </td>
                <td>
                    @if($v_issue->issuestatus == 1)
                    <a class="finish" href="{{URL::to('returned-book'.'/'.$v_issue->issueid)}}">Finish</a>
                    @elseif($v_issue->issuestatus >= 2)
                    --X--
                    @else
                    {{date($v_issue->returndate)}}
                    @endif
                </td>
                <td>
                    @if($v_issue->issuestatus == 1)
                    <a href="#"><button class="b1">Process On</button></a>
                    @else
                    <a href="#"><button class="b2">Process Off</button></a>
                    @endif
                </td>
                <td>
                    @if($v_issue->issuestatus == 1)
                    <input type="submit" value="Update">
                    @elseif($v_issue->issuestatus == 2)
                    User Banned
                    @elseif($v_issue->issuestatus == 3)
                    Book Banned
                    @else
                    Returned
                    @endif
                </td>
            </form>
            </tr>
            @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection