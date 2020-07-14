@extends('frontend.layouts.master')
@section('content')
<section class="first-bg border-bottom">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="pt-3 pb-3">
                    <a href="/index" class="news-link">Home</a> / 
                    <a href="/members" class="news-link">Members</a>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="pt-5 pb-5 first-bg">
    <div class="container">
        <div class="row mb-5">
            @foreach ($member as $get)
            <div class="col-md-4 mb-4">
                <div class="card card-shadow">
                    <img src="{{asset('/uploads/'. $get->mem_photo)}}" class="card-img-top max-height" alt="..." title="{{$get->mem_name}}">
                    <div class="card-body">
                        <h5 class="card-title">{{$get->mem_name}}</h5>
                        <?php 
                        $striptags = strip_tags($get->mem_description);
                        $replacingname = str_replace(' ', '-', $get->mem_name)
                        ?>
                            <p> {{Str::limit($striptags, 80)}} </p>
                        
                        <a href="/members/{{$get->id}}-{{$replacingname}}" type="button" class="btn btn-md my-btn float-right"> Read More </a>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
        <div class="row">
            <div class="col-md-12"><h2>Old Members</h2></div>
            @foreach ($yearofservice as $getyear)
                @if($getyear->start_year < date("Y"))
                <div class="col-md-2 col-6 mb-4">
                    <div class="card">
                        <div class="card-body card-shadow">
                        <a href="/oldmembers/{{$getyear->id}}-{{$getyear->start_year}}-{{$getyear->end_year}}"> {{$getyear->start_year}}-{{$getyear->end_year}} </a>
                        </div>
                    </div>
                </div>
                @endif
            @endforeach
        </div>
    </div>
</section>
@endsection