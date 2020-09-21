<div class="container">
    <h3 class="text-uppercase text-center mt-5 mb-4 border-bottom">Checkout</h3>
    <form class="container-fluid bg-light p-3 p-md-4" wire:submit.prevent='submit'>
        <h4>Billing Form</h4>
        <div class="row align-items-center mt-3">
            <label for="name" class="col-md-3 text-md-right m-0">Full Name</label>
            <input type="text" class="form-control col-md-5 mx-2" id="name" name="name" wire:model="form.name">
            @error('form.name') <span class="text-danger">{{ $message }}</span> @enderror
        </div>
        <div class="row align-items-center mt-3">
            <label for="email" class="col-md-3 text-md-right m-0">Email Address</label>
            <input type="email" class="form-control col-md-5 mx-2" id="email" name="email" wire:model="form.email">
            @error('form.email') <span class="text-danger">{{ $message }}</span> @enderror
        </div>
        <div class="row align-items-center mt-3">
            <label for="address" class="col-md-3 text-md-right m-0">Billing Address</label>
            <input type="text" class="form-control col-md-5 mx-2" id="address" name="address" wire:model="form.address">
            @error('form.address') <span class="text-danger">{{ $message }}</span> @enderror
        </div>
        <div class="row align-items-center mt-3">
            <label for="phone" class="col-md-3 text-md-right m-0">Phone No.</label>
            <input type="text" class="form-control col-md-5 mx-2" id="phone" name="phone" wire:model="form.phone">
            @error('form.phone') <span class="text-danger">{{ $message }}</span> @enderror
        </div>
        <div class="mt-3">
            <h5>Products</h5>
            @forelse($products as $product)
            @isset($product->name)
            <div class="d-flex justify-content-between my-3" style="max-width: 500px">
                <div class="mx-3">
                    <img src="{{ asset('storage/images/'.$product->image_name) }}" alt="" width="50px"
                        style="object-fit: contain">
                </div>
                <div class="mr-auto" style="width: 300px">
                    {{$product->name}}
                </div>
                <div style="width: 300px">
                    Qty. {{$cartItems[$product->id]}}
                </div>
                <div class="ml-auto" style="width: 300px">
                    Rs. {{$cartItems[$product->id] * $product->price}}
                </div>
            </div>
            @endisset
            @empty
            <div class="alert alert-info text-center">
                Cart is Empty
            </div>
            <div class="text-center">
                <a href="{{route('home')}}" class="btn btn-primary">Go for Shopping</a>
            </div>
            @endforelse
        </div>
        <div class="mt-3">
            <h5>Pricing</h5>

            <div class="px-3 py-2 bg-white d-flex justify-content-between">
                <span class="d-block">Sub-Total:</span>
                <span class="d-block">Rs. {{$subtotals}}</span>
            </div>
            <div class="px-3 py-2 bg-white d-flex justify-content-between">
                <span class="d-block">Shipping Fee:</span>
                <span class="d-block">Rs. 200</span>
            </div>
            <div class="px-3 py-2 bg-primary text-white font-weight-bold d-flex justify-content-between">
                <span class="d-block">Total:</span>
                <span class="d-block">Rs. {{$subtotals + 200}}</span>
            </div>
        </div>
        <div class="d-flex justify-content-end">
            @if ($subtotals > 0)
            <input class="m-3 btn btn-success btn-lg " type="submit" value="Place An Order">
            @else
            <span class="m-3 btn btn-success btn-lg disabled" style="cursor: not-allowed">Place An Order</span>
            @endif
        </div>
    </form>
</div>