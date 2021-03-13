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
            <span class="icon-border"><i class="fas fa-key round-icon"></i></span>
            <h1 class="section-title">{{ __('change-password.title') }}</h1>
            <h2 class="section-description">{{ __('change-password.subtitle') }}</h2>
        </div>
    </div>
    @include("themes.conquercms.partials.change-password")
@endsection
