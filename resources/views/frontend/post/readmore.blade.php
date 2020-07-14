<section class="pt-5 pb-5 first-bg">
    <div class="container">
        <div class="row">
            <div class="col-md-8">
                <div class="card card-shadow mb-2">
                    <img src="{{asset('/uploads/' . $post->post_image)}}" class="card-img-top" width="auto" height="auto" title="{{$post->post_title}}">
                    <div class="card-body">
                        <h5 class="card-title">{{$post->post_title}}<br>
                            <small class="text-muted">
                                <svg width="1.2em" height="1.2em" viewBox="0 0 16 16" class="bi bi-person mb-2" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd" d="M13 14s1 0 1-1-1-4-6-4-6 3-6 4 1 1 1 1h10zm-9.995-.944v-.002.002zM3.022 13h9.956a.274.274 0 0 0 .014-.002l.008-.002c-.001-.246-.154-.986-.832-1.664C11.516 10.68 10.289 10 8 10c-2.29 0-3.516.68-4.168 1.332-.678.678-.83 1.418-.832 1.664a1.05 1.05 0 0 0 .022.004zm9.974.056v-.002.002zM8 7a2 2 0 1 0 0-4 2 2 0 0 0 0 4zm3-2a3 3 0 1 1-6 0 3 3 0 0 1 6 0z"/>
                                </svg> 
                                    @foreach ($admin as $get)
                                        <span class="mr-1">{{$get->user->name}} </span> 
                                    @endforeach
                               
                               <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-calendar mb-2" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd" d="M1 4v10a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1V4H1zm1-3a2 2 0 0 0-2 2v11a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V3a2 2 0 0 0-2-2H2z"/>
                                    <path fill-rule="evenodd" d="M3.5 0a.5.5 0 0 1 .5.5V1a.5.5 0 0 1-1 0V.5a.5.5 0 0 1 .5-.5zm9 0a.5.5 0 0 1 .5.5V1a.5.5 0 0 1-1 0V.5a.5.5 0 0 1 .5-.5z"/>
                                </svg> <span class="mr-1">{{$post->updated_at->format('j F Y')}}</span>
                              </small>
                        </h5>
                        
                        <p>                            
                            {!!$post->post_description!!}
                        </p>
                        <div id="fb-share-button" class="float-right"> 
                            <svg viewBox="0 0 12 12" preserveAspectRatio="xMidYMid meet">
                                <path class="svg-icon-path" d="M9.1,0.1V2H8C7.6,2,7.3,2.1,7.1,2.3C7,2.4,6.9,2.7,6.9,3v1.4H9L8.8,6.5H6.9V12H4.7V6.5H2.9V4.4h1.8V2.8 c0-0.9,0.3-1.6,0.7-2.1C6,0.2,6.6,0,7.5,0C8.2,0,8.7,0,9.1,0.1z"></path>
                            </svg>
                            <span>Share</span>
                        </div>
                    </div>
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
                <div class="row mb-5">
                    <div class="col-md-12">
                        <h2>Categories</h2>
                        <div class="card card-shadow mb-2">
                            <div class="card-body my-list-style">
                                @foreach ($category as $getdata)
                                <?php $replacingname = str_replace(' ', '-', $getdata->cat_name) ?>         
                                <li class="py-2">
                                    <a href="/news/category/{{$getdata->id}}-{{$replacingname}}" class="news-link">
                                        {{$getdata->cat_name}}
                                    </a>
                                </li>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
               <div class="row">
                   <div class="col-md-12">
                       <h2>CLCC on Facebook</h2>
                       <iframe src="https://www.facebook.com/plugins/page.php?href=https%3A%2F%2Fwww.facebook.com%2FChin-Literature-and-Culture-Committee-Yangon-1505732176322344%2F&tabs=timeline&width=350&height=400&small_header=false&adapt_container_width=true&hide_cover=false&show_facepile=true&appId=314954856338556" width="auto" height="400" style="border:none;overflow:hidden" scrolling="no" frameborder="0" allowTransparency="true" allow="encrypted-media" class="w-100"></iframe>
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