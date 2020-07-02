<section class="first-bg border-bottom">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="pt-3 pb-3">
                    <a href="/index" class="news-link">Home</a> / 
                    <a href="/news" class="news-link">News</a> / 
                    <?php $cat = App\Category::find($post->cat_id);
                     $replacingname = str_replace(' ', '-', $cat->cat_name) ?> 
                    <a href="/news/category/{{$cat->id}}-{{$replacingname}}" class="news-link">
                    {{$cat->cat_name}}</a> /
                    {{$post->post_title}}
                </div>
            </div>
        </div>
    </div>
</section>