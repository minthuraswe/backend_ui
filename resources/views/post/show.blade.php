@extends('layouts.master')
@section('content')
<div class="container">
    <div class="row p-4 mt-2">
        <div class="col-md-12 ">
            <div class="d-flex">
                <div>
                    <h2>Post Details</h2>
                </div>
                <div class="ml-auto">
                    <a href="{{url('/post')}}" class="btn btn-primary mb-3 p-2">Back</a>
                </div>
            </div>
            <div class="card">
                <ul style="list-style:none;" class="p-0 mb-0">
                    <li class="px-3 border-bottom py-2">
                        Name = {{$post->post_title}}
                    </li>
                    <li class="px-3 border-bottom py-2">
                        <?php $cat = App\Category::find($post->cat_id); ?>
                        Category = <span class="badge badge-info px-2 py-1 mb-1">{{$cat->cat_name}}</span>
                    </li>
                    <li class="px-3 border-bottom py-2">
                        Photo = <img src="{{asset('/uploads/'. $post->post_image)}}" class="border" width="auto" height="50px" title="{{$post->post_image}}">
                    </li>
                    <li class="px-3 border-bottom py-2 ">
                        Description =<br> {!!$post->post_description!!}
                    </li>
                </ul>
            </div>
        </div>
    </div>
</div>
@endsection