@extends('dashboard')
@section('content')
<div class="container">
    <div class="row p-4 mt-2">
        <div class="col-md-12">
            <div class="d-flex">
                <div>
                    <h2>Activities</h2>
                </div>
                <div class="ml-auto">
                    <a href="{{url('/activity/create')}}" class="btn btn-primary mb-3  p-2">Create New One Here</a>
                    <a href="{{url('/home')}}" class="btn btn-outline-primary mb-3 p-2">Click Here To Go Back</a>
                </div>
            </div>
            @if(session('message'))
            <div class="alert alert-success">
                <span class="font-weight-bold">{{session('message')}}</span>
            </div>
            @endif
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Name</th>
                        <th scope="col">Photo</th>
                        <th scope="col">Category</th>
                        <th scope="col">Memory</th>
                        <th scope="col">Last updated</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($act as $item)
                    <tr>
                        <td>{{$item->id}}</td>
                        <td>{{$item->act_name}}</td>
                        <td>
                            <?php $photo = App\Phototitle::find($item->photo_id) ?>
                            {{$photo->photo_name}}
                        </td>
                        <td>
                            <?php $cat = App\Category::find($item->cat_id) ?>
                            {{$cat->cat_name}}
                        </td>
                        <td>
                            @foreach(unserialize($item->act_memory) as $data)
                            <img src="{{asset('/uploads/'. $data)}}" width="40px" height="40px" class="rounded"
                                title="{{$data}}">
                            @endforeach
                        </td>
                        <td>{{$item->updated_at->diffforHumans()}}</td>
                        <td>
                            <a href="{{ URL::to('activity/' . $item->id . '/edit') }}"
                                class="btn btn-sm btn-primary">Edit</a>
                            <a href="{{ URL::to('activity/' . $item->id ) }}" class="btn btn-sm btn-warning">View</a>
                            <form action="{{ URL::to('activity/' . $item->id ) }}" method="post"
                                style="display: inline;">
                                @method('DELETE')
                                @csrf
                                <button type="submit" class="btn btn-sm btn-danger">Delete</button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>


            <div class="mt-3">
                {{$act->links()}}
            </div>
        </div>
    </div>
</div>
@endsection