@extends('frontend.layouts.master')
@section('content')
@include('frontend.activity.route')
<section class="pt-5 pb-5 first-bg">
    <div class="container">
        <div class="row">
            <?php
                $ary = unserialize($activity->act_memory);
            ?>
            @foreach ($ary as $image)
            <div class="col-md-3 mb-4">
                <img src="{{asset('/uploads/'. $image)}}"  class="rounded max-h w-100">
            </div>
            @endforeach
        </div>
    </div>
</section>
@endsection

