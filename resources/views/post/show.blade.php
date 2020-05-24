@extends('dashboard')
@section('content')
<div class="container">
    <div class="row p-4 mt-2">
        <div class="col-md-12 ">
            <div class="d-flex">
                <div>
                    <h2>Post Details</h2>
                </div>
                <div class="ml-auto">
                    <a href="{{url('/post')}}" class="btn btn-primary mb-3 p-2">Click Here To Go Back</a>
                </div>
            </div>
            <div class="card">
                <ul style="list-style:none;" class="p-0 mb-0">
                    <li class="pl-3 border-bottom py-2">
                        Name = {{$post->post_title}}
                    </li>
                    <li class="pl-3 border-bottom py-2">
                        <?php $cat = App\Category::find($post->cat_id); ?>
                        Category = {{$cat->cat_name}}
                    </li>
                    <li class="pl-3 border-bottom py-2">
                        <?php $photo = App\Phototitle::find($post->photo_id); ?>
                        Photo = <img src="{{asset('/uploads/'. $photo->image)}}" class="border" width="auto" height="50px" title="{{$photo->image}}">
                    </li>
                    <li class="pl-3 border-bottom py-2">
                        Description =<br> {{strip_tags($post->post_description)}}
                    </li>
                </ul>
            </div>
        </div>
    </div>
</div>
@endsection