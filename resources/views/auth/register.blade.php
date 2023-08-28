<x-guest-layout>
    <form method="POST" action="{{ route('register') }}">
        @csrf

        <h1 class="text-center">Register</h1>
        <!-- Name -->
        <div>
            <x-input-label for="nama_lengkap" :value="__('Nama Lengkap')" />
            <x-text-input  class="block mt-1 w-full" type="text" name="nama_lengkap" :value="old('nama_lengkap')" placeholder="Isi dengan nama lengkap anda." required autofocus autocomplete="nama_lengkap" />
            <x-input-error :messages="$errors->get('nama_lengkap')" class="mt-2" />
        </div>

        <!-- username Address -->
        <div class="mt-4">
            <x-input-label for="username" :value="__('Username')    " />
            <x-text-input  class="block mt-1 w-full" type="text" name="username" :value="old('username')" required autocomplete="username" placeholder="Isi dengan nama username anda." />
            <x-input-error :messages="$errors->get('username')" class="mt-2" />
            </div>

            <div class="mt-4">
                <x-input-label for="Nomor Handphone" :value="__('Nomor Handphone')    " />
                <x-text-input  class="block mt-1 w-full" type="number" name="telp" required autocomplete="telp" placeholder="Isi dengan nomor handphone anda" />
                <x-input-error :messages="$errors->get('telp')" class="mt-2" />
            </div>
        <!-- Password -->
        <div class="mt-4">
            <x-input-label for="password" :value="__('Password')"  />

            <x-text-input  class="block mt-1 w-full"
                            type="password"
                            name="password"
                            required autocomplete="new-password" placeholder="Minimal 8 karakter."/>

            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Confirm Password -->
        <div class="mt-4">
            <x-input-label for="password_confirmation" :value="__('Confirm Password')" />

            <x-text-input class="block mt-1 w-full"
                            type="password"
                            name="password_confirmation"
                            required autocomplete="new-password" placeholder="Ulangi penulisan password."/>

            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
        </div>



        <div class="flex items-center justify-end mt-4">
            <a class="underline text-sm text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800" href="{{ route('login') }}">
                {{ __('Sudah Mempunyai Akun?') }}
            </a>

            <x-primary-button class="ml-4">
                {{ __('Daftar Akun Saya') }}
            </x-primary-button>
        </div>
    </form>
</x-guest-layout>
