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
            <span class="icon-border"><i class="fas fa-store round-icon"></i></span>
            <h1 class="section-title">{{ __('shop.title') }}</h1>
            <h2 class="section-description">{{ __('shop.subtitle') }}</h2>
        </div>
    </div>
@endsection
