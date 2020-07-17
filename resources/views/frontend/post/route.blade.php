<section class="first-bg border-bottom">
    <div class="container">
        <div class="row">
            <div class="col-md-9">
                <div class="pt-3 pb-3">
                    <a href="/" class="news-link">Home</a> / 
                    <a href="/news" class="news-link">News</a> / 
                    <?php $cat = App\Category::find($post->cat_id);
                     $replacingname = str_replace(' ', '-', $cat->cat_name) ?> 
                    <a href="/news/category/{{$cat->id}}-{{$replacingname}}" class="news-link">
                    {{$cat->cat_name}}</a> /
                    {{$post->post_title}}
                </div>
            </div>
            <div class="col-md-3">
                <form action="{{url('/search/post')}}" method="get" accept-charset="UTF-8" class="ml-auto my-2 w-100" >
                    <div class="input-group">
                    <input type="search" class="form-control" placeholder="Search"  name="search" aria-label="Search">
                    <div class="input-group-append">
                    <button class="btn search-btn" type="submit"  id="button-addon2" title="search">
                        <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-search text-light" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
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
</section>