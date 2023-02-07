@extends('admin.layouts.master')
@section('title', settings()->website_title . ' | ' . __('words.settings'))
@section('breadcrumb')
    <div class="d-flex align-items-baseline flex-wrap mr-5">
        <!--begin::Breadcrumb-->
        <h5 class="text-dark font-weight-bold my-1 mr-5">{{ __('words.settings') }}</h5>
        <ul class="breadcrumb breadcrumb-transparent breadcrumb-dot font-weight-bold p-0 my-2 font-size-sm">
            <li class="breadcrumb-item">
                <a href="{{ route('admin.home') }}" class="text-muted">{{ __('words.home') }}</a>
            </li>
            <li class="breadcrumb-item">
                <span class="text-muted">{{ __('words.settings') }}</span>
            </li>
        </ul>
        <!--end::Breadcrumb-->
    </div>
@endsection
@extends('admin.components.create-form')
@section('form_action', route('settings.update', $setting->id))
@section('form_type', 'POST')

@section('form_content')
    @method('put')
    <input type="hidden" name="id" value="{{ $setting->id }}">
    <div class="card card-custom mb-2">
        <div class="card-header card-header-tabs-line">
            <div class="card-title">
                <h3 class="card-label">{{ __('words.edit_setting') }}</h3>
            </div>
            <div class="card-toolbar">
                <ul class="nav nav-tabs nav-bold nav-tabs-line">
                    @foreach (config('translatable.locales') as $key => $locale)
                        <li class="nav-item">
                            <a class="nav-link  @if ($key == 0) active @endif" data-toggle="tab"
                                href="{{ '#' . $locale }}">{{ __('words.locale-' . $locale) }}</a>
                        </li>
                    @endforeach
                </ul>
            </div>
        </div>
        <div class="card-body">
            <div class="tab-content">
                @foreach (config('translatable.locales') as $key => $locale)
                    <div class="tab-pane fade show @if ($key == 0) active @endif" id="{{ $locale }}"
                        role="tabpanel">
                        <div class="col form-group">
                            <label>{{ __('words.website_title') }} - {{ __('words.locale-' . $locale) }}<span
                                    class="text-danger"> * </span></label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="flaticon-edit"></i></span>
                                </div>
                                <input type="text" name="{{ $locale . '[website_title]' }}"
                                    placeholder="{{ __('words.website_title') }}"
                                    class="form-control  pl-5 min-h-40px @error($locale . '.website_title') is-invalid @enderror"
                                    value="{{ old($locale . '.website_title', $setting->translate($locale)->website_title) }}">
                                @error($locale . '[website_title]')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="col form-group">
                            <label>{{ __('words.meta_title') }} - {{ __('words.locale-' . $locale) }}<span
                                    class="text-danger"> * </span></label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="flaticon-edit"></i></span>
                                </div>
                                <input type="text" name="{{ $locale . '[meta_title]' }}"
                                    placeholder="{{ __('words.meta_title') }}"
                                    class="form-control  pl-5 min-h-40px @error($locale . '.meta_title') is-invalid @enderror"
                                    value="{{ old($locale . '.meta_title', $setting->translate($locale)->meta_title) }}">
                                @error($locale . '[meta_title]')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="col form-group">
                            <label>{{ __('words.copyrights') }} - {{ __('words.locale-' . $locale) }}<span
                                    class="text-danger"> * </span></label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="flaticon-edit"></i></span>
                                </div>
                                <input type="text" name="{{ $locale . '[copyrights]' }}"
                                    placeholder="{{ __('words.copyrights') }}"
                                    class="form-control  pl-5 min-h-40px @error($locale . '.copyrights') is-invalid @enderror"
                                    value="{{ old($locale . '.copyrights', $setting->translate($locale)->copyrights) }}">
                                @error($locale . '[copyrights]')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="col form-group">
                            <label>{{ __('words.address') }}({{ __('words.locale-' . $locale) }})<span
                                    class="text-danger">*</span></label>
                            <textarea class="form-control @error($locale . '.address') is-invalid @enderror " type="text"
                                name="{{ $locale . '[address]' }}" rows="4">{{ old($locale . '.address', $setting->translate($locale)->address) }} </textarea>
                            @error($locale . '[address]')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="col form-group">
                            <label>{{ __('words.meta_description') }}({{ __('words.locale-' . $locale) }})<span
                                    class="text-danger">*</span></label>
                            <textarea class="form-control ckeditor @error($locale . '.meta_description') is-invalid @enderror " type="text"
                                name="{{ $locale . '[meta_description]' }}" rows="4">{{ old($locale . '.meta_description', $setting->translate($locale)->meta_description) }} </textarea>
                            @error($locale . '[meta_description]')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="col form-group">
                            <label>{{ __('words.footer_description') }}({{ __('words.locale-' . $locale) }})<span
                                    class="text-danger">*</span></label>
                            <textarea class="form-control ckeditor @error($locale . '.footer_description') is-invalid @enderror " type="text"
                                name="{{ $locale . '[footer_description]' }}" rows="4">{{ old($locale . '.footer_description', $setting->translate($locale)->footer_description) }} </textarea>
                            @error($locale . '[footer_description]')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>


                    </div>
                @endforeach
            </div>
        </div>
    </div>

    <div class="card card-custom">
        <div class="card-body">
            {{--            <div class="form-group row"> --}}
            {{--                <div class="input-group col-6"> --}}
            {{--                    <label>{{__('words.facebook')}}</label> --}}
            {{--                    <div class="input-group"> --}}
            {{--                        <div class="input-group-prepend"> --}}
            {{--                            <span class="input-group-text"><i class="fab fa-facebook-square"></i></span> --}}
            {{--                        </div> --}}
            {{--                        <input type="text" name="facebook" class="form-control link @error('facebook') is-invalid @enderror" --}}
            {{--                               value="{{ old('facebook',$setting->facebook) }}" placeholder="{{__('words.facebook')}}"> --}}

            {{--                        @error('facebook') --}}
            {{--                        <span class="invalid-feedback" role="alert"> --}}
            {{--                            <strong>{{ $message }}</strong> --}}
            {{--                        </span> --}}
            {{--                        @enderror --}}
            {{--                    </div> --}}
            {{--                </div> --}}

            {{--                <div class="input-group col-6"> --}}
            {{--                    <label>{{__('words.instagram')}}</label> --}}
            {{--                    <div class="input-group"> --}}
            {{--                        <div class="input-group-prepend"> --}}
            {{--                            <span class="input-group-text"><i class="fab fa-instagram"></i></span> --}}
            {{--                        </div> --}}
            {{--                        <input type="text" name="instagram" --}}
            {{--                               class="form-control link @error('instagram') is-invalid @enderror" --}}
            {{--                               value="{{ old('instagram',$setting->instagram) }}" --}}
            {{--                               placeholder="{{__('words.instagram')}}"> --}}

            {{--                        @error('instagram') --}}
            {{--                        <span class="invalid-feedback" role="alert"> --}}
            {{--                        <strong>{{ $message }}</strong> --}}
            {{--                    </span> --}}
            {{--                        @enderror --}}
            {{--                    </div> --}}
            {{--                </div> --}}

            {{--            </div> --}}
            {{--            <div class="form-group row"> --}}
            {{--                <div class="input-group col-6"> --}}
            {{--                    <label>{{__('words.twitter')}}</label> --}}
            {{--                    <div class="input-group"> --}}
            {{--                        <div class="input-group-prepend"> --}}
            {{--                            <span class="input-group-text"><i class="fab fa-twitter-square"></i></span> --}}
            {{--                        </div> --}}
            {{--                        <input type="text" name="twitter" class="form-control link @error('twitter') is-invalid @enderror" --}}
            {{--                               value="{{ old('twitter',$setting->twitter) }}" placeholder="{{__('words.twitter')}}"> --}}

            {{--                        @error('twitter') --}}
            {{--                        <span class="invalid-feedback" role="alert"> --}}
            {{--                        <strong>{{ $message }}</strong> --}}
            {{--                    </span> --}}
            {{--                        @enderror --}}
            {{--                    </div> --}}
            {{--                </div> --}}

            {{--                <div class="input-group col-6"> --}}
            {{--                    <label>{{__('words.linkedin')}}</label> --}}
            {{--                    <div class="input-group"> --}}
            {{--                        <div class="input-group-prepend"> --}}
            {{--                            <span class="input-group-text"><i class="fab fa-linkedin"></i></span> --}}
            {{--                        </div> --}}
            {{--                        <input type="text" name="linkedin" class="form-control link @error('linkedin') is-invalid @enderror" --}}
            {{--                               value="{{ old('linkedin',$setting->linkedin) }}" placeholder="{{__('words.linkedin')}}"> --}}

            {{--                        @error('linkedin') --}}
            {{--                        <span class="invalid-feedback" role="alert"> --}}
            {{--                        <strong>{{ $message }}</strong> --}}
            {{--                    </span> --}}
            {{--                        @enderror --}}
            {{--                    </div> --}}
            {{--                </div> --}}
            {{--            </div> --}}
            {{--            <div class="form-group row"> --}}
            {{--                <div class="input-group col-6"> --}}
            {{--                    <label>{{__('words.youtube')}}</label> --}}
            {{--                    <div class="input-group"> --}}
            {{--                        <div class="input-group-prepend"> --}}
            {{--                            <span class="input-group-text"><i class="fab fa-youtube"></i></span> --}}
            {{--                        </div> --}}
            {{--                        <input type="text" name="youtube" class="form-control link @error('youtube') is-invalid @enderror" --}}
            {{--                               value="{{ old('youtube',$setting->youtube) }}" placeholder="{{__('words.youtube')}}"> --}}

            {{--                        @error('youtube') --}}
            {{--                        <span class="invalid-feedback" role="alert"> --}}
            {{--                        <strong>{{ $message }}</strong> --}}
            {{--                    </span> --}}
            {{--                        @enderror --}}
            {{--                    </div> --}}
            {{--                </div> --}}
            {{--            </div> --}}


            {{--            <div class="row mb-3"> --}}
            {{--                <div class="col-4"> --}}
            {{--                    <label>{{__('words.phone')}}</label> --}}
            {{--                    <div class="input-group"> --}}
            {{--                        <div class="input-group-prepend"> --}}
            {{--                            <span class="input-group-text"><i class="fas fa-phone"></i></span> --}}
            {{--                        </div> --}}
            {{--                        <input type="text" name="phone" class="form-control @error('phone') is-invalid @enderror" --}}
            {{--                               value="{{ old('phone',$setting->phone) }}" placeholder="{{__('words.phone')}}"> --}}

            {{--                        @error('phone') --}}
            {{--                        <span class="invalid-feedback" role="alert"> --}}
            {{--                                <strong>{{ $message }}</strong> --}}
            {{--                            </span> --}}
            {{--                        @enderror --}}
            {{--                    </div> --}}
            {{--                </div> --}}

            {{--                <div class="col-4"> --}}
            {{--                    <label>{{__('words.phone')}}</label> --}}
            {{--                    <div class="input-group"> --}}
            {{--                        <div class="input-group-prepend"> --}}
            {{--                            <span class="input-group-text"><i class="fas fa-phone"></i></span> --}}
            {{--                        </div> --}}
            {{--                        <input type="text" name="phone2" class="form-control @error('phone2') is-invalid @enderror" --}}
            {{--                               value="{{ old('phone2',$setting->phone2) }}" placeholder="{{__('words.phone')}}"> --}}

            {{--                        @error('phone2') --}}
            {{--                        <span class="invalid-feedback" role="alert"> --}}
            {{--                                <strong>{{ $message }}</strong> --}}
            {{--                            </span> --}}
            {{--                        @enderror --}}
            {{--                    </div> --}}
            {{--                </div> --}}

            {{--                <div class="col-4"> --}}
            {{--                    <label>{{__('words.phone')}}</label> --}}
            {{--                    <div class="input-group"> --}}
            {{--                        <div class="input-group-prepend"> --}}
            {{--                            <span class="input-group-text"><i class="fas fa-phone"></i></span> --}}
            {{--                        </div> --}}
            {{--                        <input type="text" name="phone3" class="form-control @error('phone3') is-invalid @enderror" --}}
            {{--                               value="{{ old('phone3',$setting->phone3) }}" placeholder="{{__('words.phone')}}"> --}}

            {{--                        @error('phone3') --}}
            {{--                        <span class="invalid-feedback" role="alert"> --}}
            {{--                                <strong>{{ $message }}</strong> --}}
            {{--                            </span> --}}
            {{--                        @enderror --}}
            {{--                    </div> --}}
            {{--                </div> --}}
            {{--            </div> --}}


            {{--            <div class="row mb-3"> --}}
            {{--                <div class="col-4"> --}}
            {{--                    <label>{{__('words.email')}}</label> --}}
            {{--                    <div class="input-group"> --}}
            {{--                        <div class="input-group-prepend"> --}}
            {{--                            <span class="input-group-text"><i class="fas fa-envelope"></i></span> --}}
            {{--                        </div> --}}
            {{--                        <input type="text" name="email" class="form-control @error('email') is-invalid @enderror" --}}
            {{--                               value="{{ old('email',$setting->email) }}" placeholder="{{__('words.email')}}"> --}}
            {{--                        @error('email') --}}
            {{--                        <span class="invalid-feedback" role="alert"> --}}
            {{--                                <strong>{{ $message }}</strong> --}}
            {{--                            </span> --}}
            {{--                        @enderror --}}
            {{--                    </div> --}}
            {{--                </div> --}}

            {{--                <div class="col-4"> --}}
            {{--                    <label>{{__('words.email')}}</label> --}}
            {{--                    <div class="input-group"> --}}
            {{--                        <div class="input-group-prepend"> --}}
            {{--                            <span class="input-group-text"><i class="fas fa-envelope"></i></span> --}}
            {{--                        </div> --}}
            {{--                        <input type="text" name="email2" class="form-control @error('email1') is-invalid @enderror" --}}
            {{--                               value="{{ old('email2',$setting->email2) }}" placeholder="{{__('words.email')}}"> --}}
            {{--                        @error('email2') --}}
            {{--                        <span class="invalid-feedback" role="alert"> --}}
            {{--                                <strong>{{ $message }}</strong> --}}
            {{--                            </span> --}}
            {{--                        @enderror --}}
            {{--                    </div> --}}
            {{--                </div> --}}

            {{--                <div class="col-4"> --}}
            {{--                    <label>{{__('words.email')}}</label> --}}
            {{--                    <div class="input-group"> --}}
            {{--                        <div class="input-group-prepend"> --}}
            {{--                            <span class="input-group-text"><i class="fas fa-envelope"></i></span> --}}
            {{--                        </div> --}}
            {{--                        <input type="text" name="email3" class="form-control @error('email3') is-invalid @enderror" --}}
            {{--                               value="{{ old('email3',$setting->email3) }}" placeholder="{{__('words.email')}}"> --}}
            {{--                        @error('email3') --}}
            {{--                        <span class="invalid-feedback" role="alert"> --}}
            {{--                                <strong>{{ $message }}</strong> --}}
            {{--                            </span> --}}
            {{--                        @enderror --}}
            {{--                    </div> --}}
            {{--                </div> --}}
            {{--            </div> --}}

            <hr>

            <div class="form-group row">
                @include('admin.components.image', [
                    'label' => __('words.logo'),
                    'value' => $setting->logo,
                    'name' => 'logo',
                    'id' => 'kt_image_3',
                    'required' => false,
                ])

                @include('admin.components.image', [
                    'label' => __('words.contact_img'),
                    'value' => $setting->contact_img,
                    'name' => 'contact_img',
                    'id' => 'kt_image_2',
                    'required' => false,
                ])

                @include('admin.components.image', [
                    'label' => __('words.footer_img'),
                    'value' => $setting->footer_img,
                    'name' => 'footer_img',
                    'id' => 'kt_image_1',
                    'required' => false,
                ])
            </div>

        </div>

    </div>

    @permission('update-settings')
        <div class="card-footer">
            <div class="row">
                <div class="col-4">
                    <button type="submit" class="btn btn-block btn-outline-success">
                        {{ __('words.update') }}
                    </button>
                </div>
            </div>
        </div>
    @endpermission

@endsection

@section('scripts')
    <script>
        $("#form").submit(function(e) {
            e.preventDefault();
            let links = document.querySelectorAll('.link');
            links.forEach(function(link) {
                let position = link.value.includes('https');
                if (position > -1) {
                    let enhancedLink = link.value.replace("https://", "http://");
                    link.value = enhancedLink;
                }
            });
            this.submit();
        });
    </script>
@endsection
