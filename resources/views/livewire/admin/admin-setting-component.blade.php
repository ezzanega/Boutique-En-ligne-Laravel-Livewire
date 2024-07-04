<div>
    <div>
        <div class="page-header breadcrumb-wrap">
            <div class="container">
                <div class="breadcrumb">
                    <a href="/" rel="nofollow">Home</a>
                    <span></span> Admin
                    
                </div>
            </div>
        </div>
    </div>
    <div>
        <section class="pt-50 pb-50">
            <div class="container">
                <div class="row">
                    <div class="m-auto col-lg-5">
                        <div class="row">
                            <div class="col-lg-10">
                                <div class="login_wrap widget-taber-content p-30 background-white border-radius-5">
                                    <div class="bg-white padding_eight_all">
                                        <div class="heading_s1">
                                            <h3 class="mb-30">Edit Settings</h3>
                                        </div>
                                        @if (Session::has('message'))
                                            <div class="alert alert-success" role="alert">{{ Session::get('message') }}</div>
                                        @endif
                                        <form class="form-horizontal" wire:submit.prevent='saveSettings'>
                                            <div class="form-group">
                                                <label>Email</label>
                                                <input type="text" placeholder="Email" wire:model='email'>
                                                @error('email') <p class="text-danger">{{ $message }}</p> @enderror
                                            </div>

                                            <div class="form-group">
                                                <label>Phone</label>
                                                <div>
                                                    <input type="text" placeholder="Phone" wire:model='phone'>
                                                    @error('phone') <p class="text-danger">{{ $message }}</p> @enderror
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <label>Phone 2</label>
                                                <input type="text" placeholder="Phone 2" wire:model='phone2'>
                                                @error('phone2') <p class="text-danger">{{ $message }}</p> @enderror
                                            </div>

                                            <div class="form-group">
                                                <label>Address</label>
                                                <input type="text" placeholder="Address" wire:model='address'>
                                                @error('address') <p class="text-danger">{{ $message }}</p> @enderror
                                            </div>

                                            <div class="form-group">
                                                <label>Twitter</label>
                                                <input type="text" placeholder="Twitter" wire:model='twitter'>
                                                @error('twitter') <p class="text-danger">{{ $message }}</p> @enderror
                                            </div>

                                            <div class="form-group">
                                                <label>Facebook</label>
                                                <input type="text" placeholder="Facebook" wire:model='facebook'>
                                                @error('facebook') <p class="text-danger">{{ $message }}</p> @enderror
                                            </div>

                                            <div class="form-group">
                                                <label>Pinterest</label>
                                                <input type="text" placeholder="Pinterest" wire:model='pinterest'>
                                                @error('pinterest') <p class="text-danger">{{ $message }}</p> @enderror
                                            </div>

                                            <div class="form-group">
                                                <label>Instagram</label>
                                                <input type="text" placeholder="Instagram" wire:model='instagram'>
                                                @error('instagram') <p class="text-danger">{{ $message }}</p> @enderror
                                            </div>

                                            <div class="form-group">
                                                <label>Youtube</label>
                                                <input type="text" placeholder="Youtube" wire:model='youtube'>
                                                @error('youtube') <p class="text-danger">{{ $message }}</p> @enderror
                                            </div>

                                            <div class="form-group">
                                                <button type="submit" class="btn btn-fill-out btn-block hover-up">Save</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
</div>