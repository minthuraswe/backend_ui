<section class="pt-5 pb-5 first-bg">
    <div class="container">
        <h2>LATEST NEWS</h2>
        <div class="row">
            @foreach ($post as $get)
            <div class="col-md-4 mb-2">
                <div class="card card-shadow">
                    <?php $getter = App\Phototitle::find($get->photo_id) ?>
                    <img src="{{asset('/uploads/' . $getter->image)}}" class="card-img-top max-height">
                    <div class="card-body">
                        <h5 class="card-title">{{$get->post_title}}<br>
                            <small class="text-muted">
                                {{$get->updated_at->format('j F Y')}}
                            </small>
                        </h5>
                        
                        <?php $striptags = strip_tags($get->post_description) ?>
                        <p>                            
                            {{Str::limit($striptags, 80)}}
                        </p>
                        <a href="# " type="button " class="btn btn-md my-btn float-right"> Read More </a>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>