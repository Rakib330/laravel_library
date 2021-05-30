@extends('admin.dashboard')
@section('dash-content')
<div class="dash-cont">
    <div class="dash-quantity">
        <h2>Quantity</h2>
        <div class="quantity-cards">
            <div class="dash-card">
                <span><i class="fas fa-book"></i><h4>{{$available_books}}</h4></span>
                <span><h3>Available Books</h3></span>
            </div>
            <div class="dash-card">
                <span><i class="fas fa-users"></i><h4>{{$all_users}}</h4></span>
                <span><h3>Users</h3></span>
            </div>
            <div class="dash-card">
                <span><i class="fas fa-user-edit"></i><h4>{{$all_authors}}</h4></span>
                <span><h3>Authors</h3></span>
            </div>
            <div class="dash-card">
                <span><i class="fas fa-retweet"></i><h4>{{$all_issues}}</h4></span>
                <span><h3>Running Issues</h3></span>
            </div>
        </div>

    </div>


<!--    <div class="dash-inprocess">
        <h2>All Process's</h2>
        <div class="process-cards">
            <div class="process-card">
                <div class="process-ring">
                    <svg>
                    <circle cx='40' cy='40' r='40'></circle>
                    <circle cx='40' cy='40' r='40'></circle>
                    </svg>
                    <div class="ring-number">
                        <h5>{{$issued_book}}%</h5>
                    </div>
                </div>
                <h3>Issued Book</h3>
            </div>
            <div class="process-card">
                <div class="process-ring">
                    <svg>
                    <circle cx='40' cy='40' r='40'></circle>
                    <circle cx='40' cy='40' r='40'></circle>
                    </svg>
                    <div class="ring-number">
                        <h5>{{$ntrtnd}}%</h5>
                    </div>
                </div>
                <h3>Not Returned Book</h3>
            </div>
            <div class="process-card">
                <div class="process-ring">
                    <svg>
                    <circle cx='40' cy='40' r='40'></circle>
                    <circle cx='40' cy='40' r='40'></circle>
                    </svg>
                    <div class="ring-number">
                        <h5>20%</h5>
                    </div>
                </div>
                <h3>Active User</h3>
            </div>
            <div class="process-card">
                <div class="process-ring">
                    <svg>
                    <circle cx='40' cy='40' r='40'></circle>
                    <circle cx='40' cy='40' r='40'></circle>
                    </svg>
                    <div class="ring-number">
                        <h5>20%</h5>
                    </div>
                </div>
                <h3>Activity</h3>
            </div>
        </div>
    </div>-->
    <div class="dash-chart">
        <h1>AITVET</h1>
    </div>

</div>
@endsection