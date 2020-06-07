@extends('layouts.app')

@section('title', 'Home')

@section('menu')
    @parent
@endsection

@section('sidebar')
    @parent
@endsection

@section('content')
    @if ($section != "Home")
        <div class="row mb-5">
            <div class="col-12">
                @if ($section === "Register")
                    <span class="icon-border"><i class="fas fa-user round-icon"></i></span>
                @elseif($section === "Downloads")
                    <span class="icon-border"><i class="fas fa-user round-icon"></i></span>
                @elseif($section === "Shop")
                    <span class="icon-border"><i class="fas fa-user round-icon"></i></span>
                @endif
                <h1 class="section-title">{{ $settings_controller->GetSetting(strtolower($section).'_title') }}</h1>
                <h2 class="section-description">{{ $settings_controller->GetSetting(strtolower($section).'_subtitle') }}</h2>
            </div>
        </div>
        @if ($section === "Register")
        @include("partials.register")
        @endif
        @else
        <div class="row mb-5">
        <div class="col-12">
                <span class="icon-border"><i class="fas fa-bolt round-icon"></i></span>
                <h1 class="section-title">{{ $settings_controller->GetSetting('home_title') }}</h1>
                <h2 class="section-description">{{ $settings_controller->GetSetting('home_subtitle') }}</h2>
        </div>
        </div>
    @endif

    {!! $settings_controller->GetPageContent()->body !!}
@endsection
