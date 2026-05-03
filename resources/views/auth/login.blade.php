<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login Cafe</title>
  <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="min-h-screen bg-cover bg-center" style="background-image: url('https://images.unsplash.com/photo-1501339847302-ac426a4a7cbb');">

<div class="min-h-screen bg-cover bg-center"
    style="background-image: url('https://images.unsplash.com/photo-1501339847302-ac426a4a7cbb');">

    <!-- Overlay -->
    <div class="min-h-screen bg-black/60 flex items-center justify-center px-4">

        <!-- Card -->
        <div class="w-full max-w-lg bg-[#F5EDE1] rounded-3xl shadow-2xl p-8 md:p-10">

            <!-- Logo -->
            <div class="text-center mb-6">
                <div class="text-4xl">☕</div>
                <h1 class="text-2xl font-bold text-[#4A2C1F] mt-2">ZafarCafe</h1>
                <p class="text-sm text-gray-600">Booking Meja dengan Mudah</p>
            </div>

            <!-- Session Status -->
            @if (session('status'))
                <div class="mb-4 text-green-600 text-sm text-center">
                    {{ session('status') }}
                </div>
            @endif

            <!-- Form -->
            <form method="POST" action="{{ route('login') }}" class="space-y-4">
                @csrf

                <!-- Email -->
                <div>
                    <label class="block text-sm font-medium text-[#4A2C1F]">Email</label>
                    <input type="email" name="email" value="{{ old('email') }}"
                        class="w-full mt-1 px-4 py-3 rounded-xl border border-gray-300 focus:ring-2 focus:ring-orange-500 focus:outline-none"
                        required autofocus>

                    @error('email')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Password -->
                <div class="relative">
                    <label class="block text-sm font-medium text-[#4A2C1F]">Password</label>
                    <input id="password" type="password" name="password"
                        class="w-full mt-1 px-4 py-3 rounded-xl border border-gray-300 focus:ring-2 focus:ring-orange-500 focus:outline-none pr-10"
                        required>

                    <!-- Eye -->
                    <button type="button" onclick="togglePassword()"
                        class="absolute right-3 top-10 text-gray-500">
                        👁️
                    </button>

                    @error('password')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Remember -->
                <div class="flex items-center justify-between text-sm">
                    <label class="flex items-center gap-2">
                        <input type="checkbox" name="remember" class="rounded">
                        <span>Remember me</span>
                    </label>

                    @if (Route::has('password.request'))
                        <a href="{{ route('password.request') }}"
                            class="text-orange-600 hover:underline">
                            Forgot password?
                        </a>
                    @endif
                </div>

                <!-- Button -->
                <button type="submit"
                    class="w-full py-3 rounded-xl bg-[#D97706] text-white font-semibold hover:bg-[#EA580C] transition">
                    Login
                </button>

                <!-- Register -->
                <p class="text-center text-sm mt-4">
                    Belum punya akun?
                    <a href="{{ route('register') }}"
                        class="text-orange-600 font-semibold hover:underline">
                        Daftar sekarang
                    </a>
                </p>

            </form>
        </div>
    </div>
</div>

<script>
function togglePassword() {
    const input = document.getElementById('password');
    input.type = input.type === 'password' ? 'text' : 'password';
}
</script>

</body>
</html>
