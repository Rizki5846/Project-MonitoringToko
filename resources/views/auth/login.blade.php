<x-authentication-layout>
    <h1 class="text-4xl text-blue-600 dark:text-blue-400 font-semibold mb-8">{{ __('Welcome back!') }}</h1>
    
    @if (session('status'))
        <div class="mb-4 font-medium text-sm text-green-700">
            {{ session('status') }}
        </div>
    @endif
    
    <!-- Form -->
    <form method="POST" action="{{ route('login') }}">
        @csrf
        <div class="space-y-6">
            <div>
                <x-label for="email" value="{{ __('Email Address') }}" />
                <x-input id="email" type="email" name="email" :value="old('email')" required autofocus />
            </div>
            <div>
                <x-label for="password" value="{{ __('Password') }}" />
                <x-input id="password" type="password" name="password" required autocomplete="current-password" />
            </div>
        </div>
        <div class="flex items-center justify-between mt-8">
            @if (Route::has('password.request'))
                <div>
                    <a class="text-sm text-gray-600 hover:text-gray-800 dark:text-gray-400 dark:hover:text-gray-300" href="{{ route('password.request') }}">
                        {{ __('Forgot your password?') }}
                    </a>
                </div>
            @endif
            <x-button class="ml-4 bg-blue-500 hover:bg-blue-600 text-white font-semibold">
                {{ __('Sign In') }}
            </x-button>
        </div>
    </form>
    <x-validation-errors class="mt-6" />

    <!-- Footer -->
    <div class="pt-8 mt-8 border-t border-gray-200 dark:border-gray-700">
        <div class="text-sm">
            {{ __("Don't have an account?") }} <a class="font-medium text-indigo-600 hover:text-indigo-700 dark:text-indigo-400 dark:hover:text-indigo-300" href="{{ route('register') }}">{{ __('Sign Up') }}</a>
        </div>
    </div>
</x-authentication-layout>
