<section class="pt-3 pb-3 bg-dark">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                @foreach ($ads as $get)
                @if($get->checkpaid == 'ads-top')
                    <a href="{{$get->link}}">
                        <img src="{{asset('/uploads/'. $get->image)}}" width="100%">
                    </a>
                @endif
                @endforeach
            </div>
        </div>
    </div>
</section>