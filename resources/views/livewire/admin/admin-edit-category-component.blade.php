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
                                        <a href="{{ route('admin.categories') }}" class="btn btn-pr btn-sm float-end">All Categories</a>
                                        <div class="heading_s1">
                                            <h3 class="mb-30">Edit Category</h3>
                                        </div>
                                        @if (Session::has('message'))
                                            <div class="alert alert-success" role="alert">
                                                {{ Session::get('message') }}</div>
                                        @endif
                                        <form class="form-horizontal" wire:submit.prevent='updateCategory'>
                                            <div class="form-group">
                                                <input type="text" placeholder="Category Name" wire:model='name' wire:keyup='generateSlug'>
                                                @error('name') <p class="text-danger">{{ $message }}</p> @enderror
                                            </div>
                                            <div class="form-group">
                                                <input type="text" placeholder="Category Slug" wire:model='slug' disabled>
                                                @error('slug') <p class="text-danger">{{ $message }}</p> @enderror
                                            </div>
                                            <div class="form-group">
                                                <button type="submit"
                                                    class="btn btn-fill-out btn-block hover-up">Update</button>
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