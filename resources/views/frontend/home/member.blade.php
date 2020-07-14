<section class="pt-5 first-bg">
    <div class="container">
        <h2>OUR MEMBERS</h2>
        <div class="row">
            @foreach ($member as $get)
            <div class="col-md-4 mb-2">
                <div class="card card-shadow">
                    <img src="{{asset('/uploads/'. $get->mem_photo)}}" class="card-img-top max-height" alt="..." title="{{$get->mem_name}}">
                    <div class="card-body">
                        <h5 class="card-title">{{$get->mem_name}}</h5>
                        <?php 
                        $striptags = strip_tags($get->mem_description);
                        $replacingname = str_replace(' ', '-', $get->mem_name);
                        ?>
                            <p> {{Str::limit($striptags, 80)}} </p>
                        
                        <a href="/members/{{$get->id}}-{{$replacingname}}" type="button" class="btn btn-md my-btn float-right"> Read More </a>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>