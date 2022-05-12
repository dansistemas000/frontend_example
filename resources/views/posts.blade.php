<div class="row">
    @foreach($collection as $item)
        <div class="col-md-12">
            <div class="title-post">
                {{ $item->title }}
            </div>
            <div class="body-post">
                {{ $item->body }}
            </div>
        </div>
    @endforeach
</div>
