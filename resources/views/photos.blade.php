<div class="row">
    @foreach($collection as $item)
        <div class="col-md-4">
            <div class="photo-container">
                <div class="photo-title">
                    {{ $item->title }}
                </div>
                <img class="photo" src="{{ $item->url }}" alt="">
            </div>
        </div>
    @endforeach
</div>