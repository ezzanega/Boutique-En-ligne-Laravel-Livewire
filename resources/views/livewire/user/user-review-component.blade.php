<div class="page-header breadcrumb-wrap">
    <div class="container">
        <div class="breadcrumb">
            <a href="/" rel="nofollow">Home</a>
            <span></span> User
            <span></span> Review
        </div>
    </div>
</div>
<div class="container">
    <div class="row">
        <!--Comments-->
        <div class="comments-area">
            <div class="row">
                <div class="col-lg-8">
                    <h4 class="mb-30">Add review for</h4>
                    <div>
                        <div class="single-comment justify-content-between d-flex">
                            <div class="user justify-content-between d-flex">
                                <div class="text-center thumb">
                                    <img src="{{ asset('assets/imgs/shop') }}/{{ $orderItem->product->image }}" alt="">
                                </div>
                                <div class="desc">
                                    <div class="d-inline-block">
                                        
                                    </div>
                                    <p>{{ $orderItem->product->name }}</p>
                                </div>
                            </div>
                        </div>
                        <div>
                            {{-- <h5 class="mb-15">Your Rating</h5> --}}
                            {{-- <div class="product-rate d-inline-block mb-30">
                                
                            </div> --}}
                            <div class="comment-form-rating">
                                <span>Your rating</span>
                                <p class="stars">
                                    
                                    <label for="rated-1"></label>
                                    <input type="radio" id="rated-1" name="rating" value="1" wire:model="rating">
                                    <label for="rated-2"></label>
                                    <input type="radio" id="rated-2" name="rating" value="2" wire:model="rating">
                                    <label for="rated-3"></label>
                                    <input type="radio" id="rated-3" name="rating" value="3" wire:model="rating">
                                    <label for="rated-4"></label>
                                    <input type="radio" id="rated-4" name="rating" value="4" wire:model="rating">
                                    <label for="rated-5"></label>
                                    <input type="radio" id="rated-5" name="rating" value="5" checked="checked" wire:model="rating">
                                    @error('rating') <span class="text-danger">{{ $message }}</span> @enderror
                                </p>
                            </div>
                            <div class="row">
                                <div class="col-lg-8 col-md-12">
                                    <form class="form-contact comment_form" action="#" id="commentForm">
                                        <div class="row">
                                            <div class="col-12">
                                                <div class="form-group">
                                                    <textarea class="form-control w-100" name="comment" id="comment" cols="30" rows="9" placeholder="Write Comment" wire:model='comment'></textarea>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <button type="submit" class="button button-contactForm">Submit
                                                Review</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--comment form-->
        {{-- <div class="comment-form">
            <h5 class="mb-15">Your Rating</h5>
            <div class="product-rate d-inline-block mb-30">
            </div>
            <div class="row">
                <div class="col-lg-8 col-md-12">
                    <form class="form-contact comment_form" action="#" id="commentForm">
                        <div class="row">
                            <div class="col-12">
                                <div class="form-group">
                                    <textarea class="form-control w-100" name="comment" id="comment" cols="30" rows="9" placeholder="Write Comment"></textarea>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <button type="submit" class="button button-contactForm">Submit
                                Review</button>
                        </div>
                    </form>
                </div>
            </div>
        </div> --}}
    </div>
</div>