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
                                        <a href="{{ route('admin.homeslider') }}" class="btn btn-pr btn-sm float-end">All Slides</a>
                                        <div class="heading_s1">
                                            <h3 class="mb-30">Edit Slider</h3>
                                        </div>
                                        @if (Session::has('message'))
                                            <div class="alert alert-success" role="alert">
                                                {{ Session::get('message') }}</div>
                                        @endif
                                        <form class="form-horizontal" wire:submit.prevent='UpdateSlide'>
                                            <div class="form-group">
                                                <label>Title</label>
                                                <input type="text" placeholder="Title" wire:model='title'>
                                                @error('title') <p class="text-danger">{{ $message }}</p> @enderror
                                            </div>

                                            <div class="form-group">
                                                <label>Subtitle</label>
                                                <input type="text" placeholder="Subtitle" wire:model='subtitle'>
                                                @error('subtitle') <p class="text-danger">{{ $message }}</p> @enderror
                                            </div>

                                            <div class="form-group">
                                                <label>Price</label>
                                                <input type="text" placeholder="Price" wire:model='price'>
                                                @error('price') <p class="text-danger">{{ $message }}</p> @enderror
                                            </div>

                                            <div class="form-group">
                                                <label>Link</label>
                                                <input type="text" placeholder="Link" wire:model='link'>
                                                @error('link') <p class="text-danger">{{ $message }}</p> @enderror
                                            </div>

                                            <div class="form-group">
                                                <label>Image (731 * 470)</label>
                                                <input type="file" class="form-control input-file" wire:model='newimage'>
                                                @if ($newimage)
                                                    <div class="text-center">
                                                        <img class="mt-1" src="{{ $newimage->temporaryUrl() }}" width="500">
                                                    </div>
                                                @else
                                                    <div class="text-center">
                                                        <img class="mt-1" src="{{ asset('assets/imgs/slider') }}/{{ $image }}" width="500">
                                                    </div>
                                                @endif
                                                {{-- @error('newimage') <p class="text-danger">{{ $message }}</p> @enderror --}}
                                            </div>

                                            <div class="form-group">
                                                <label>Status</label>
                                                <div>
                                                    <select class="form-select" wire:model='status'>
                                                        <option class="fs-6" value="0">Inactive</option>
                                                        <option class="fs-6" value="1">Active</option>
                                                    </select>
                                                    @error('status') <p class="text-danger">{{ $message }}</p> @enderror
                                                </div>
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