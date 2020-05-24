<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Chin Literature & Culture Committee</title>

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.16/dist/summernote-lite.min.css" rel="stylesheet">
    <link rel="stylesheet" href="{{asset('css/style.css')}}">

</head>

<body style="background-color:rgba(188,188,188,0.2 );">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-2  p-0 ">
                <div class="sidebar position-fixed" style="width: 227.5px;">
                    <li class="border-bottom list-unstyled">
                        <h5 class="border-0  pt-3 pb-2 pl-3 clcc">CLCC</h5>
                    </li>
                    <ul class="list-unstyled">
                        <a href="/home">
                            <li class="p-3 {{ (request()->is('home*')) ? 'active' : '' }}">
                                <img src="{{asset('css/images/home.png')}}" class="pb-1"> Home
                            </li>
                        </a>
                        <a href="/member">
                            <li class="p-3 {{ (request()->is('member*')) ? 'active' : '' }}">
                                <img src="{{asset('css/images/member.png')}}" class="pb-1"> Member
                                <span class="badge badge-light float-right">{{$count_mem}}</span>
                            </li>
                        </a>
                        <a href="/post">
                            <li class="p-3 {{ (request()->is('post*')) ? 'active' : '' }}">
                                <img src="{{asset('css/images/post.png')}}" class="pb-1"> Post
                                <span class="badge badge-light float-right">{{$count_post}}</span>
                            </li>
                        </a>
                        <a href="/activity">
                            <li class="p-3 {{ (request()->is('activity*')) ? 'active' : '' }}">
                                <img src="{{asset('css/images/ball.png')}}" class="pb-1"> Activity
                                <span class="badge badge-light float-right">{{$count_act}}</span>
                            </li>
                        </a>

                        <a href="/category">
                            <li class="p-3 {{ (request()->is('category*')) ? 'active' : '' }}">
                                <img src="{{asset('css/images/web.png')}}" class="pb-1"> Category
                                <span class="badge badge-light float-right">{{$count_cat}}</span>
                            </li>
                        </a>
                        <a href="/photo">
                            <li class="p-3 {{ (request()->is('photo*')) ? 'active' : '' }}">
                                <img src="{{asset('css/images/image.png')}}" class="pb-1"> Photo
                                <span class="badge badge-light float-right">{{$count_photo}}</span>
                            </li>
                        </a>
                        <a href="/responsible">
                            <li class="p-3 {{ (request()->is('responsible*')) ? 'active' : '' }}">
                                <img src="{{asset('css/images/avatar.png')}}" class="pb-1"> Responsible
                                <span class="badge badge-light float-right">{{$count_res}}</span>
                            </li>
                        </a>
                        <a href="/university">

                            <li class="p-3 {{ (request()->is('university*')) ? 'active' : '' }}">
                                <img src="{{asset('css/images/education.png')}}" class="pb-1"> University
                                <span class="badge badge-light float-right">{{$count_uni}}</span>
                            </li>
                        </a>
                        <li class="p-3 border-top clcc" style="margin-top:9rem;">
                            <img src="{{asset('css/images/copy.png')}}" class="pb-1"> 2020 clcc.
                        </li>

                    </ul>
                </div>
            </div>
            <div class="col-md-10 p-0">
                <nav class="navbar navbar-expand-md navbar-light shadow-sm">
                    <a class="navbar-brand" href="{{ url('/home') }}">
                        Dashboard
                    </a>

                    {{-- <a class="btn btn-primary" href="/filemanager">Upload File</a> --}}
                    <button class="navbar-toggler" type="button" data-toggle="collapse"
                        data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                        aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                        <span class="navbar-toggler-icon"></span>
                    </button>

                    <div class="collapse navbar-collapse" id="navbarSupportedContent">

                        <!-- Right Side Of Navbar -->
                        <ul class="navbar-nav ml-auto">
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button"
                                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    <img src="{{asset('css/images/user.png')}}" class="pb-1"> {{ Auth::user()->name }}
                                    <span class="caret"></span>
                                </a>

                                <div class="dropdown-menu dropdown-menu-right bg-light" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                                        document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                        style="display: none;">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        </ul>
                    </div>
                </nav>
                @yield('content')
            </div>
        </div>
    </div>

    <script src="{{ asset('js/app.js') }}"></script>
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.16/dist/summernote-lite.min.js"></script>

    @stack('scripts')
  

</body>

</html>