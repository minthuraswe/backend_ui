@include('frontend.layouts.master')
<section class="first-bg border-bottom">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="pt-3 pb-3">
                    <a href="/index" class="news-link">Home</a> / 
                    <a href="/news" class="news-link">News</a> 
                </div>
            </div>
        </div>
    </div>
</section>

<section class="pt-5 pb-5 first-bg">
    <div class="container">
        <div class="row">
            <div class="col-md-8">
                @foreach ($post as $get)
                <div class="card card-shadow mb-2">
                    <img src="{{asset('/uploads/' . $get->post_image)}}" class="card-img-top" height="auto" title="{{$get->post_title}}">
                    <div class="card-body">
                        <h5 class="card-title">{{$get->post_title}}<br>
                            <small class="text-muted">
                                <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-calendar mb-2" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd" d="M1 4v10a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1V4H1zm1-3a2 2 0 0 0-2 2v11a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V3a2 2 0 0 0-2-2H2z"/>
                                <path fill-rule="evenodd" d="M3.5 0a.5.5 0 0 1 .5.5V1a.5.5 0 0 1-1 0V.5a.5.5 0 0 1 .5-.5zm9 0a.5.5 0 0 1 .5.5V1a.5.5 0 0 1-1 0V.5a.5.5 0 0 1 .5-.5z"/>
                                </svg> {{$get->updated_at->format('j F Y')}}
                            </small>
                        </h5>
                            
                        <?php $striptags = strip_tags($get->post_description) ?>
                        <p>                            
                            {{Str::limit($striptags, 80)}}
                        </p>
                        <?php $replacingtitle = str_replace(' ', '-', $get->post_title); ?>
                        <a href="/news/{{$get->id}}-{{$replacingtitle}}" type="button " class="btn btn-md my-btn float-right"> Read More </a>
                    </div>
                </div>
                @endforeach
             
                <div>
                    <ul class="pagination">
                        <li class="page-item {{$post->currentPage() == 1 ? 'disabled' : ''}}">
                            <a class="page-link" href="{{$post->previousPageUrl()}}" tabindex="-1" aria-disabled="true">Previous</a>
                        </li>
                        {{$post->links()}}
                        <?php $lastpage = $post->lastPage() ?>
                        <li class="page-item {{$post->currentPage() == $lastpage ? 'disabled' : ''}}">
                            <a class="page-link" href="{{$post->nextPageUrl()}}">Next</a>
                        </li>
                    </ul>
                </div>

            </div>
   
            <div class="col-md-4">
                <div class="row mb-5">
                    <div class="col-md-12">
                        <h2>Recent News</h2>
                        @foreach ($recent as $getdata)
                            <div class="card card-shadow mb-2">
                                <div class="card-body">
                                    <?php $striptags = strip_tags($getdata->post_description) ?>
                                    <p class="mb-0"> 
                                        <?php $replacingtitle = str_replace(' ', '-', $getdata->post_title) ?>                           
                                        <a href="/news/{{$getdata->id}}-{{$replacingtitle}}" class="news-link">{{Str::limit($striptags, 80)}}</a><br>
                                        <small class="text-muted float-right">
                                           {{$getdata->updated_at->diffForHumans()}}
                                        </small>
                                    </p>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <h2>CLCC on Facebook</h2>
                        <iframe src="https://www.facebook.com/plugins/page.php?href=https%3A%2F%2Fwww.facebook.com%2FChin-Literature-and-Culture-Committee-Yangon-1505732176322344%2F&tabs=timeline&width=350&height=400&small_header=false&adapt_container_width=true&hide_cover=false&show_facepile=true&appId=314954856338556" width="350" height="400" style="border:none;overflow:hidden" scrolling="no" frameborder="0" allowTransparency="true" allow="encrypted-media" class="w-100"></iframe>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<script>
    var fbButton = document.getElementById('fb-share-button');
    var url = window.location.href;

    fbButton.addEventListener('click', function() {
        window.open('https://www.facebook.com/sharer/sharer.php?u=' + url,
            'facebook-share-dialog',
            'width=800,height=600'
        );
        return false;
    });
</script>

@include('frontend.layouts.footer')