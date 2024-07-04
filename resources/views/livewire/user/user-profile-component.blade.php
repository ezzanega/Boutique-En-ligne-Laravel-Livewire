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
                                        <div class="heading_s1">
                                            <h3 class="mb-30">Profile</h3>
                                        </div>
                                        <div class="form-group">
                                            @if ($user->profile->image)
                                                <img src="{{ asset('assets/imgs/profile') }}/{{ $user->profile->image }}" width="100%">
                                            @else
                                                <img src="{{ asset('assets/imgs/profile/default.jpg') }}" width="100%">
                                            @endif
                                        </div>

                                        <div class="form-group">
                                            <p><b>Name : </b>{{ $user->name }}</p>
                                            <p><b>Email : </b>{{ $user->email }}</p>
                                            <p><b>Phone : </b>{{ $user->profile->mobile }}</p>
                                            <hr>
                                            <p><b>Address line1 : </b>{{ $user->profile->line1 }}</p>
                                            <p><b>Addrees line2 : </b>{{ $user->profile->line2 }}</p>
                                            <p><b>City : </b>{{ $user->profile->city }}</p>
                                            <p><b>Province : </b>{{ $user->profile->province }}</p>
                                            <p><b>Country : </b>{{ $user->profile->country }}</p>
                                            <p><b>Zip Code : </b>{{ $user->profile->zipcode }}</p>
                                            <a href="{{ route('user.editprofile') }}" class="btn btn-pr">Update Profile</a>
                                        </div>
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