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
        <div class="col-12 my-3">
            <div class="row row-item-cards">
                <div class="d-none hidden-form">
                    <form action="https://www.paypal.com/cgi-bin/webscr" method="post" target="_top" id="online-shop">
                        <input type="hidden" name="cmd" value="_s-xclick">
                        <input type="hidden" name="hosted_button_id" value="PPNG9C8RV6AVS">
                        <table>
                            <tbody>
                            <tr>
                                <td><input type="hidden" name="on0" value="Opcion">Opcion</td>
                            </tr>
                            <tr>
                                <td>
                                    <select name="os0">
                                        <option value="1.000 Puntos Shadow">1.000 Puntos Shadow $12.00 USD</option>
                                        <option value="3.000 Puntos Shadow">3.000 Puntos Shadow $27.00 USD</option>
                                        <option value="500.000.000KK de oro">500.000.000KK de oro $53.00 USD</option>
                                        <option value="5KK De CPs">5KK De CPs $25.00 USD</option>
                                        <option value="Copa ShadowCO">Copa ShadowCO $82.00 USD</option>
                                        <option value="Frack Atributos Lujosos">Frack Atributos Lujosos $23.00 USD</option>
                                        <option value="PJ FULL +12+COPA DE ORO 80USD">PJ FULL +12+COPA DE ORO 80USD $82.00 USD</option>
                                    </select>
                                </td>
                            </tr>
                            </tbody>
                        </table>
                        <input type="hidden" name="currency_code" value="USD">
                        <input type="image" src="https://www.paypalobjects.com/en_US/i/btn/btn_buynowCC_LG.gif"
                               border="0" name="submit" alt="PayPal - The safer, easier way to pay online!">
                        <img alt="" border="0" src="https://www.paypalobjects.com/es_XC/i/scr/pixel.gif" width="1"
                             height="1">
                    </form>
                </div>
                <?php
                $directory = "images/fracks";
                $ext = ".jpeg";
                $images = glob($directory . "/*" . $ext);
                foreach($images as $image): ?>
                <div class="col-lg-3 mb-3">
                    <div class="card">
                        <img class="card-img-top" src="{{ $image }}" alt="Frack">
                        <div class="card-body">
                            <h5 class="card-title">Frack {{ str_replace($ext, "", basename($image))  }}</h5>
                            <p class="card-text">{{ __('shop.item-price') }}: 23 USD</p>
                        </div>
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item">{{ __('shop.item-line-1') }}</li>
                            <li class="list-group-item">{{ __('shop.item-line-2') }}</li>
                            <li class="list-group-item">{{ __('shop.item-line-3') }}</li>
                        </ul>
                        <div class="card-body text-center">
                            <a href="#" class="card-link btn btn-primary w-100 btn-buy-frack"
                               data-type="frack">{{ __('shop.buy-now') }}</a>
                        </div>
                    </div>
                </div>
                <?php endforeach; ?>
                <?php
                $directory = "images/cups";
                $ext = ".jpeg";
                $images = glob($directory . "/*" . $ext);
                foreach($images as $image): ?>
                <div class="col-lg-3 mb-3">
                    <div class="card">
                        <img class="card-img-top" src="{{ $image }}" alt="Cup">
                        <div class="card-body">
                            <h5 class="card-title">Cup {{ str_replace($ext, "", basename($image))  }}</h5>
                            <p class="card-text">{{ __('shop.item-price') }}: 82 USD</p>
                        </div>
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item">{{ __('shop.item-line-1') }}</li>
                            <li class="list-group-item">{{ __('shop.item-line-2') }}</li>
                            <li class="list-group-item">{{ __('shop.item-line-3') }}</li>
                        </ul>
                        <div class="card-body text-center">
                            <a href="#" class="card-link btn btn-primary w-100 btn-buy-frack"
                               data-type="cup">{{ __('shop.buy-now') }}</a>
                        </div>
                    </div>
                </div>
                <?php endforeach; ?>
            </div>
        </div>
    </div>
@endsection
