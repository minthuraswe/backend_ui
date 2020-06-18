<section class="pt-5 first-bg">
    <div class="container">
        <h2>OUR MEMBERS</h2>
        <div class="row">
            @foreach ($member as $get)
            <div class="col-md-4 mb-2">
                <div class="card card-shadow">
                    <?php $getter = App\Phototitle::find($get->photo_id) ?>
                    <img src="{{asset('/uploads/'. $getter->image)}}" class="card-img-top max-height" alt="... ">
                    <div class="card-body">
                        <h5 class="card-title">{{$get->mem_name}}</h5>
                        <?php $striptags = strip_tags($get->mem_description) ?>
                            <p> {{Str::limit($striptags, 80)}} </p>
                        <a href="#" type="button" class="btn btn-md my-btn float-right"> Read More </a>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>