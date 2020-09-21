<div class="container-fluid " style="height: 100vh;">

    <div class="d-flex justify-content-center align-items-center  h-75 w-100 ">
        <form action="" class="d-flex flex-column border px-4 pt-4 pb-2 w-100 shadow "
            style="max-width:350px; min-height: 350px; " wire:submit.prevent='submit'>
            <h4 class="text-uppercase text-center border-bottom">Register</h4>
            <input type="text" class="form-control my-2 mt-auto" placeholder="Name" wire:model="form.name" />
            @error('form.name') <small class="text-danger">{{ $message }}</small> @enderror
            <input type="email" class="form-control my-2 " placeholder="Email" wire:model="form.email" />
            @error('form.email') <small class="text-danger">{{ $message }}</small> @enderror
            <input type="password" class="form-control my-2" placeholder="Password" wire:model="form.password" />
            @error('form.password') <small class="text-danger">{{ $message }}</small> @enderror
            <input type="password" class="form-control my-2" placeholder="Confirm Password"
                wire:model="form.password_confirmation" />
            @error('form.password_confirmation') <span class="text-danger">{{ $message }}</span> @enderror
            <input type="submit" class="btn btn-success my-2" value="Register" />
            <div class="mt-auto border-top">
                <p class="text-right mt-3"><a href="{{route('login')}}">Click here</a> to Login</p>
            </div>
        </form>
    </div>

</div>