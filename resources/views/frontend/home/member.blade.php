<section class="pt-5 pb-5 first-bg">
    <div class="container">
        <h2>OUR MEMBERS</h2>
        <div class="row">
            @foreach ($member as $get)
            <div class="col-md-3 mb-4">
                <div class="card view overlay zoom view overlay">
                    <?php 
                    $replacingname = str_replace(' ', '-', $get->mem_name);
                    ?>
                    <a href="/members/{{$get->id}}-{{$replacingname}}">
                        <img src="{{asset('/uploads/'. $get->mem_photo)}}" class="w-100 rounded max-height" alt="..." title="{{$get->mem_name}}">
                        <div class="mask flex-center rgba-black-strong">
                            <p class="white-text">
                                <svg width="1.8em" height="1.8em" viewBox="0 0 16 16" class="bi bi-plus-circle" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd" d="M8 3.5a.5.5 0 0 1 .5.5v4a.5.5 0 0 1-.5.5H4a.5.5 0 0 1 0-1h3.5V4a.5.5 0 0 1 .5-.5z"/>
                                    <path fill-rule="evenodd" d="M7.5 8a.5.5 0 0 1 .5-.5h4a.5.5 0 0 1 0 1H8.5V12a.5.5 0 0 1-1 0V8z"/>
                                    <path fill-rule="evenodd" d="M8 15A7 7 0 1 0 8 1a7 7 0 0 0 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z"/>
                                </svg>
                            </p>
                        </div>
                    </a>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>