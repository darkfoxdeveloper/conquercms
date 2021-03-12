@extends('layouts.app')

@section('title', 'Home')

@section('menu')
    @parent
@endsection

@section('sidebar')
    @parent
@endsection

@section('content')
    <div class="row mb-5">
        <div class="col-12">
            <span class="icon-border"><i class="fas fa-download round-icon"></i></span>
            <h1 class="section-title">{{ __('downloads.title') }}</h1>
            <h2 class="section-description">{{ __('downloads.subtitle') }}</h2>
        </div>
    </div>
    <div class="row justify-content-center">
        <div class="col-6 download-box">
            <div>
                <h3>{{ __('downloads.download_client') }}</h3>
                <i class="fas fa-file-archive download-icon"></i>
                <ul class="download-list">
                    <li><a href="{{ setting('site.DOWNLOAD_CLIENT_URL') }}">MEGA</a></li>
                    <li><a href="{{ setting('site.DOWNLOAD_CLIENT_URL_MEDIAFIRE') }}">MEDIAFIRE</a></li>
                </ul>
            </div>
        </div>
        <div class="col-6 download-box">
            <div>
                <h3>{{ __('downloads.download_patch') }}</h3>
                <i class="fas fa-file-archive download-icon"></i>
                <ul class="download-list">
                    <li><a href="{{ setting('site.DOWNLOAD_PATCH_URL') }}">MEGA</a></li>
                    <li><a href="{{ setting('site.DOWNLOAD_PATCH_URL_MEDIAFIRE') }}">MEDIAFIRE</a></li>
                </ul>
            </div>
        </div>
    </div>
@endsection
