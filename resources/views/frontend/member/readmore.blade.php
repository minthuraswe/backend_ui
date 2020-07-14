@extends('frontend.layouts.master')
@section('content')
@include('frontend.member.route')
<section class="pt-5 pb-5 first-bg">
    <div class="container">
        <div class="row mb-5">
            <div class="col-md-4 mb-2">
                <div class="card">
                    <div class="card-body card-shadow p-1">
                        <img src="{{asset('/uploads/'. $member->mem_photo)}}" class="w-100 max-height" title="{{$member->mem_name}}">
                    </div>
                </div>
            </div>
            
            <div class="col-md-8">
                <div class="card">
                    <div class="card-body card-shadow">
                        <h4>{{$member->mem_name}} | <span class="aim">{{$member->mem_position}}
                        <?php $year = App\Yearofservice::find($member->year_id) ?>
                        <small>({{$year->start_year}}-{{$year->end_year}})</small></span></h4>
                        <p>{!!$member->mem_description!!}</p>
                        <p class="border border-info py-2 px-2">{{$member->mem_university}}</p>
                        <p class="border border-info py-2 px-2">{{$member->mem_email}}</p>
                        <?php 
                            $dateOfBirth = $member->mem_age;
                            $today = date("Y-m-d");
                            $diff = date_diff(date_create($dateOfBirth), date_create($today));
                        ?>
                        <p class="border border-info py-2 px-2"> {{$diff->format('%y') . ' years'}}</p>
                        <p class="border border-info py-2 px-2">{{$member->mem_phone}}</p>
                        @if($member->mem_link == true)
                        <p class="border border-info py-2 px-2">
                            <a href="{{$member->mem_link}}"><img src="{{asset('frontend/images/facebook.png')}}"></a>
                        </p>
                        @endif
                    </div>
                </div>
            </div>
        </div>
        <h2>Other Members</h2>
        <div class="row mt-2">
            @foreach ($mem as $getdata)
            <div class="col-md-2 col-6 view overlay zoom view overlay p-0">
                <?php 
                    $replacingname = str_replace(' ', '-', $getdata->mem_name)
                ?>
                <a href="/members/{{$getdata->id}}-{{$replacingname}}">
                    <img src="{{asset('/uploads/'. $getdata->mem_photo)}}" class="shadow" width="100%" height="150px" alt="..." title="{{$getdata->mem_name}}">
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
        </div>
    </div>
</section>
@endsection