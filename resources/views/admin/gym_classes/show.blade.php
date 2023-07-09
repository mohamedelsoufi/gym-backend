@extends('admin.layouts.master')
@section('title', settings()->website_title . ' | ' . __('words.show_class'))
@section('breadcrumb')
    <div class="d-flex align-items-baseline flex-wrap mr-5">
        <!--begin::Breadcrumb-->
        <h5 class="text-dark font-weight-bold my-1 mr-5">{{ __('words.classes') }}</h5>
        <ul class="breadcrumb breadcrumb-transparent breadcrumb-dot font-weight-bold p-0 my-2 font-size-sm">
            <li class="breadcrumb-item">
                <a href="{{ route('admin.home') }}" class="text-muted">{{ __('words.home') }}</a>
            </li>
            <li class="breadcrumb-item">
                <a href="{{ route('classes.index') }}" class="text-muted">{{ __('words.show_classes') }}</a>
            </li>
            <li class="breadcrumb-item">
                <span class="text-muted">{{ __('words.show_class') }}</span>
            </li>
        </ul>
        <!--end::Breadcrumb-->
    </div>
@endsection

@section('content')
    <div class="card card-custom card-stretch gutter-b">
        <div class="card-header card-header-tabs-line">
            <div class="card-title">
                <h3 class="card-label">{{ __('words.show_class') }}</h3>
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
        <div class="card-body p-10">
            <div class="tab-content">
                @foreach (config('translatable.locales') as $key => $locale)
                    <div class="tab-pane fade show @if ($key == 0) active @endif" id="{{ $locale }}"
                         role="tabpanel">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="mb-7 bg-light p-5 rounded h-100">
                                    <div class="card-title">
                                        <h5 class="font-weight-bolder text-dark">{{ __('words.title') }}
                                            - {{ __('words.locale-' . $locale) }}:</h5>
                                    </div>
                                    <p class="m-0">{{ $class->translate($locale)->title }}</p>
                                </div>
                            </div>

                            <div class="col-md-12 mt-3">
                                <div class="mb-7 bg-light p-5 rounded h-100">
                                    <div class="card-title">
                                        <h5 class="font-weight-bolder text-dark">{{ __('words.day') }}
                                            - {{ __('words.locale-' . $locale) }}:</h5>
                                    </div>
                                    @foreach($class->days as $day)
                                        <span class="m-0">{{ $day->translate($locale)->day  }}</span><span>,</span>
                                    @endforeach
                                </div>
                            </div>

                            <div class="col-md-12 mt-3">
                                <div class="mb-7 bg-light p-5 rounded h-100">
                                    <div class="card-title">
                                        <h5 class="font-weight-bolder text-dark">{{ __('words.branch') }}
                                            - {{ __('words.locale-' . $locale) }}:</h5>
                                    </div>
                                    @foreach($class->branches as $branch)
                                        <span class="m-0">{{ $branch->translate($locale)->title  }}</span><span>,</span>
                                    @endforeach
                                </div>
                            </div>

                        </div>
                    </div>
                @endforeach
            </div>
        </div>

        <div class="card card-custom">
            <div class="card-body">
                <div class="row mb-3">
                    <div class="col-md-3">
                        <div class="mb-7 bg-light p-5 rounded h-100">
                            <div class="card-title">
                                <h5 class="font-weight-bolder text-dark">{{ __('words.time') }}:</h5>
                            </div>
                            <p class="m-0">{{date('h:i A',strtotime($class->time)) }}</p>
                        </div>
                    </div>

                    <div class="col-md-3">
                        <div class="mb-7 bg-light p-5 rounded h-100">
                            <div class="card-title">
                                <h5 class="font-weight-bolder text-dark">{{ __('words.created_at') }}:</h5>
                            </div>
                            <p class="m-0">{{ formatDate($class->created_at) }}</p>
                        </div>
                    </div>

                    <div class="col-md-3">
                        <div class="mb-7 bg-light p-5 rounded h-100">
                            <div class="card-title">
                                <h5 class="font-weight-bolder text-dark">{{ __('words.updated_at') }}:</h5>
                            </div>
                            <p class="m-0">
                                {{ formatDate($class->created_at) == formatDate($class->updated_at) ? '--' : formatDate($class->updated_at) }}
                            </p>
                        </div>
                    </div>

                    <div class="col-md-3">
                        <div class="mb-7 bg-light p-5 rounded h-100">
                            <div class="card-title">
                                <h5 class="font-weight-bolder text-dark">{{ __('words.activity') }}:</h5>
                            </div>
                            <p class="m-0"><span
                                    class="badge rounded-pill text-white {{$class->status == 1 ? 'bg-success' : 'bg-danger'}}">{{ $class->getActive() }}</span>
                            </p>
                        </div>
                    </div>


                </div>

                <div class="row">
                    <div class="col-8">
                        <a href="{{$class->image}}"
                           data-toggle="lightbox" data-title="{{$class->title}}"
                           data-gallery="gallery">
                            <img src="{{ $class->image }}" class="img-fluid mb-2 image-galley"
                                 onerror="this.src='{{ asset('uploads/default_image.png') }}'" alt="class-image"/>
                        </a>
                    </div>
                </div>

            </div>

            @permission('update-gym_classes')
            <div class="card-footer">
                <div class="row">
                    <div class="col-4">
                        <a href="{{ route('classes.edit', $class->id) }}" class="btn btn-block btn-outline-info">
                            {{ __('words.edit') }}
                        </a>
                    </div>
                </div>
            </div>
            @endpermission
        </div>
    </div>
@endsection
