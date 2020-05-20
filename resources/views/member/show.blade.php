@extends('dashboard')
@section('content')
    <div class="container">
        <div class="row p-4 mt-2">
            <div class="col-md-12">
                <div class="d-flex">
                    <div><h2>Member Information</h2></div>
                    <div class="ml-auto">
                        <a href="{{url('/member')}}" class="btn btn-primary mb-3 p-2">Click Here To Go Back</a>
                    </div>
                </div>
                
                <div class="card">
                    <ul style="list-style:none;" class="p-0 mb-0">
                        <li class="pl-3 border-bottom py-2">
                            Name = {{$mem->mem_name}}
                        </li>
                        <li class="pl-3 border-bottom py-2">
                            Email = {{$mem->mem_email}}
                        </li>
                        <li class="pl-3 border-bottom py-2">
                            <?php $uni = App\University::find($mem->uni_id); ?>
                            University = {{$uni->uni_name}}
                        </li>
                        <li class="pl-3 border-bottom py-2">
                            <?php $res = App\Responsible::find($mem->res_id); ?>
                            Responsible = {{$res->res_name}}
                        </li>
                        <li class="pl-3 border-bottom py-2">
                            <?php 
                                $dateOfBirth = $mem->mem_age;
                                $today = date("Y-m-d");
                                $diff = date_diff(date_create($dateOfBirth), date_create($today));
                                echo 'Age = '.$diff->format('%y') . ' years';
                            ?>
                        </li>
                        <li class="pl-3 border-bottom py-2">
                            Phone = {{$mem->mem_phone}}
                        </li>
                        <li class="pl-3 border-bottom py-2">
                            <?php $pho = App\Phototitle::find($mem->photo_id); ?>
                            Photo = <img src="{{asset('/uploads/'. $pho->image)}}" class="border" style="width:40px;height:40px;">
                        </li>
                        <li class="pl-3 border-bottom py-2">
                            Address = {{$mem->mem_address}}
                        </li>
                        <li class="py-2 px-3">
                            Description = <br>{{$mem->mem_description}}
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
@endsection
