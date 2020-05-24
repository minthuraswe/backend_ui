@extends('dashboard')
@section('content')
    <div class="container">
        <div class="row p-4 mt-2">
            <div class="col-md-12">
                <div class="d-flex">
                    <div><h2>Responsibles</h2></div>
                    <div class="ml-auto">
                        <a href="{{url('/responsible/create')}}" class="btn btn-primary mb-3  p-2" >Upload New One Here</a>
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
                            <th scope="col">Last updated</th>
                            <th scope="col">Action</th>
                          </tr>
                        </thead>
                        <tbody>
                           @foreach ($res as $item)
                            <tr>
                                <td>{{$item->id}}</td>
                                <td>{{$item->res_name}}</td>
                                <td>{{$item->updated_at->diffforHumans()}}</td>
                                <td>
                                    <a href="{{ URL::to('responsible/' . $item->id . '/edit') }}" class="btn btn-sm btn-primary">Edit</a>
                                    <form action="{{ URL::to('responsible/' . $item->id ) }}" method="post" style="display: inline;">
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
                    {{$res->links()}}
                </div>
            </div>
        </div>
    </div>
@endsection