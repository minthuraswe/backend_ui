@extends('dashboard')
@section('content')
<div class="container">
    <div class="row p-4 mt-2">
        <div class="col-md-12">
            <div class="d-flex">
                <div>
                    <h2>Members</h2>
                </div>
                <form action="/search" method="get" class="form-inline" >
                    <input class="mr-sm-2 ml-sm-2 mb-3" type="search" placeholder="Search" aria-label="Search" name="search">
                    <button class="mb-3" type="submit">Search</button>
                </form> 
                <div class="ml-auto">
                    <a href="{{url('/member/create')}}" class="btn btn-primary mb-3  p-2">Create New One Here</a>
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
                        <th scope="col">Email</th>
                        <th scope="col">Responsible</th>
                        <th scope="col">Last updated</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($mem as $item)
                    <tr>
                        <td>{{$item->id}}</td>
                        <td>{{$item->mem_name}}</td>
                        <td>{{$item->mem_email}}</td>
                        <td>
                            <?php $res = App\Responsible::find($item->res_id); ?>
                            {{$res->res_name}}
                        </td>
                        <td>{{$item->updated_at->diffforHumans()}}</td>
                        <td>
                            <a href="{{ URL::to('member/' . $item->id . '/edit') }}"
                                class="btn btn-sm btn-primary">Edit</a>
                            <a href="{{ URL::to('member/' . $item->id ) }}" class="btn btn-sm btn-warning ">View</a>
                            <form action="{{ URL::to('member/' . $item->id ) }}" method="post" style="display: inline;">
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
                {{$mem->links()}}
            </div>
        </div>
    </div>
</div>
@endsection