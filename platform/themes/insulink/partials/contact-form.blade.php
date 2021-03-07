<section class="my-6">
    <div class="container">
        <div class="flex -mx-4 flex-wrap overflow-hidden">
            <div class="w-full px-3 overflow-hidden sm:w-full md:w-1/2 lg:w-1/2 xl:w-1/2">
                <div style="background: rgb(248, 248, 248); padding: 2em;">
                    <h4 class="elementskit-section-title">Our Contact Information</h4>
                    <div class="contact_wrap elementskit-infobox">
                        <div class="contact_icon">
                            <svg width="30" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" class="text-white">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                            </svg>
                        </div>
                        <div class="contact_text">
                            <span class="text-white">{{ __('Visit us at') }}</span>
                            <p class="text-white">{{ theme_option('address') }}</p>
                        </div>
                    </div>
                    <div class="contact_wrap elementskit-infobox">
                        <div class="contact_icon">
                            <svg width="30" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" class="text-white">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z" />
                            </svg>
                        </div>
                        <div class="contact_text">
                            <span class="text-white">{{ __('Email Address') }}</span>
                            <a href="mailto:{{ theme_option('email') }}" class="text-white">{{ theme_option('email') }}</a>
                        </div>
                    </div>
                    <div class="contact_wrap elementskit-infobox">
                        <div class="contact_icon">
                            <svg width="30" class="text-white" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                            </svg>
                        </div>
                        <div class="contact_text">
                            <span class="text-white">{{ __('Phone') }}</span>
                            <p class="text-white">{{ theme_option('hotline') }}</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="w-full px-3 overflow-hidden sm:w-full md:w-1/2 lg:w-1/2 xl:w-1/2">
                <div class="heading_s1">
                    <h2 class="altenate-title">{{ __('Send us a Message') }}</h2>
                </div>
                <p class="leads">
                    {{ __('We would love to hear from you, fill the form below to send us a message') }}
                </p>
                <div class="field_form">
                    {!! Form::open(['route' => 'public.send.contact', 'class' => 'form--contact contact-form', 'method'
                    =>
                    'POST']) !!}
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="contact_name" class="control-label required">{{ __('Name') }}</label>
                                <input type="text" class="form-control" name="name" value="{{ old('name') }}"
                                    id="contact_name" placeholder="{{ __('Name') }}">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="contact_email" class="control-label required">{{ __('Email') }}</label>
                                <input type="email" class="form-control" name="email" value="{{ old('email') }}"
                                    id="contact_email" placeholder="{{ __('Email') }}">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="contact_address" class="control-label">{{ __('Address') }}</label>
                                <input type="text" class="form-control" name="address" value="{{ old('address') }}"
                                    id="contact_address" placeholder="{{ __('Address') }}">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="contact_phone" class="control-label">{{ __('Phone') }}</label>
                                <input type="text" class="form-control" name="phone" value="{{ old('phone') }}"
                                    id="contact_phone" placeholder="{{ __('Phone') }}">
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="contact_subject" class="control-label">{{ __('Subject') }}</label>
                                <input type="text" class="form-control" name="subject" value="{{ old('subject') }}"
                                    id="contact_subject" placeholder="{{ __('Subject') }}">
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="contact_content" class="control-label required">{{ __('Message') }}</label>
                                <textarea name="content" id="contact_content" class="form-control" rows="5"
                                    placeholder="{{ __('Message') }}">{{ old('content') }}</textarea>
                            </div>
                        </div>
                        @if (setting('enable_captcha') && is_plugin_active('captcha'))
                        <div class="form-group col-12">
                            {!! Captcha::display() !!}
                        </div>
                        @endif
                        <div class="col-md-12">
                            <div class="form-group">
                                <button type="submit" class="btn btn-fill-out">{{ __('Send Message') }}</button>
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="contact-message contact-success-message" style="display: none"></div>
                        <div class="contact-message contact-error-message" style="display: none"></div>
                    </div>

                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
</section>