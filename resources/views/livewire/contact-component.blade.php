<main class="main">
    <div class="page-header breadcrumb-wrap">
        <div class="container">
            <div class="breadcrumb">
                <a href="/" rel="nofollow">Home</a>                    
                <span></span> Contact us
            </div>
        </div>
    </div>                
    <section class="pt-50 pb-50">
        <div class="container">
            <div class="row">
                <div class="col-xl-8 col-lg-10 m-auto">
                    <div class="contact-from-area padding-20-row-col wow FadeInUp">
                        @if (Session::has('message'))
                            <div class="alert alert-success" role="alert">{{ Session::get('message') }}</div>
                        @endif
                        <h3 class="mb-10 text-center">Leave a Message</h3>
                        <p class="text-muted mb-30 text-center font-sm">Describe the problems you encountered.</p>
                        <form class="contact-form-style text-center" id="contact-form" action="#" method="post" wire:submit.prevent='sendMessage'>
                            <div class="row">
                                <div class="col-lg-6 col-md-6">
                                    <div class="input-style mb-20">
                                        <input name="name" placeholder="Full Name" type="text" wire:model='name'>
                                        @error('name') <p class="text-danger">{{ $message }} </p> @enderror
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-6">
                                    <div class="input-style mb-20">
                                        <input name="email" placeholder="Your Email" type="email" wire:model='email'>
                                        @error('email') <p class="text-danger">{{ $message }} </p> @enderror
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-6">
                                    <div class="input-style mb-20">
                                        <input name="telephone" placeholder="Your Phone" type="tel" wire:model='phone'>
                                        @error('phone') <p class="text-danger">{{ $message }} </p> @enderror
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-6">
                                    <div class="input-style mb-20">
                                        <input name="message_subject" placeholder=" Message Subject" type="text" wire:model='subject'>
                                        @error('subject') <p class="text-danger">{{ $message }} </p> @enderror
                                    </div>
                                </div>
                                <div class="col-lg-12 col-md-12">
                                    <div class="textarea-style mb-30">
                                        <textarea name="message" placeholder="Message" wire:model='message'></textarea>
                                        @error('message') <p class="text-danger">{{ $message }} </p> @enderror
                                    </div>
                                    <button class="submit submit-auto-width" type="submit">Send message</button>
                                </div>
                            </div>
                        </form>
                        <p class="form-messege"></p>
                    </div>
                </div>
            </div>
        </div>
    </section>
</main>