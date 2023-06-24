@extends('admin.layouts.master')

@section('breadcrumb')
@include('admin.includes.breadcrumb',['first_title' => ''])
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row mb-3">
            <div class="col-12 d-flex align-items-center justify-content-center">
                <h1>{{settings()->website_title}}</h1>
            </div>
        </div>

        <div class="row">

            @permission('read-admins')
            <div class="col-xl-4">
                <div class="card card-custom card-stretch gutter-b wave wave-primary wave-animate-slow">
                    <div class="card-body">
                        <i class="flaticon-users fa-3x"></i>
                        <span class="card-title font-weight-bolder text-dark-75 font-size-h1 mb-0 mt-6 d-block">{{ \App\Models\Admin::count() }}</span>
                        <span class="font-weight-bold font-size-sm"><a href="{{route('admin-users.index')}}">{{__('words.admins')}}</a></span>
                    </div>
                </div>
            </div>
            @endpermission

            @permission('read-teams')
            <div class="col-xl-4">
                <div class="card card-custom card-stretch gutter-b wave wave-primary wave-animate-slow">
                    <div class="card-body">
                        <i class="fas fa-gopuram fa-3x"></i>
                        <span class="card-title font-weight-bolder text-dark-75 font-size-h1 mb-0 mt-6 d-block">{{ \App\Models\Team::count() }}</span>
                        <span class="font-weight-bold font-size-sm"><a href="{{route('teams.index')}}">{{__('words.teams')}}</a></span>
                    </div>
                </div>
            </div>
            @endpermission

            @permission('read-packages')
            <div class="col-xl-4">
                <div class="card card-custom card-stretch gutter-b wave wave-primary wave-animate-slow">
                    <div class="card-body">
                        <i class="fas fa-box-open fa-3x"></i>
                        <span class="card-title font-weight-bolder text-dark-75 font-size-h1 mb-0 mt-6 d-block">{{ \App\Models\Package::count() }}</span>
                        <span class="font-weight-bold font-size-sm"><a href="{{route('packages.index')}}">{{__('words.packages')}}</a></span>
                    </div>
                </div>
            </div>
            @endpermission

            @permission('read-partners')
            <div class="col-xl-4">
                <div class="card card-custom card-stretch gutter-b wave wave-primary wave-animate-slow">
                    <div class="card-body">
                        <i class="fas fa-handshake fa-3x"></i>
                        <span class="card-title font-weight-bolder text-dark-75 font-size-h1 mb-0 mt-6 d-block">{{ \App\Models\Partner::count() }}</span>
                        <span class="font-weight-bold font-size-sm"><a href="{{route('partners.index')}}">{{__('words.partners')}}</a></span>
                    </div>
                </div>
            </div>
            @endpermission

            @permission('read-blog')
            <div class="col-xl-4">
                <div class="card card-custom card-stretch gutter-b wave wave-primary wave-animate-slow">
                    <div class="card-body">
                        <i class="fab fa-blogger-b fa-3x"></i>
                        <span class="card-title font-weight-bolder text-dark-75 font-size-h1 mb-0 mt-6 d-block">{{ \App\Models\Blog::count() }}</span>
                        <span class="font-weight-bold font-size-sm"><a href="{{route('blog.index')}}">{{__('words.blogs')}}</a></span>
                    </div>
                </div>
            </div>
            @endpermission

            @permission('read-comments')
            <div class="col-xl-4">
                <div class="card card-custom card-stretch gutter-b wave wave-primary wave-animate-slow">
                    <div class="card-body">
                        <i class="fas fa-comment-dots fa-3x"></i>
                        <span class="card-title font-weight-bolder text-dark-75 font-size-h1 mb-0 mt-6 d-block">{{ \App\Models\Comment::count() }}</span>
                        <span class="font-weight-bold font-size-sm"><a href="{{route('comments.index')}}">{{__('words.comments')}}</a></span>
                    </div>
                </div>
            </div>
            @endpermission

            @permission('read-events')
            <div class="col-xl-4">
                <div class="card card-custom card-stretch gutter-b wave wave-primary wave-animate-slow">
                    <div class="card-body">
                        <i class="fas fa-calendar-day fa-3x"></i>
                        <span class="card-title font-weight-bolder text-dark-75 font-size-h1 mb-0 mt-6 d-block">{{ \App\Models\Comment::count() }}</span>
                        <span class="font-weight-bold font-size-sm"><a href="{{route('events.index')}}">{{__('words.events')}}</a></span>
                    </div>
                </div>
            </div>
            @endpermission
        </div>
    </div>
@endsection
