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
            <span class="icon-border"><i class="fas fa-trophy round-icon"></i></span>
            <h1 class="section-title">{{ __('ranking.title') }}</h1>
            <h2 class="section-description">{{ __('ranking.subtitle') }}</h2>
        </div>
        <div class="col-12 mt-5">
            <table class="table datatable">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>{{ __('ranking.player_name') }}</th>
                        <th>{{ __('ranking.player_level') }}</th>
                        <th>{{ __('ranking.player_reborn') }}</th>
                    </tr>
                </thead>
                <tbody>
                @foreach($ranking_players as $i => $player)
                    <tr>
                        <td>
                            {{ $i+1 }}
                        </td>
                        <td>
                            {{ $player->Name }}
                        </td>
                        <td>
                            {{ $player->Level }}
                        </td>
                        <td>
                            {{ $player->Reborn }}
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection

@section('footer')
    @parent
@endsection
