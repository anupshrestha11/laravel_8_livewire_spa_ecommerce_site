<div class="p-4">
    <h4>Orders</h4>


    @if(session()->has('msg'))
    <div class="alert alert-success mt-2">{{session('msg')}}</div>
    @endif



    <table id="products" class="display table table-striped my-2">
        <thead>
            <tr class="text-uppercase text-nowrap">
                <th>Id</th>
                <th>Customer Name</th>
                <th>total Price</th>
                <th>Address</th>
                <th>Status</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            {{-- @forelse ($products as $product)
            <x-product :product="$product" />
            @empty
            <tr>
                <td colspan="7">
                    <div class="text-center">There are no Products</div>
                </td>
            </tr>
            @endforelse --}}

            <td colspan="7">
                <div class="text-center">There are no Orders</div>
            </td>
        </tbody>

    </table>
    {{-- <div class="my-3 d-flex justify-content-center">
        {{ $products->links() }}
</div> --}}
</div>