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
            <h1 class="section-title">What is ConquerCMS?</h1>
            <h2 class="section-description">Its a CMS for a Conquer Online Server Websites. You can customize your theme and enjoy all features already coded in Core Theme.</p>
       </div>
    </div>

    <div class="row justify-content-center align-items-center">
        <div class="col-lg-4">
            <div class="card" style="width: 18rem;">
                <img class="card-img-top" src="http://oldconquer.com/img/Game/Banshee.png" alt="SnowBanshee">
                <div class="card-body">
                    <h3 class="card-title"><i class="fas fa-check-double card-icon"></i>&nbsp;Snow Banshee</h3>
                    <p class="card-text">Good rewards for kill a boss</p>
                </div>
            </div>
        </div>
        <div class="col-lg-4">
            <div class="card" style="width: 18rem;">
                <img class="card-img-top" src="http://oldconquer.com/img/Game/Banshee.png" alt="SnowBanshee">
                <div class="card-body">
                    <h3 class="card-title"><i class="fas fa-check-double card-icon"></i>&nbsp;Snow Banshee</h3>
                    <p class="card-text">Good rewards for kill a boss</p>
                </div>
            </div>
        </div>
        <div class="col-lg-4">
            <div class="card" style="width: 18rem;">
                <img class="card-img-top" src="http://oldconquer.com/img/Game/Banshee.png" alt="SnowBanshee">
                <div class="card-body">
                    <h3 class="card-title"><i class="fas fa-check-double card-icon"></i>&nbsp;Snow Banshee</h3>
                    <p class="card-text">Good rewards for kill a boss</p>
                </div>
            </div>
        </div>
    </div>
@endsection