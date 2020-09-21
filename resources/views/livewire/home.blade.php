<div class="container pt-5">
    {{-- <button class="btn btn-success" wire:click="$emit('addtocart', 1)"> add to cart</button> --}}

    <div class="mb-5 mt-3">
        <h4 class="text-center text-uppercase border-bottom mb-3 pb-3">Featured</h4>
        <div class="products d-flex flex-wrap justify-content-around">
            @forelse ($products->take(4) as $product)
            <x-product-card :product="$product" />
            @empty <div class="alert alert-warning">
                there are no products
            </div>
            @endforelse

        </div>
        <div class="my-5">
            <h4 class="text-center text-uppercase border-bottom mb-3 pb-3">Our FAVORITES</h4>
            <div class="products d-flex flex-wrap justify-content-around">
                @forelse ($products->take(3) as $product)

                <x-product-card :product="$product" />
                @empty <div class="alert alert-warning">
                    there are no products
                </div>
                @endforelse

            </div>

            <div class="my-5">
                <h4 class="text-center text-uppercase border-bottom mb-3 pb-3">Latest</h4>
                <div class="products d-flex flex-wrap justify-content-around">
                    @forelse ($products as $product)
                    <x-product-card :product="$product" />
                    @empty <div class="alert alert-warning">
                        there are no products
                    </div>
                    @endforelse

                </div>


            </div>




        </div>