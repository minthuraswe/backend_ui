@extends('dashboard')
@section('content')
<section>
    <div class="container">
        <div class="row p-4 mt-2">
            <div class="col-md-3">
                <div class="card text-center shadow-sm">
                    <div class="card-body p-4">
                        <a href="/member"> <h4 class="card-title text-left">Member</h4></a>
                        <h5 class="text-right" style="color: #faf6f7a6">{{$count_mem - 1}}+</h5>
                     </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card text-center shadow-sm">
                    <div class="card-body p-4">
                        <a href="/post"> <h4 class="card-title text-left">Post</h4></a>
                        <h5 class="text-right" style="color: #faf6f7a6">{{$count_post - 1}}+</h5>
                     </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card text-center shadow-sm">
                    <div class="card-body p-4">
                        <a href="/activity"> <h4 class="card-title text-left">Activity</h4></a>
                        <h5 class="text-right" style="color: #faf6f7a6">{{$count_act - 1}}+</h5>
                     </div>
                </div>
            </div>
            
            <div class="col-md-3">
                <div class="card text-center shadow-sm">
                    <div class="card-body p-4">
                       <a href="/category"> <h4 class="card-title text-left">Category</h4></a>
                       <h5 class="text-right" style="color: #faf6f7a6">{{$count_cat - 1}}+</h5>
                    </div>
                    {{-- <div class="card-footer">
                        <a href="/category">Category</a>
                    </div> --}}
                </div>
            </div>
           
        </div>
    </div>
</section>

@endsection


