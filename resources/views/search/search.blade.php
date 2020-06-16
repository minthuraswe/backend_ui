<div class="row">
    <div class="col-md-12 text-center p-5">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">  
                    The search text was not found. Make sure your text in search. Sorry!
                </h5>
                <p class="card-text pt-3 pb-3">
                    @if(request()->is('search-category'))
                    <a href="/category" class="text-info">Back to category</a>
                    @elseif(request()->is('search-member'))
                    <a href="/member" class="text-info">Back to member</a>
                    @elseif(request()->is('search-post'))
                    <a href="/post" class="text-info">Back to post</a>
                    @elseif(request()->is('search-activity'))
                    <a href="/activity" class="text-info">Back to activity</a>
                    @elseif(request()->is('search-photo'))
                    <a href="/photo" class="text-info">Back to photo</a>
                    @endif
                </p>
            </div>
        </div> 
    </div>
</div>