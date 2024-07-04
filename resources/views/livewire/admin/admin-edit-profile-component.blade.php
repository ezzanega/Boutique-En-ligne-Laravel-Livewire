<div>
    <style>
        b{
            font-weight: bold;
        }
    </style>
    <div>
        <div class="page-header breadcrumb-wrap">
            <div class="container">
                <div class="breadcrumb">
                    <a href="/" rel="nofollow">Home</a>
                    <span></span> User
                    <span></span> Profile
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
                                            <a href="{{ route('admin.profile') }}" class="btn btn-pr btn-sm" style="position:absolute; right: 40%;">My Profile</a>
                                        <div class="heading_s1">
                                            <h3 class="mb-30">Update Profile</h3>
                                        </div>
                                        @if (Session::has('message'))
                                            <div class="alert alert-success" role="alert">{{ Session::get('message') }}</div>
                                        @endif
                                        <form wire:submit.prevent='updateProfile'>
                                            <div class="form-group">
                                                @if ($newimage)
                                                    <img src="{{ $newimage->temporaryUrl() }}" width="100%">
                                                @elseif($image)
                                                    <img src="{{ asset('assets/imgs/profile') }}/{{ $image }}" width="100%">
                                                @else
                                                    <img src="{{ asset('assets/imgs/profile/default.jpg') }}" width="100%">
                                                @endif
                                                <input type="file" class="form-control" wire:model='newimage'>
                                            </div>

                                            <div class="form-group">
                                                <p><b>Name : </b><input type="text" wire:model='name'></p>
                                                <p><b>Email : </b>{{ $email }}</p>
                                                <p><b>Phone : </b><input type="text" wire:model='mobile'></p>
                                                <hr>
                                                <p><b>Addrees line1 : </b><input type="text" wire:model='line1'></p>
                                                <p><b>Addrees line2 : </b><input type="text" wire:model='line2'></p>
                                                <p><b>City : </b><input type="text" wire:model='city'></p>
                                                <p><b>Province : </b><input type="text" wire:model='province'></p>
                                                <p><b>Country : </b><input type="text" wire:model='country'></p>
                                                <p><b>Zip Code : </b><input type="text" wire:model='zipcode'></p>
                                            </div>
                                            <div class="form-group">
                                                <button type="submit" class="btn btn-fill-out btn-block hover-up">Update</button>
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