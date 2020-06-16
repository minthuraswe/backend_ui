@extends('layouts.master')
@section('content')
<div class="container">
    <div class="row p-4 mt-2">
        <div class="col-md-12">
            <div class="d-flex">
                <div>
                    <h2>Photo</h2>
                </div>
                <form action="/search-photo" method="get" class="form-inline" >
                    <input class="mr-sm-2 ml-sm-2 mb-1" type="search" placeholder="Search..." aria-label="Search" name="search">
                    <button class="mb-1" type="submit">Search</button>
                </form> 
            </div>
            @if(session('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <span class="font-weight-bold">{{session('success')}}</span>
                <div class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </div>
            </div>
            @endif

            @if(isset($searchdata))
                @if($search_count == true)
                    <div>
                        <b> {{$search_count}} </b> 
                            @if($search_count < 2) 
                            result 
                            @else 
                            results 
                            @endif for "{{$searchdata}}"
                    <a href="/photo" class="float-right text-info">Back to photo</a>
                    </div>
                <table class="table table-striped table-sm">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Name</th>
                            <th scope="col">Photo</th>
                            <th scope="col">Category</th>
                            <th scope="col">Last updated</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($search as $item)
                        <tr>
                            <td>{{$item->id}}</td>
                            <td>{{$item->photo_name}}</td>
                            <td>
                                <img src="{{asset('/uploads/' . $item->image)}}" width="30px" height="30px"
                                    title="{{$item->image}}">
                            </td>
                            @if($item->photo_for_what == 'Post')
                            <td class="text-primary font-weight-bold">{{$item->photo_for_what}}</td>
                            @elseif($item->photo_for_what == 'Member')
                            <td class="text-success font-weight-bold">{{$item->photo_for_what}}</td>
                            @elseif($item->photo_for_what == 'Activity')
                            <td class="text-danger font-weight-bold">{{$item->photo_for_what}}</td>
                            @endif
                            <td>{{$item->updated_at->diffforHumans()}}</td>
                            <td>
                                <a href="{{ URL::to('photo/' . $item->id . '/edit') }}" title="edit" class="ppr-1">
                                    <button class="rounded" style="border:1px solid;">
                                        <svg class="bi bi-pencil-square text-dark" width="1.3em" height="1.3em" viewBox="0 0 16 16" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456l-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/>
                                            <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z"/>
                                        </svg>
                                    </button>
                                </a>
                                <form action="{{ URL::to('photo/' . $item->id ) }}" method="post" style="display: inline;">
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
                @else
                    <div class="mt-2">
                        <b> {{$search_count}} </b> result for "{{$searchdata}}".
                    </div>
                        @include('search.search')
                @endif
            @elseif(session('search_photo'))
            <div>
                <p>{{session('search_photo')}} <a href="/photo" class="text-info pl-2"> Back to photo</a></p>
            </div>
            @endif
        </div>
    </div>
</div>
@endsection