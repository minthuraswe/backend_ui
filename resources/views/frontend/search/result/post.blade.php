@extends('frontend.layouts.master')
@section('content')
<section class="first-bg border-bottom">
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <div class="pt-3 pb-3">
                    <a href="/" class="news-link">Home</a> / 
                    <a href="/news" class="news-link">News</a> /
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
                    <div class="col-md-12">
                        <div class="card card-shadow mb-2 unicode">
                            <div class="card-body">
                                <?php $striptags = strip_tags($getdata->post_description) ?>
                                <p class="mb-0"> 
                                    <?php $replacingtitle = str_replace(' ', '-', $getdata->post_title) ?>                           
                                    <a href="/news/{{$getdata->id}}-{{$replacingtitle}}" class="news-link">{!!Str::limit($striptags, 250)!!}</a><br>
                                    <small class="text-muted float-right">
                                       {{$getdata->updated_at->diffForHumans()}}
                                    </small>
                                </p>
                            </div>
                        </div>
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