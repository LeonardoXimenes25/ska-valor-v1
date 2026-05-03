<div>
    <div class="container d-flex align-items-center justify-content-center" style="min-height: 100vh;">
    <div class="login-card">
        <div class="login-header">
            <div class="logo-icon">
                <i class="bi bi-mortarboard-fill"></i>
            </div>
            <h3 class="fw-bold text-dark">Bemvindu</h3>
            <p class="text-muted small">Favor tama ita account E-Student</p>
        </div>

        <div class="form-section">
            <form wire:submit="login">
                @csrf

                @if (session()->has('error'))
                    <div class="alert alert-danger">
                        {{ session('error') }}
                    </div>
                @endif

                {{-- EMAIL --}}
                <div class="mb-3">
                    <label class="form-label small fw-bold text-secondary">Email</label>
                    <div class="input-group">
                        <span class="input-group-text"><i class="bi bi-person"></i></span>
                        <input 
                            type="email" 
                            name="email" 
                            class="form-control" 
                            placeholder="email@example.com"
                            wire:model="email"
                            required
                        >
                        <div>@error('email') {{ $message }} @enderror</div>
                    </div>
                </div>

                {{-- PASSWORD --}}
                <div class="mb-3">
                    <div class="d-flex justify-content-between">
                        <label class="form-label small fw-bold text-secondary">Password</label>
                        <a href="#" class="text-decoration-none small fw-semibold" style="color: #4e54c8;">
                            Forget Password?
                        </a>
                    </div>
                    <div class="input-group">
                        <span class="input-group-text"><i class="bi bi-lock"></i></span>
                        <input 
                            type="password" 
                            name="password" 
                            id="passwordField" 
                            class="form-control" 
                            placeholder="••••••••"
                            wire:model="password" 
                            required
                        >
                        <button 
                            class="btn btn-outline-light border-start-0 border text-secondary bg-light-subtle" 
                            type="button" 
                            onclick="togglePassword()"
                        >
                            <i class="bi bi-eye" id="toggleIcon"></i>
                        </button>
                    </div>
                </div>

                {{-- REMEMBER ME --}}
                <div class="mb-4 form-check">
                    <input type="checkbox" class="form-check-input" id="remember" name="remember">
                    <label class="form-check-label small text-secondary" for="remember">
                        Remember me
                    </label>
                </div>

                {{-- BUTTON --}}
                <button type="submit" class="btn btn-primary btn-login w-100 mb-3">
                    Login
                </button>

                <div class="divider">atau masuk dengan</div>

                {{-- SOCIAL LOGIN (optional) --}}
                <div class="social-login mb-4">
                    <a href="{{ route('auth.google') }}" class="btn-social" wire:click="loginWithGoogle"><i class="bi bi-google"></i></a>
                    <a href="#" class="btn-social"><i class="bi bi-facebook"></i></a>
                    <a href="#" class="btn-social"><i class="bi bi-apple"></i></a>
                </div>

                <div class="text-center">
                    <p class="text-muted small mb-0">Belum punya akun?</p>
                    <a href="{{route('auth.register')}}" class="text-decoration-none fw-bold" style="color: #4e54c8;">
                        Register
                    </a>
                </div>
            </form>
        </div>
    </div>
</div>

{{-- SCRIPT TOGGLE PASSWORD --}}
<script>
function togglePassword() {
    const field = document.getElementById('passwordField');
    const icon = document.getElementById('toggleIcon');

    if (field.type === 'password') {
        field.type = 'text';
        icon.classList.replace('bi-eye', 'bi-eye-slash');
    } else {
        field.type = 'password';
        icon.classList.replace('bi-eye-slash', 'bi-eye');
    }
}
</script>
</div>
