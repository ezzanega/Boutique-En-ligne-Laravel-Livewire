{{-- <x-guest-layout>
    <x-auth-card>
        <x-slot name="logo">
            <a href="/">
                <x-application-logo class="w-20 h-20 fill-current text-gray-500" />
            </a>
        </x-slot>

        <!-- Validation Errors -->
        <x-auth-validation-errors class="mb-4" :errors="$errors" />

        <form method="POST" action="{{ route('password.update') }}">
            @csrf

            <!-- Password Reset Token -->
            <input type="hidden" name="token" value="{{ $request->route('token') }}">

            <!-- Email Address -->
            <div>
                <x-label for="email" :value="__('Email')" />

                <x-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email', $request->email)" required autofocus />
            </div>

            <!-- Password -->
            <div class="mt-4">
                <x-label for="password" :value="__('Password')" />

                <x-input id="password" class="block mt-1 w-full" type="password" name="password" required />
            </div>

            <!-- Confirm Password -->
            <div class="mt-4">
                <x-label for="password_confirmation" :value="__('Confirm Password')" />

                <x-input id="password_confirmation" class="block mt-1 w-full"
                                    type="password"
                                    name="password_confirmation" required />
            </div>

            <div class="flex items-center justify-end mt-4">
                <x-button>
                    {{ __('Reset Password') }}
                </x-button>
            </div>
        </form>
    </x-auth-card>
</x-guest-layout> --}}

<x-app-layout>
    <main class="main">
        <div class="page-header breadcrumb-wrap">
            <div class="container">
                <div class="breadcrumb">
                    <a href="/" rel="nofollow">Home</a>
                    <span></span> Resset Password
                </div>
            </div>
        </div>
        <section class="pt-150 pb-150">
            <div class="container">
                <div class="row">
                    <div class="col-lg-10 m-auto">
                        <div class="row">
                            <div class="col-lg-5">
                                <div class="login_wrap widget-taber-content p-30 background-white border-radius-10 mb-md-5 mb-lg-0 mb-sm-5">
                                    <div class="padding_eight_all bg-white">
                                        <div class="heading_s1">
                                            <h3 class="mb-30">Resset Password</h3>
                                        </div>
                                        <x-auth-validation-errors class="mb-4" :errors="$errors" />
                                        <form method="post" action="{{ route('password.update') }}">
                                            @csrf

                                            <!-- Password Reset Token -->
                                            <input type="hidden" name="token" value="{{ $request->route('token') }}">
                                            <div class="form-group">
                                                <input id="email" type="email" required="" name="email" placeholder="Your Email" value="{{ $request->email }}" required autofocus>
                                            </div>
                                            <div class="form-group">
                                                <input id="password" required="" type="password" name="password" placeholder="Password" required autocomplete="new-password">
                                            </div>
                                            <div class="form-group">
                                                <input id="password_confirmation" required="" type="password" name="password_confirmation" placeholder="Confirm password" required autocomplete="new-password">
                                            </div>
                                            <div class="form-group">
                                                <button type="submit" class="btn btn-fill-out btn-block hover-up" name="submit">Reset Password</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-1"></div>
                            <div class="col-lg-6">
                                <img src="{{ asset('assets/imgs/login.png') }}">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>
</x-app-layout>