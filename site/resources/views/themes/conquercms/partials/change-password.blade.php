@php
    $data = Session::get('data');
    $use_email = getenv("CONQUER_DB_ACCOUNT_EMAIL_COL") && strlen(getenv("CONQUER_DB_ACCOUNT_EMAIL_COL")) > 0;
@endphp
<form action="/change-password" method="POST">
    @if ($use_email)
    <div class="form-group">
        <label for="Email">{{ __('change-password.email') }}</label>
        <input type="email" class="form-control" id="Email"
               placeholder="{{ __('change-password.email_placeholder') }}" name="email" value="{{ isset($data) ? $data["email"] : "" }}">
    </div>
    @endif
    <div class="form-group">
        <label for="Password">{{ __('change-password.password') }}</label>
        <input type="password" class="form-control" id="Password"
               placeholder="{{ __('change-password.password_placeholder') }}" name="password" value="{{ isset($data) ? $data["password"] : "" }}">
    </div>
    <div class="form-group">
        <label for="NewPassword">{{ __('change-password.new-password') }}</label>
        <input type="password" class="form-control" id="NewPassword"
               placeholder="{{ __('change-password.new-password_placeholder') }}" name="new-password" value="{{ isset($data) ? $data["new-password"] : "" }}">
    </div>
    @csrf
    <div class="text-right">
        <button type="submit" class="btn btn-action">{{ __('change-password.action') }}</button>
    </div>
</form>
