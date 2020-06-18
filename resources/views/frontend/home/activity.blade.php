<section class="pt-5 pb-5 first-bg">
    <div class="container">
        <h2>OUR ACTIVITIES</h2>
        <div class="row">
            @foreach ($activity as $get)
            <div class="col-md-4 mb-2">
                <div class="card card-shadow">
                    <?php $getter = App\Phototitle::find($get->photo_id) ?>
                    <img src="{{asset('/uploads/' . $getter->image)}}" class="card-img-top max-height" alt="... ">
                    <div class="card-body">
                        <h5 class="card-title">
                            <?php $getter = App\Category::find($get->cat_id) ?>
                            {{$getter->cat_name}}
                        </h5>
                        <a href="# " type="button " class="btn btn-md my-btn float-right"> View More </a>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>