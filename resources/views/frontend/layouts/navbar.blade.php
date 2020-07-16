<section class="main-bg">
    <div class="container">
        <div class="row">
            <div class="col-md-12 ">
                <nav class="navbar navbar-expand-lg">
                    <img src="{{asset('frontend/images/logo.jpg')}}" class="logo-width" title="Chin Literature & Culture Committee">
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarNavDropdown">
                        <ul class="navbar-nav ml-auto">
                            <li class="nav-item active navbar-mr-bb ">
                                <a class="nav-link" href="/index">Home<span class="sr-only">(current)</span></a>
                            </li>
                            <li class="nav-item navbar-mr-bb ">
                                <a class="nav-link" href="/members">Members</a>
                            </li>
                            <li class="nav-item navbar-mr-bb ">
                                <a class="nav-link" href="/activities">Activities</a>
                            </li>
                            <li class="nav-item navbar-mr-bb ">
                                <a class="nav-link" href="/news">News</a>
                            </li>
                            <li class="nav-item navbar-mr-bb ">
                                <a class="nav-link" href="/history">History</a>
                            </li>
                            <li class="nav-item navbar-mr-bb">
                                <a class="nav-link" href="/contact">Contact</a>
                            </li>
                            <li class="nav-item navbar-mr-bb">
                                <a class="nav-link" href="/about">About</a>
                            </li>
                           <li class="nav-item">
                            <a href="#" class="nav-link text-right" data-toggle="modal" data-target="#exampleModal" title="search">
                                <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-search" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd" d="M10.442 10.442a1 1 0 0 1 1.415 0l3.85 3.85a1 1 0 0 1-1.414 1.415l-3.85-3.85a1 1 0 0 1 0-1.415z"/>
                                    <path fill-rule="evenodd" d="M6.5 12a5.5 5.5 0 1 0 0-11 5.5 5.5 0 0 0 0 11zM13 6.5a6.5 6.5 0 1 1-13 0 6.5 6.5 0 0 1 13 0z"/>
                                </svg>
                            </a>
                           </li>
                            <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                
                                <div class="modal-dialog modal-dialog-centered">
                                    <div class="modal-content search-bg">
                                       
                                        {{-- <div class="modal-header">
                                           
                                        </div> --}}
                                       
                                        <div class="modal-body p-0">
                                            <button type="button" class="close text-light p-0" data-dismiss="modal" aria-label="Close" title="close">
                                                <svg width="1.5em" height="1.5em" viewBox="0 0 16 16" class="bi bi-x" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                                    <path fill-rule="evenodd" d="M11.854 4.146a.5.5 0 0 1 0 .708l-7 7a.5.5 0 0 1-.708-.708l7-7a.5.5 0 0 1 .708 0z"/>
                                                    <path fill-rule="evenodd" d="M4.146 4.146a.5.5 0 0 0 0 .708l7 7a.5.5 0 0 0 .708-.708l-7-7a.5.5 0 0 0-.708 0z"/>
                                                </svg>
                                            </button>  
                                      
                                            <form action="{{url('/search')}}" method="get" accept-charset="UTF-8">
                                                <div class="input-group p-4">
                                                    <input type="search" class="form-control" placeholder="Search"  name="search" aria-label="Search" style="padding:1.375rem;">
                                                    <div class="input-group-append">
                                                        <button class="btn btn-primary" type="submit"  id="button-addon2" title="search">
                                                            <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-search" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                                                <path fill-rule="evenodd" d="M10.442 10.442a1 1 0 0 1 1.415 0l3.85 3.85a1 1 0 0 1-1.414 1.415l-3.85-3.85a1 1 0 0 1 0-1.415z"/>
                                                                <path fill-rule="evenodd" d="M6.5 12a5.5 5.5 0 1 0 0-11 5.5 5.5 0 0 0 0 11zM13 6.5a6.5 6.5 0 1 1-13 0 6.5 6.5 0 0 1 13 0z"/>
                                                            </svg>
                                                        </button>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>                                    
                            </div>
                        </ul>
                    </div>
                </nav>
            </div>
        </div>
    </div>
</section>





