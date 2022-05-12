<div class="row">
    @foreach($collection as $item)
        <div class="col-md-12">
            <div class="album-container">
                <a href="#" class="show-photos" type="close" album-id="{{ $item->id }}">
                    {{ $item->title }}
                    <i class="fa fa-angle-double-down" aria-hidden="true"></i>
                </a>
                <div class="photos-container d-none"></div>
            </div>
        </div>
    @endforeach
</div>