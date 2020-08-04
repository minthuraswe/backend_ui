<section class="pt-5 pb-5 first-bg">
    <div class="container">
        <h2>LATEST NEWS</h2>
        <div class="row">
            @foreach ($post as $get)
            <div class="col-md-4 mb-2">
                <div class="card card-shadow unicode">
                    <img src="{{asset('/uploads/' . $get->post_image)}}" class="card-img-top max-height" title="{{$get->post_title}}">
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
                            {!!Str::limit($striptags, 80)!!}
                        </p>
                        <?php $replacingtitle = str_replace(' ', '-', $get->post_title); ?>
                        <a href="/news/{{$get->id}}-{{$replacingtitle}}" type="button " class="btn btn-md my-btn float-right"> Read More </a>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>