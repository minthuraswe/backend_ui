<section class="pt-5 pb-5 first-bg">
    <div class="container">
        <h2>OUR ACTIVITIES</h2>
        <div class="row">
            @foreach ($activity as $get)
            <div class="col-md-4 mb-2">
                <div class="card card-shadow">
                    <?php 
                        $ary = unserialize($get->act_memory);
                        $key = array_rand($ary);
                        $value = $ary[$key];
                    ?>
                    <img src="{{asset('/uploads/'. $value)}}" class="card-img-top max-height">
                    {{-- <img src="{{asset('/uploads/' . $get->act_memory)}}" class="card-img-top max-height" alt="..." title="{{$get->act_title}}" > --}}
                    <div class="card-body">
                        <h5 class="card-title">
                            <?php $getter = App\Category::find($get->cat_id) ?>
                            {{$getter->cat_name}}
                        </h5>
                        <?php $replacingname = str_replace(' ', '-', $getter->cat_name); ?>
                        <a href="/activities/{{$get->id}}-{{$replacingname}}" type="button " class="btn btn-md my-btn float-right"> View More </a>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>