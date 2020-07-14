@extends('layouts.master')
@section('content')
<section>
    <div class="container py-3 px-3">
       @if(session('error'))
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-exclamation-circle" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd" d="M8 15A7 7 0 1 0 8 1a7 7 0 0 0 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z"/>
                    <path d="M7.002 11a1 1 0 1 1 2 0 1 1 0 0 1-2 0zM7.1 4.995a.905.905 0 1 1 1.8 0l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 4.995z"/>
                </svg>
                {{session('error')}}
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        @endif
        <div class="row mb-2">
            <div class="col-md-12">
                <div class="card p-3 shadow">
                    <form enctype="multipart/form-data" action="{{url('/ads')}}" method="POST">
                        @csrf
                        <div class="form-group">
                            <label for="file">Add Your Ads file</label>
                            <input type="file" class="form-control" name="ads">
                            @if($errors->has('ads'))
                            <span class="text-danger font-weight-bold">
                                {{$errors->first('ads')}}
                            </span>
                            @endif
                        </div>
                        <div class="form-group">
                            <label for="text">Add Your Ads link</label>
                            <input type="text" class="form-control" name="link" value="{{old('link')}}">
                            @if($errors->has('link'))
                            <span class="text-danger font-weight-bold">
                                {{$errors->first('link')}}
                            </span>
                            @endif
                        </div>
                        <div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="place" id="inlineRadio1" value="ads-top" {{old('place') == 'ads-top' ? 'checked' : ''}}>
                            <label class="form-check-label" for="inlineRadio1">ads-top</label>
                        </div>
                        
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="place" id="inlineRadio1" value="ads-bottom" {{old('place') == 'ads-bottom' ? 'checked' : ''}}>
                            <label class="form-check-label" for="inlineRadio1">ads-bottom</label>
                        </div>
                       
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="place" id="inlineRadio1" value="ads-news" {{old('place') == 'ads-news' ? 'checked' : ''}}>
                            <label class="form-check-label" for="inlineRadio1">ads-news</label>
                        </div>
                        </div>
                        @if($errors->has('place'))
                        <span class="text-danger font-weight-bold">
                            {{$errors->first('place')}}
                        </span>
                        @endif
                        <div class="mt-3">
                            <a href="/dashboard" class="btn btn-danger">Cancel</a>
                            <button type="submit" class="btn btn-primary">Publish</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="card p-3 shadow">
                    @if(session('message'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        {{session('message')}}
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    @endif
                <table class="table table-sm table-bordered">
                    <thead>
                      <tr>
                        <th scope="col">#</th>
                        <th scope="col">File</th>
                        <th scope="col">Link</th>
                        <th scope="col">Place</th>
                        <th scope="col">Action</th>
                      </tr>
                    </thead>

                    <tbody>
                        @foreach ($ads as $getdata)
                        <tr>
                            <td>{{$getdata->id}}</td>
                            <td>{{$getdata->image}}</td>
                            <td>{{$getdata->link}}</td>
                            <td>
                                <span class="badge badge-success">{{$getdata->checkpaid}}</span></td>
                            <td>
                                <a href="{{ URL::to('ads/' . $getdata->id . '/edit') }}" title="edit" class="pr-1">
                                    <button class="rounded" style="border:1px solid;">
                                        <svg class="bi bi-pencil-square text-dark" width="1.3em" height="1.3em" viewBox="0 0 16 16" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456l-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/>
                                            <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z"/>
                                        </svg>
                                    </button>
                                </a>
                                <form action="{{ URL::to('ads/' . $getdata->id ) }}" method="post" style="display: inline;">
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
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
