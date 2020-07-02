@extends('layouts.master')
@section('content')
<div class="container">
    <div class="row p-4 mt-2">
        <div class="col-md-12">
            <div class="d-flex">
                <div>
                    <h2>Member Information</h2>
                </div>
                <div class="ml-auto">
                    <a href="{{url('/member')}}" class="btn btn-primary mb-3 p-2">Back</a>
                </div>
            </div>

            <div class="card">
                <ul style="list-style:none;" class="p-0 mb-0">
                    <li class="px-3 border-bottom py-2">
                        Name = {{$mem->mem_name}}
                    </li>
                    <li class="px-3 border-bottom py-2">
                        Email = {{$mem->mem_email}}
                    </li>
                    <li class="px-3 border-bottom py-2">
                        University = <span class="badge badge-primary  mb-1 px-2 py-1">{{$mem->mem_university}}</span>
                    </li>
                    <li class="px-3 border-bottom py-2">
                        Responsible = <span class="badge badge-success  mb-1 px-2 py-1">{{$mem->mem_position}}</span>
                    <li class="px-3 border-bottom py-2">
                        <?php 
                            $dateOfBirth = $mem->mem_age;
                            $today = date("Y-m-d");
                            $diff = date_diff(date_create($dateOfBirth), date_create($today));
                            echo 'Age = '.$diff->format('%y') . ' years';
                        ?>
                    </li>
                    <li class="px-3 border-bottom py-2">
                        Phone = {{$mem->mem_phone}}
                    </li>
                    <li class="px-3 border-bottom py-2">
                        Photo = <img src="{{asset('/uploads/'. $mem->mem_photo)}}" class="rounded-circle" width="50px" height="50px" title="{{$mem->mem_photo}}">
                    </li>
                    <li class="px-3 border-bottom py-2">
                        Address = {!!($mem->mem_address)!!}
                    </li>
                    <li class="py-2 px-3">
                        Biography = <br>{!!($mem->mem_description)!!}
                    </li>
                </ul>
            </div>
        </div>
    </div>
</div>
@endsection