<x-guest-layout>
    <div class="formtitle">
        <h2>Create an Account</h2>
        <p>Join our platform in seconds</p>
    </div>
    <form method="POST" action="{{ route('register') }}" class="register-form">
        @csrf

        <!-- Name -->
        <div class="form-group">
            <x-input-label for="name" :value="__('Name')" class="form-label" />

            <x-text-input
                id="name"
                class="form-input"
                type="text"
                name="name"
                :value="old('name')"
                required
                autofocus
                autocomplete="name"
            />

            <x-input-error
                :messages="$errors->get('name')"
                class="form-error"
            />
        </div>

        <!-- Email -->
        <div class="form-group">
            <x-input-label for="email" :value="__('Email')" class="form-label" />

            <x-text-input
                id="email"
                class="form-input"
                type="email"
                name="email"
                :value="old('email')"
                required
                autocomplete="username"
            />

            <x-input-error
                :messages="$errors->get('email')"
                class="form-error"
            />
        </div>

        <!-- Password -->
        <div class="form-group">
            <x-input-label for="password" :value="__('Password')" class="form-label" />

            <x-text-input
                id="password"
                class="form-input"
                type="password"
                name="password"
                required
                autocomplete="new-password"
            />

            <x-input-error
                :messages="$errors->get('password')"
                class="form-error"
            />
        </div>

        <!-- Confirm Password -->
        <div class="form-group">
            <x-input-label
                for="password_confirmation"
                :value="__('Confirm Password')"
                class="form-label"
            />

            <x-text-input
                id="password_confirmation"
                class="form-input"
                type="password"
                name="password_confirmation"
                required
                autocomplete="new-password"
            />

            <x-input-error
                :messages="$errors->get('password_confirmation')"
                class="form-error"
            />
        </div>

        <!-- Actions -->
        <div class="form-actions">
            <a href="{{ route('login') }}" class="login-link">
                {{ __('Already registered?') }}
            </a>

            <x-primary-button class="register-button">
                {{ __('Register') }}
            </x-primary-button>
        </div>

    </form>

</x-guest-layout>

