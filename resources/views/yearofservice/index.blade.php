@extends('layouts.master')
@section('content')
    <section>
        <div class="container px-3 py-3">
            <div class="row">
                <div class="col-md-5">
                    <div class="card p-3 shadow">
                        <form action="/yearofservice" method="POST">
                            @csrf
                            <div class="form-group">
                                <label for="text">Start Year</label>
                                <input type="text" class="form-control" name="startyear" value="{{old('startyear')}}" aria-describedby="emailHelp">
                                @if($errors->has('startyear'))
                                <span class="text-danger font-weight-bold">
                                    {{$errors->first('startyear')}}
                                </span>
                                @endif
                            </div>
                            <div class="form-group">
                                <label for="text">End Year</label>
                                <input type="text" class="form-control" name="endyear" value="{{old('endyear')}}">
                                @if($errors->has('endyear'))
                                <span class="text-danger font-weight-bold">
                                    {{$errors->first('endyear')}}
                                </span>
                                @endif
                            </div>
                            <button type="submit" class="btn btn-success ">Save</button>
                        </form>
                    </div>
                </div>
                <div class="col-md-7">
                    <div class="card p-3 shadow">
                        @if(session('success'))
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            <span class="font-weight-bold">{{session('success')}}</span>
                            <div class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </div>
                        </div>
                        @endif
                        <table class="table table-sm">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Start Year</th>
                                    <th scope="col">End Year</th>
                                    <th scope="col">Date/ Time</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($yearofservice as $getyear)
                                <tr>
                                    <th scope="row">{{$getyear->id}}</th>
                                    <td>{{$getyear->start_year}}</td>
                                    <td>{{$getyear->end_year}}</td>
                                    <td>{{$getyear->updated_at->diffforHumans()}}</td>
                                    <td>
                                        <a href="{{ URL::to('yearofservice/' . $getyear->id . '/edit') }}" title="edit" class="pr-1">
                                            <button class="rounded" style="border:1px solid;">
                                                <svg class="bi bi-pencil-square text-dark" width="1.3em" height="1.3em" viewBox="0 0 16 16" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                                    <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456l-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/>
                                                    <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z"/>
                                                </svg>
                                            </button>
                                        </a>
                                        <form action="{{ URL::to('yearofservice/' . $getyear->id ) }}" method="post" style="display: inline;">
                                            @method('DELETE')
                                            @csrf
                                            <button type="submit" title="delete" class="rounded" style="border:1px solid;">
                                                <svg class="bi bi-trash text-dark" width="1.3em" height="1.3em" viewBox="0 0 16 16" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                                    <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z"/>
                                                    <path fill-rule="evenodd" d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4L4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z"/>
                                                </svg>
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                        <div>
                            {{$yearofservice->links()}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection