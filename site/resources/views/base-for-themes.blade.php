@extends('layouts.app')

@section('title', 'Home')

@section('menu')
    @parent
@endsection

@section('sidebar')
    @parent
@endsection

@section('content')
    <div class="row">
       <div class="col-12">
            <h1 class="section-title">What is ConquerCMS?</h1>
            <p class="section-description">Its a CMS for a Conquer Online Server Websites. You can customize your theme and enjoy all features already coded in Core Theme.</p>
       </div>
    </div>
@endsection