<div class="container">

    <h3 class="text-uppercase text-center mt-5 border-bottom">My cart</h3>

    <table class="table table-hover  mt-5">
        <thead>
            <tr>
                <th>Product Name</th>
                <th>Product image</th>
                <th>Product price</th>
                <th>Quantity</th>
                <th>Sub-Total</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            @forelse ($products as $product)
            <tr>
                @isset($product->name)
                <td>{{$product->name}}</td>
                <td><img src="{{ asset('storage/images/'.$product->image_name) }}" alt="" width="60px" height="60px"
                        style="object-fit:contain">
                </td>
                <td>Rs. {{$product->price}}</td>
                <td>
                    <div class="d-flex justify-content-between align-items-center" style="width: 150px">
                        <button class="btn btn-secondary shadow " wire:click="increment({{$product->id}})"><i
                                class="fas fa-plus"></i></button>
                        <span>{{$cartItems[$product->id]}}</span>
                        <button @if ($cartItems[$product->id] > 1)
                            class="btn btn-secondary shadow "
                            wire:click="decrement({{$product->id}})"
                            @else
                            class="btn btn-light"
                            @endif><i class="fas fa-minus"></i></button>
                    </div>
                </td>
                <td>Rs. {{$cartItems[$product->id] * $product->price}}</td>
                <td><button class="btn  btn-danger btn-sm" wire:click="remove({{$product->id}})">Remove</button></td>

                @endisset
            </tr>

            @empty

            <tr>
                <td colspan="6" class="text-center">
                    Cart is Empty
                </td>
            </tr>

            @endforelse
            <tr>
                <td colspan="4" class="text-right text-uppercase font-weight-bold">Sub-totals: </td>

                <td class="font-weight-bold">Rs. {{$subtotals}}</td>
                <td>@if ($subtotals> 0)
                    <a href="{{route('checkout')}}" class="btn btn-success">Checkout</a>
                    @else
                    <span class="btn btn-success disabled " style="cursor: not-allowed">Checkout</span>
                    @endif

                </td>
            </tr>
        </tbody>
    </table>

</div>