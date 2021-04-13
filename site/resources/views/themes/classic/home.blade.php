@extends('layouts.app')

@section('title', 'Home')

@section('menu')
    @include('themes.classic.header')
@endsection

@section('sidebar')
    @parent
@endsection

@section('content')
    <div class="row mb-5">
        <div class="col-12 col-lg-6">
            <h2 class="section-description">{{ __('home.pretitle') }}</h2>
            <h1 class="section-title">{{ __('home.title') }}</h1>
            <p class="section-text">{{ __('home.subtitle') }}</p>
            <a href="{{ route('register') }}" class="btn btn-login">{{ __('general.register') }}</a>
        </div>
        <div class="col-12 col-lg-6">
            <img src="/images/theme.classic/character_classic.png" alt="classic character" class="img-fluid character-img">
        </div>
    </div>
    <div class="row justify-content-center align-items-start status-info">
        <div class="col-lg-4 col-md-6">
            <div class="single-status">
                <div class="icon one">
                    <span class="icon-border"><i class="fas fa-bolt"></i></span>
                </div>
                <div class="content">
                    <h4 class="title">
                        50
                    </h4>
                    <a>Total Accounts</a>
                </div>
            </div>
        </div>
        <div class="col-lg-4 col-md-6">
            <div class="single-status">
                <div class="icon two">
                    <span class="icon-border"><i class="fas fa-bolt"></i></span>
                </div>
                <div class="content">
                    <h4 class="title">

                        3
                    </h4>
                    <a>Total Online</a>
                </div>
            </div>
        </div>
        <div class="col-lg-4 col-md-6">
            <div class="single-status">
                <div class="icon three">
                    <span class="icon-border"><i class="fas fa-bolt"></i></span>
                </div>
                <div class="content">
                    <h4 class="title">
                        <font style="color: green">Online</font>
                    </h4>
                    <a>Server Status</a>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('footer')
    @parent
@endsection
