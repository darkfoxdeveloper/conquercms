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
            <span class="icon-border"><i class="fas fa-user round-icon"></i></span>
            <h1 class="section-title">{{ $settings_controller->GetSetting($section.'_title') }}</h1>
            <h2 class="section-description">{{ $settings_controller->GetSetting($section.'_subtitle') }}</h2>
        </div>
    </div>
    @include("themes.classic.partials.register")
    @if ($settings_controller->GetPageContent() != null)
        {!! $settings_controller->GetPageContent()->body !!}
    @endif
@endsection
