<form action="/register" method="POST">
  <div class="form-group">
    <label for="username">{{ __('register.username') }}</label>
    <input type="text" class="form-control" id="username" aria-describedby="usernameHelp" placeholder="{{ __('register.username_placeholder') }}" name="username">
    <small id="usernameHelp" class="form-text text-muted">{{ __('register.username_helper') }}</small>
  </div>
  <div class="form-group">
    <label for="Password">{{ __('register.password') }}</label>
    <input type="password" class="form-control" id="Password" placeholder="{{ __('register.password_placeholder') }}" name="password">
  </div>
  <div class="form-group">
    <label for="Email">{{ __('register.email') }}</label>
    <input type="email" class="form-control" id="Email" aria-describedby="EmailHelp" placeholder="{{ __('register.email_placeholder') }}"  name="email">
    <small id="EmailHelp" class="form-text text-muted">{{ __('register.email_helper') }}</small>
  </div>
  @csrf
  <div class="text-right">
    <button type="submit" class="btn btn-action">{{ __('register.action') }}</button>
  </div>
</form>
