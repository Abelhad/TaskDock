<x-guest-layout>

    <!-- Session Status -->
    <x-auth-session-status
        class="session-status"
        :status="session('status')"
    />

    <form method="POST" action="{{ route('login') }}" class="login-form">
        @csrf

        <!-- Email -->
        <div class="form-group">
            <x-input-label
                for="email"
                :value="__('Email')"
                class="form-label"
            />

            <x-text-input
                id="email"
                class="form-input"
                type="email"
                name="email"
                :value="old('email')"
                required
                autofocus
                autocomplete="username"
            />

            <x-input-error
                :messages="$errors->get('email')"
                class="form-error"
            />
        </div>

        <!-- Password -->
        <div class="form-group">
            <x-input-label
                for="password"
                :value="__('Password')"
                class="form-label"
            />

            <x-text-input
                id="password"
                class="form-input"
                type="password"
                name="password"
                required
                autocomplete="current-password"
            />

            <x-input-error
                :messages="$errors->get('password')"
                class="form-error"
            />
        </div>

        <!-- Remember Me -->
        <div class="remember-group">
            <label for="remember_me" class="remember-label">
                <input
                    id="remember_me"
                    type="checkbox"
                    name="remember"
                    class="remember-checkbox"
                >

                <span>Remember me</span>
            </label>
        </div>

        <!-- Actions -->
        <div class="form-actions">

            <button type="submit" class="login-button">
                {{ __('Log in') }}
            </button>

        </div>

    </form>

</x-guest-layout>

