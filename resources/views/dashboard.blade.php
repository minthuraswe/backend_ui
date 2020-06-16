@extends('layouts.master')
@section('content')
<div class="container">
    <div class="row p-4 mt-2">
        <div class="col-md-3">
            <div class="card text-center shadow-sm">
                <div class="card-body p-4">
                    <a href="/member">
                        <h4 class="card-title text-left">Member</h4>
                    </a>
                    <h5 class="text-right" style="color: #faf6f7a6">
                        @if(3 < $count_mem) 
                            {{$count_mem - 2}}+ 
                        @else 
                            {{$count_mem}} 
                        @endif 
                    </h5> 
                </div> 
            </div>
        </div> 
        <div class="col-md-3">
            <div class="card text-center shadow-sm">
                <div class="card-body-1 p-4">
                    <a href="/post">
                        <h4 class="card-title text-left">Post</h4>
                    </a>
                    <h5 class="text-right" style="color: #faf6f7a6">
                        @if(3 < $count_post) 
                            {{$count_post - 2}}+ 
                        @else 
                            {{$count_post}} 
                        @endif 
                    </h5>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card text-center shadow-sm">
                <div class="card-body-2 p-4">
                    <a href="/activity">
                        <h4 class="card-title text-left">Activity</h4>
                    </a>
                    <h5 class="text-right" style="color: #faf6f7a6">
                        @if(3 < $count_act) 
                            {{$count_act - 2}}+ 
                        @else 
                            {{$count_act}} 
                        @endif 
                    </h5>
                </div>
            </div>
        </div>

        <div class="col-md-3">
            <div class="card text-center shadow-sm">
                <div class="card-body-3 p-4">
                    <a href="/category">
                        <h4 class="card-title text-left">Category</h4>
                    </a>
                    <h5 class="text-right" style="color: #faf6f7a6">
                        @if(3 < $count_cat) 
                            {{$count_cat - 2}}+ 
                        @else 
                            {{$count_cat}} 
                        @endif 
                    </h5>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection



  