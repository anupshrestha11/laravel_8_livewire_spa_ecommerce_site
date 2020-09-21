<div class="container-fluid p-4">

    <div class="d-flex justify-content-between">
        <h4>Add New Product</h4>
        <a href="{{route('dashboard.products')}}" class="btn btn-info">Go Back</a>
    </div>

    <form class=" my-3  rounded  pb-3 shadow container p-0 " style="background: #DAE0E2;" wire:submit.prevent="submit">
        <h5 class="py-3 border rounded text-white-50 m-0 px-3" style="background: #616C6F">Product Information</h5>
        <div class="d-flex align-items-center my-4 mx-auto flex-wrap" style="max-width: 1000px">
            <label for="name" class=" m-0 text-nowrap px-3" style="width: 200px">Product Name</label>
            <div class="px-2    flex-grow-1" style="min-width: 300px">
                <input type="text" name="name" id="name" class="form-control" wire:model='form.name'>
                @error('form.name') <span class="text-danger">{{ $message }}</span> @enderror
            </div>
        </div>
        <div class="d-flex align-items-center my-4 mx-auto flex-wrap" style="max-width: 1000px">
            <label for="sku" class=" m-0 text-nowrap px-3" style="width: 200px">Product Sku</label>
            <div class="px-2    flex-grow-1" style="min-width: 300px">
                <input type="text" name="sku" id="sku" class="form-control " wire:model='form.sku'>
                @error('form.sku') <span class="text-danger">{{ $message }}</span> @enderror
            </div>
        </div>
        <div class="d-flex align-items-center my-4 mx-auto flex-wrap" style="max-width: 1000px">
            <label for="price" class=" m-0 text-nowrap px-3" style="width: 200px">Product Price</label>
            <div class="px-2    flex-grow-1" style="min-width: 300px">
                <input type="number" name="price" id="price" class="form-control " wire:model='form.price'>
                @error('form.price') <span class="text-danger">{{ $message }}</span> @enderror
            </div>
        </div>
        <div class="d-flex align-items-center my-4 mx-auto flex-wrap" style="max-width: 1000px">
            <label for="description" class=" m-0 text-nowrap px-3 mb-auto mt-2" style="width: 200px">Product
                Description</label>
            <div class="px-2    flex-grow-1" style="min-width: 300px">
                <textarea type="text" name="name" id="name" class="form-control " rows="10"
                    wire:model='form.description'></textarea>
                @error('form.description') <span class="text-danger">{{ $message }}</span> @enderror
            </div>
        </div>
        <div class="d-flex align-items-center my-4 mx-auto flex-wrap" style="max-width: 1000px">
            <label for="quantity" class=" m-0 text-nowrap px-3" style="width: 200px">Product Quantity</label>
            <div class="px-2    flex-grow-1" style="min-width: 300px">
                <input type="number" name="quantity" id="quantity" class="form-control " wire:model="form.quantity">
                @error('form.quantity') <span class="text-danger">{{ $message }}</span> @enderror
            </div>
        </div>
        <div class="d-flex  my-4 mx-auto flex-wrap" style="max-width: 1000px">
            <label for="image" class=" m-0 mt-2 text-nowrap px-3" style="width: 200px">Product Image</label>
            <div class="px-2 d-flex flex-wrap flex-grow-1" style="min-width: 300px">
                <input type="file" name="image" id="image" class="form-control-file " wire:model="form.image">
                @error('form.image') <span class="text-danger">{{ $message }}</span> @enderror
                <div wire:loading wire:target="form.image"><iframe src="https://giphy.com/embed/y1ZBcOGOOtlpC"
                        width="100px" height="100px" frameBorder="0" class="giphy-embed" allowFullScreen></iframe>
                </div>
                @if ($form['image'])
                <div class="mt-1 ">
                    <img src="{{ $form['image']->temporaryUrl() }}" width="100px">
                </div>
                @elseif ($form['image_name'])
                <div class="mt-1 ">
                    <img src="{{asset('storage/images/'.$form['image_name']) }}" width="100px">
                </div>
                @endif


            </div>
        </div>

        <div class="d-flex justify-content-center align-items-center my-4 mx-auto flex-wrap" style="max-width: 1000px">
            <div class="px-2 ">
                <input type="submit" class="btn btn-success " value="Submit">
            </div>
        </div>

    </form>
</div>