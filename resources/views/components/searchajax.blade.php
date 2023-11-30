@foreach ($data as $item)
    @if($item->status == 1)
    <div class="media">
        <a href="product-detail{{ $item->product_id }}" class="pull-left">
            <img src="./client/images/product/{{ $item->image_url }}" width="50" alt="" class="media-object">
        </a>
        <div class="media-body ml-2">
            <h6 class="media-heading">{{ $item->name }}</h6>
            <p>{{ $item->category()->first()->name }}</p>
        </div>
    </div>
    @else
    @endif
@endforeach
