@extends('frontend.layouts.master')
@section('content')
<section class="first-bg border-bottom">
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <div class="pt-3 pb-3">
                    <a href="/" class="news-link">Home</a> / 
                    <a href="/members" class="news-link">Members</a> /
                        Search Result
                </div>
            </div>
        </div>
    </div>
</section>

<section class="pt-5 pb-5 first-bg">
    <div class="container">
        <div class="row mb-5">
            @if(isset($searchdata))
                @if($search_count == true)
                    <div class="col-md-12 pb-2">
                        <b> {{$search_count}} </b> 
                            @if($search_count < 2) 
                            result 
                            @else 
                            results 
                            @endif for "{{$searchdata}}"
                    </div>
                    @foreach ($search as $getdata)
                    <div class="col-md-3 col-6 view overlay zoom view overlay p-0">
                        <?php 
                            $replacingname = str_replace(' ', '-', $getdata->mem_name)
                        ?>
                        <a href="/members/{{$getdata->id}}-{{$replacingname}}">
                            <img src="{{asset('/uploads/'. $getdata->mem_photo)}}" class="shadow" width="100%" height="250px" alt="..." title="{{$getdata->mem_name}}">
                            <div class="mask flex-center rgba-black-strong">
                                <p class="white-text">
                                    <svg width="1.8em" height="1.8em" viewBox="0 0 16 16" class="bi bi-plus-circle" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                        <path fill-rule="evenodd" d="M8 3.5a.5.5 0 0 1 .5.5v4a.5.5 0 0 1-.5.5H4a.5.5 0 0 1 0-1h3.5V4a.5.5 0 0 1 .5-.5z"/>
                                        <path fill-rule="evenodd" d="M7.5 8a.5.5 0 0 1 .5-.5h4a.5.5 0 0 1 0 1H8.5V12a.5.5 0 0 1-1 0V8z"/>
                                        <path fill-rule="evenodd" d="M8 15A7 7 0 1 0 8 1a7 7 0 0 0 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z"/>
                                      </svg>
                                </p>
                            </div>
                        </a>
                    </div>
                    @endforeach
                @else
                    <div class="row mx-auto p-5">
                        <div class="col-md-12">
                            <h5>The <span class="aim">{{$searchdata}}</span> was not found. Make sure your text in search. Sorry!</h5>
                        </div>
                    </div>
                @endif
            @endif
        </div>
    </div>
</section>
@endsection