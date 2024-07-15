<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Login') }}</div>

                <div class="card-body">
                    <form id="login-form" method="POST" action="{{ route('login') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" id="login-button" disabled>
                                    {{ __('Login') }}
                                </button>
                                <span id="error-message" class="text-danger"></span>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const emailInput = document.getElementById('email');
        const passwordInput = document.getElementById('password');
        const loginButton = document.getElementById('login-button');
        const errorMessage = document.getElementById('error-message');

        function checkInputs() {
            const emailValue = emailInput.value.trim();
            const passwordValue = passwordInput.value.trim();

            if (emailValue !== '' && passwordValue !== '') {
                loginButton.disabled = false;
                errorMessage.textContent = ''; // Clear any previous error message
            } else {
                loginButton.disabled = true;
                errorMessage.textContent = 'Please enter both email and password.'; // Display error message
            }
        }

        emailInput.addEventListener('input', checkInputs);
        passwordInput.addEventListener('input', checkInputs);

        // Optionally, you can prevent form submission if inputs are empty
        document.getElementById('login-form').addEventListener('submit', function(event) {
            const emailValue = emailInput.value.trim();
            const passwordValue = passwordInput.value.trim();

            if (emailValue === '' || passwordValue === '') {
                event.preventDefault(); // Prevent form submission
                errorMessage.textContent = 'Please enter both email and password.'; // Display error message
            }
        });
    });
</script>
