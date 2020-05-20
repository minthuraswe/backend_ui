@extends('dashboard')
@section('content')
    <div class="container">
        <div class="row p-4 mt-2">
            <div class="col-md-12">
                <div class="d-flex">
                    <div><h2>Creating Category</h2></div>
                    <div class="ml-auto">
                        <a href="{{url('/home')}}" class="btn btn-primary mb-3 p-2">Click Here To Go Back</a>
                    </div>
                </div>
              
                <div class="card">
                    <form action="{{url('/category')}}" method="post">
                        @csrf
                            <div class="form-group row mt-3">
                                <label for="name" class="col-md-3 col-form-label text-md-right">{{ __('Create New Category') }}</label>
    
                            <div class="col-md-7">
                                <input id="name" type="text" class="form-control" name="cat_name" required>
                            </div>
                            <button type="submit" class="btn btn-success">Save</button>
                            </div>
                    </form>
                </div>
            </div></div>
            <div class="row pt-0 px-4 pb-4">
            <div class="col-md-12">
              
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
                           @foreach ($cat as $item)
                            <tr>
                                <td>{{$item->id}}</td>
                                <td>{{$item->cat_name}}</td>
                                <td>{{$item->updated_at->diffforHumans()}}</td>
                                <td>
                                    <a href="{{ URL::to('category/' . $item->id . '/edit') }}" class="btn btn-sm btn-primary">Edit</a>
                                    <form action="{{ URL::to('category/' . $item->id ) }}" method="post" style="display: inline;">
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
                    {{$cat->links()}}
                </div>
            </div>
        </div>
    </div>
@endsection