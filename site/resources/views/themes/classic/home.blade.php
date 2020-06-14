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
            <span class="icon-border"><i class="fas fa-bolt round-icon"></i></span>
            <h1 class="section-title">{{ __('home.title') }}</h1>
            <h2 class="section-description">{{ __('home.subtitle') }}</h2>
        </div>
    </div>
    <div class="row justify-content-center align-items-center">
        <div class="col-12 col-md-auto">
            <div class="card" style="width: 18rem;"><img class="card-img-top" src="https://www.mmobomb.com/file/2011/03/23931.jpg" alt="Bosses" />
                <div class="card-body">
                    <p class="card-text">{{ __('home.card1_title') }}</p>
                </div>
            </div>
        </div>
        <div class="col-12 col-md-auto">
            <div class="card" style="width: 18rem;"><img class="card-img-top" style="object-fit: cover; min-height: 214px;" src="https://static.immortals-co.com//uploads/1060/proarena.png" alt="Tournaments" />
                <div class="card-body">
                    <p class="card-text">{{ __('home.card2_title') }}</p>
                </div>
            </div>
        </div>
        <div class="col-12 col-md-auto">
            <div class="card" style="width: 18rem;"><img class="card-img-top" src="https://www.mmoreviews.com/imgs/100414_co_artifact1.jpg" alt="New Items" />
                <div class="card-body">
                    <p class="card-text">{{ __('home.card3_title') }}</p>
                </div>
            </div>
        </div>
    </div>
    @if ($settings_controller->GetPageContent() != null)
        {!! $settings_controller->GetPageContent()->body !!}
    @endif
@endsection
