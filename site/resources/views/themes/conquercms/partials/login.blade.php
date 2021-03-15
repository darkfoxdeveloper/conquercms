<form action="/login" method="POST">
  <div class="form-group">
    <label for="username">{{ __('login.username') }}</label>
    <input type="text" class="form-control" id="username" aria-describedby="usernameHelp" placeholder="{{ __('login.username_placeholder') }}" name="username">
    <small id="usernameHelp" class="form-text text-muted">{{ __('login.username_helper') }}</small>
  </div>
  <div class="form-group">
    <label for="Password">{{ __('login.password') }}</label>
    <input type="password" class="form-control" id="Password" placeholder="{{ __('login.password_placeholder') }}" name="password">
  </div>
  @csrf
  <div class="text-right">
    <button type="submit" class="btn btn-action">{{ __('login.action') }}</button>
  </div>
</form>
