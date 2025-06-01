<x-auth-layout title="Login" section_title="Welcome Back" section_description="Login with your account">
    @if (session('success'))
        <div class="bg-green-50 border border-green-500 text-green-500 px-3 py-2 rounded mb-4">
            {{ session('success') }}
        </div>
    @endif

    <form action="{{ route('auth.authenticate') }}" method="POST" class="flex flex-col gap-4 mt-2">
        @csrf

        <div class="flex flex-col gap-2">
            <label for="email" class="font-semibold text-sm">Email</label>
            <input type="email" id="email" name="email" required
                class="px-3 py-2 border border-zinc-300 bg-slate-50 rounded focus:outline-none focus:ring-2 focus:ring-green-500"
                placeholder="Your Email" value="{{ old('email') }}">
            @error('email')
                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
            @enderror
        </div>

        <div class="flex flex-col gap-2">
            <label for="password" class="font-semibold text-sm">Password</label>
            <input type="password" id="password" name="password" required
                class="px-3 py-2 border border-zinc-300 bg-slate-50 rounded focus:outline-none focus:ring-2 focus:ring-green-500"
                placeholder="Your Password">
            @error('password')
                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
            @enderror
        </div>

        <button type="submit"
            class="bg-green-600 hover:bg-green-700 text-white px-4 py-2 rounded font-semibold transition duration-200 shadow-md">
            Login
        </button>

        <p class="text-zinc-600 text-sm text-center mt-4">
            Don’t have an account?
            <a href="{{ route('auth.register') }}" class="text-green-600 font-semibold underline hover:text-green-700">
                Register Now
            </a>
        </p>
    </form>
</x-auth-layout>