<div>
    <div>
        <div class="page-header breadcrumb-wrap">
            <div class="container">
                <div class="breadcrumb">
                    <a href="/" rel="nofollow">Home</a>
                    <span></span> User
                    
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
                                            <h3 class="mb-30">Change Password</h3>
                                        </div>
                                        @if (Session::has('password_success'))
                                            <div class="alert alert-success" role="alert">{{ Session::get('password_success') }}</div>
                                        @endif
                                        @if (Session::has('password_error'))
                                            <div class="alert alert-danger" role="alert">{{ Session::get('password_error') }}</div>
                                        @endif
                                        <form class="form-horizontal" wire:submit.prevent='ChangePassword'>
                                            <div class="form-group">
                                                <label>Current Password</label>
                                                <input type="password" placeholder="Current Password" name="current_password" wire:model='current_password'>
                                                @error('current_password') <p class="text-danger">{{ $message }}</p> @enderror
                                            </div>
                                            <div class="form-group">
                                                <label>New Password</label>
                                                <input type="password" placeholder="New Password" name="password" wire:model='password'>
                                                @error('password') <p class="text-danger">{{ $message }}</p> @enderror
                                            </div>
                                            <div class="form-group">
                                                <label>Confirm Password</label>
                                                <input type="password" placeholder="Confirm Password" name="password_confirmation" wire:model='password_confirmation'>
                                                @error('password_confirmation') <p class="text-danger">{{ $message }}</p> @enderror
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