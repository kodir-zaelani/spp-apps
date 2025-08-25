<x-guest-layout>
    <x-authentication-card>
        <x-slot name="logo">
            <x-authentication-card-logo />
        </x-slot>

        <x-validation-errors class="mb-4" />

        @session('status')
            <div class="mb-4 text-sm font-medium text-green-600">
                {{ $value }}
            </div>
        @endsession

        <form method="POST" action="{{ route('login') }}">
            @csrf

            <div>
                <x-label for="loginname" value="{{ __('Email/Username/Phone') }}" />
                <x-input id="loginname" class="block w-full mt-1" type="text" name="loginname" :value="old('loginname')" required autofocus autocomplete="loginname" />
                <i class="fa fa-eye toggle-password" id="toggle-password"></i>
            </div>

            <div class="mt-4">
                <x-label for="password" value="{{ __('Password') }}" />
                <x-input id="password" class="block w-full mt-1" type="password" name="password" required autocomplete="current-password" />
            </div>
    <div class="block mt-2">
                <label for="show_password" class="flex items-center">
                    <x-checkbox id="show_password" name="shopaswword" onclick="showHide()"  id="shopaswword"/>
                    <span class="text-sm text-gray-600 ms-2">{{ __('Show Password') }}</span>
                </label>
            </div>
            <div class="block mt-4">
                <label for="remember_me" class="flex items-center">
                    <x-checkbox id="remember_me" name="remember" />
                    <span class="text-sm text-gray-600 ms-2">{{ __('Remember me') }}</span>
                </label>
            </div>


            <div class="flex items-center justify-end mt-4">
                <a class="text-sm text-gray-600 rounded-md hover:text-gray-900 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 margin-right: auto" href="{{ route('root') }}">
                        {{ __('Home') }}
                    </a>
                @if (Route::has('password.request'))
                    <a class="text-sm text-gray-600 underline rounded-md hover:text-gray-900 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" href="{{ route('password.request') }}">
                        {{ __('Forgot your password?') }}
                    </a>
                @endif

                <x-button class="ms-4">
                    {{ __('Log in') }}
                </x-button>
            </div>
        </form>
    </x-authentication-card>
<script>
function showHide() {
  var inputpass = document.getElementById("password");
  if (inputpass.type === "password") {
    inputpass.type = "text";
  } else {
    inputpass.type = "password";
  }
}
</script>
</x-guest-layout>
