<tr>
    <td>{{$product->id}}</td>
    <td>{{$product->name}}</td>
    <td>{{$product->sku}}</td>
    <td>{{$product->price}}</td>
    <td>{{$product->quantity}}</td>
    <td><img src="{{ asset('storage/images/'.$product->image_name) }}" width="50px" alt=""></td>
    <td><a class="btn p-0 m-0 mx-2 text-info" wire:click="edit({{$product->id}})"><i class="far fa-edit"></i></a><a
            class="btn p-0 m-0 mx-2 text-danger" wire:click="delete({{$product->id}})"><i class="fas fa-trash"></i></a>
    </td>
</tr>