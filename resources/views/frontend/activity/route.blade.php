<section class="first-bg border-bottom">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="pt-3 pb-3">
                    <a href="/index" class="news-link">Home</a> / 
                    <a href="/activities" class="news-link">Activities</a> / 
                    <?php $act = App\Category::find($activity->cat_id);
                     $replacingname = str_replace(' ', '-', $act->cat_name) ?> 
                    {{$act->cat_name}}
                </div>
            </div>
        </div>
    </div>
</section>