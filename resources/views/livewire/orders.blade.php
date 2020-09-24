<div class="p-4">
    <h4>Orders</h4>


    @if(session()->has('msg'))
    <div class="alert alert-success mt-2">{{session('msg')}}</div>
    @endif



    <table id="orders" class="display table  my-2 accordion">
        <thead>
            <tr class="text-uppercase text-nowrap">
                <th>Id</th>
                <th>Customer Name</th>
                <th>email</th>
                <th>contact</th>
                <th>Address</th>
                <th>Status</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($orders as $order)
            {{-- <x-product :product="$product" /> --}}
            <tr>
                <td>{{$loop->index + 1}}</td>
                <td>{{$order->name}}</td>
                <td>{{$order->email}}</td>
                <td>{{$order->phone}}</td>
                <td>{{$order->address}}</td>
                <td>{{$order->status}}</td>
                <td>
                    <button class="btn btn-info btn-sm m-1" data-toggle="collapse" href="{{'#table_id'.$order->id}}"
                        role="button" aria-expanded="false" aria-controls="{{'#table_id'.$order->id}}">View Order
                        Product <i class="fas fa-chevron-down"></i></button>
                    @if ($order->status == 'ready to ship')
                    <button class="btn btn-success btn-sm m-1" wire:click="completed({{$order->id}})">Completed</button>
                    @else
                    <button class="btn btn-success btn-sm m-1 disabled" style="cursor: not-allowed"
                        )">Completed</button>
                    @endif

                    <button class="btn btn-danger btn-sm m-1">Cancel</button>
                </td>
            </tr>

            <tr class="collapse" id="{{'table_id'.$order->id}}" data-parent="#orders">
                <td colspan="1000 ">
                    <table class="table table-striped">
                        <tr class="text-uppercase">
                            <th>s/n</th>
                            <th>product name</th>
                            <th>price</th>
                            <th>quantity</th>
                            <th>total</th>
                            <th>status</th>
                            <th>Action</th>
                        </tr>
                        @foreach ($order->products as $product)
                        <tr>
                            <td>{{$loop->index + 1}}</td>
                            <td>{{$product->name}}</td>
                            <td>Rs. {{$product->price}}</td>
                            <td>{{$product->pivot->quantity}}</td>
                            <td>Rs. {{$product->pivot->quantity * $product->price}}</td>
                            <td>{{$product->pivot->status   }}</td>
                            <td>

                                @if ($product->pivot->status == 'pending')
                                <button class="btn btn-success btn-sm m-1"
                                    wire:click="readyToShip({{$order->id}}, {{$product->id}})">Ready to
                                    Ship</button>
                                @else
                                <button class="btn btn-success btn-sm m-1 disabled" style="cursor: not-allowed">Ready to
                                    Ship</button>
                                @endif


                                <button class="btn btn-danger btn-sm m-1">Cancel</button>
                            </td>
                        </tr>
                        @endforeach
                    </table>
                </td>
            </tr>

            @empty
            <tr>
                <td colspan="7">
                    <div class="text-center">There are no Products</div>
                </td>
            </tr>
            @endforelse


        </tbody>

    </table>
    <div class="my-3 d-flex justify-content-center">
        {{ $orders->links() }}
    </div>
</div>