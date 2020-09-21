<div class="card m-2" style="width: 16rem;">
    <img src="{{ asset('storage/images/'.$product->image_name) }}" class="card-img-top" alt="..." loading="lazy"
        style="width: 100%; height: 200px; object-fit: cover; object-position: top">
    <div class="card-body d-flex flex-column justify-content-center">
        <h5 class="card-title mb-auto">{{$product->name}}</h5>
        <p class="card-text">{{$product->description}}</p>
        <p class="card-text">Rs. {{$product->price}}</p>
        <button class="btn btn-primary mt-auto" wire:click="$emit('addtocart', [{{$product->id}}, 1])">Add To
            Cart</button>
    </div>
</div>