@extends('frontend.layouts.master')
@section('content')
<section class="first-bg border-bottom">
    <div class="container">
        <div class="row">
            <div class="col-md-9">
                <div class="pt-3 pb-3">
                    <a href="/" class="news-link">Home</a> / 
                    Members
                </div>
            </div>
            <div class="col-md-3">
                <form action="{{url('/search/member')}}" method="get" accept-charset="UTF-8" class="ml-auto my-2 w-100" >
                    <div class="input-group">
                    <input type="search" class="form-control" placeholder="Search"  name="search" aria-label="Search">
                    <div class="input-group-append">
                    <button class="btn search-btn" type="submit"  id="button-addon2" title="search">
                        <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-search text-light" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd" d="M10.442 10.442a1 1 0 0 1 1.415 0l3.85 3.85a1 1 0 0 1-1.414 1.415l-3.85-3.85a1 1 0 0 1 0-1.415z"/>
                            <path fill-rule="evenodd" d="M6.5 12a5.5 5.5 0 1 0 0-11 5.5 5.5 0 0 0 0 11zM13 6.5a6.5 6.5 0 1 1-13 0 6.5 6.5 0 0 1 13 0z"/>
                        </svg>
                    </button>
                    </div>
                </div>
              
            </form>
    
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