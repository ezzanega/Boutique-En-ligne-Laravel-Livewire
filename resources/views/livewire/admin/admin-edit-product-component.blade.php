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
                                        <a href="{{ route('admin.products') }}" class="btn btn-pr btn-sm float-end">All Products</a>
                                        <div class="heading_s1">
                                            <h3 class="mb-30">Edit Product</h3>
                                        </div>
                                        @if (Session::has('message'))
                                            <div class="alert alert-success" role="alert">
                                                {{ Session::get('message') }}</div>
                                        @endif
                                        <form class="form-horizontal" enctype="multipart/form-data" wire:submit.prevent='updateProduct'>
                                            <div class="form-group">
                                                <label>Product Name</label>
                                                <input type="text" placeholder="Product Name" wire:model='name' wire:keyup='generateSlug'>
                                                @error('name') <p class="text-danger">{{ $message }}</p> @enderror
                                            </div>

                                            <div class="form-group">
                                                <label>Product Slug</label>
                                                <input type="text" placeholder="Product Slug" wire:model='slug' disabled>
                                                @error('slug') <p class="text-danger">{{ $message }}</p> @enderror
                                            </div>

                                            <div class="form-group" wire:ignore>
                                                <label>Short Description</label>
                                                <textarea type="text" id="short_description" placeholder="Short Description" wire:model='short_description'></textarea>
                                                @error('short_description') <p class="text-danger">{{ $message }}</p> @enderror
                                            </div>

                                            <div class="form-group" wire:ignore>
                                                <label>Description</label>
                                                <textarea type="text" id="description" placeholder="Description" wire:model='description'></textarea>
                                                @error('description') <p class="text-danger">{{ $message }}</p> @enderror
                                            </div>

                                            <div class="form-group">
                                                <label>Regular Price</label>
                                                <input type="text" placeholder="Regular Price" wire:model='regular_price'>
                                                @error('regular_price') <p class="text-danger">{{ $message }}</p> @enderror
                                            </div>

                                            <div class="form-group">
                                                <label>Sale Price</label>
                                                <input type="text" placeholder="Sale Price" wire:model='sale_price'>
                                                @error('sale_price') <p class="text-danger">{{ $message }}</p> @enderror
                                            </div>

                                            <div class="form-group">
                                                <label>SKU</label>
                                                <input type="text" placeholder="SKU" wire:model='SKU'>
                                                @error('SKU') <p class="text-danger">{{ $message }}</p> @enderror
                                            </div>

                                            <div class="form-group">
                                                <label>Stock</label>
                                                <div>
                                                    <select class="form-select" wire:model='stock_status'>
                                                        <option class="fs-6" value="instock">InStock</option>
                                                        <option class="fs-6" value="outstock">Out of Stock</option>
                                                    </select>
                                                    @error('stock_status') <p class="text-danger">{{ $message }}</p> @enderror
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <label>Featured</label>
                                                <div>
                                                    <select class="form-select" wire:model='featured'>
                                                        <option class="fs-6" value="0">No</option>
                                                        <option class="fs-6" value="1">Yes</option>
                                                    </select>
                                                </div>
                                            </div>
                                            
                                            <div class="form-group">
                                                <label>Quantity</label>
                                                <input type="text" placeholder="Quantity" wire:model='quantity'>
                                                @error('quantity') <p class="text-danger">{{ $message }}</p> @enderror
                                            </div>

                                            <div class="form-group">
                                                <label>Product image</label>
                                                <div>
                                                    <input type="file" class="form-control input-file" wire:model='newimage'>
                                                    @if ($newimage)
                                                        <div class="text-center">
                                                            <img class="mt-2" src="{{ $newimage->temporaryUrl() }}" width="200">
                                                        </div>
                                                    @else
                                                        <div class="text-center">
                                                            <img class="mt-1" src="{{ asset('assets/imgs/shop') }}/{{ $image }}" width="200">
                                                        </div>
                                                    @endif
                                                    {{-- @error('newimage') <p class="text-danger">{{ $message }}</p> @enderror --}}
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <label>Product Gallery</label>
                                                <div>
                                                    <input type="file" class="form-control input-file" wire:model='newimages' multiple>
                                                    @if ($newimages)
                                                        @foreach ($newimages as $newimage)    
                                                            @if ($newimage)
                                                                <div class="text-center">
                                                                    <img class="mt-1" src="{{ $newimage->temporaryUrl() }}" width="200">
                                                                </div>
                                                            @endif                                                 
                                                        @endforeach
                                                    @else
                                                        @foreach ($images as $image)
                                                            @if($image)
                                                                <div class="text-center">
                                                                    <img class="mt-1" src="{{ asset('assets/imgs/shop') }}/{{ $image }}" width="200">
                                                                </div>
                                                            @endif
                                                        @endforeach
                                                    @endif
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <label>Category</label>
                                                <div>
                                                    <select class="form-select" wire:model='category_id'>
                                                        <option class="fs-6" value="">Select Category</option>
                                                        @foreach ($categories as $category)
                                                            <option class="fs-6" value="{{ $category->id }}">{{ $category->name }}</option>  
                                                        @endforeach                                       
                                                    </select>
                                                    @error('category_id') <p class="text-danger">{{ $message }}</p> @enderror
                                                </div>
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

@push('scripts')
    <script>
        $(function(){
            tinymce.init({
                selector : '#short_description',
                setup:function(editor){
                    editor.on('Change',function(e){
                        tinyMCE.triggerSave();
                        var sd_data = $('#short_description').val();
                        @this.set('short_description',sd_data);
                    });
                }
            });

            tinymce.init({
                selector : '#description',
                setup:function(editor){
                    editor.on('Change',function(e){
                        tinyMCE.triggerSave();
                        var d_data = $('#description').val();
                        @this.set('description',d_data);
                    });
                }
            });
        });
    </script>
@endpush