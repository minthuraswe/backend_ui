<section class="main-bg">
    <div class="container">
        <div class="row">
            <div class="col-md-12 ">
                <nav class="navbar navbar-expand-lg">
                    {{-- <a href="/"></a> --}}
                    <img src="{{asset('frontend/images/logo.jpg')}}" class="logo-width" title="Chin Literature & Culture Committee Youth Organization">
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarNavDropdown">
                        <ul class="navbar-nav ml-auto">
                            <li class="nav-item navbar-mr-bb ">
                                <a class="nav-link {{(request()->is('/')) ? 'active' : ''}}" href="/">Home<span class="sr-only">(current)</span></a>
                            </li>
                            <li class="nav-item navbar-mr-bb ">
                                <a class="nav-link {{(request()->is('members*')) ? 'active' : ''}}" href="/members">Members</a>
                            </li>
                            <li class="nav-item navbar-mr-bb ">
                                <a class="nav-link {{(request()->is('activities*')) ? 'active' : ''}}" href="/activities">Activities</a>
                            </li>
                            <li class="nav-item navbar-mr-bb ">
                                <a class="nav-link {{(request()->is('news*')) ? 'active' : ''}}" href="/news">News</a>
                            </li>
                            <li class="nav-item navbar-mr-bb ">
                                <a class="nav-link {{(request()->is('history*')) ? 'active' : ''}}" href="/history">History</a>
                            </li>
                            <li class="nav-item navbar-mr-bb">
                                <a class="nav-link {{(request()->is('contact*')) ? 'active' : ''}}" href="/contact">Contact</a>
                            </li>
                            <li class="nav-item text-right">
                                <a class="nav-link {{(request()->is('about*')) ? 'active' : ''}}" href="/about">About</a>
                            </li>
                           
                        </ul>
                    </div>
                </nav>
            </div>
        </div>
    </div>
</section>

<section class="pt-3 pb-3 bg-dark">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                @foreach ($ads as $get)
                @if($get->checkpaid == 'ads-top')
                    <a href="{{$get->link}}">
                        <img src="{{asset('/uploads/'. $get->image)}}" width="100%">
                    </a>
                @endif
                @endforeach
            </div>
        </div>
    </div>
</section>





