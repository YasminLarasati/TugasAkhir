<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Akreditasi Mandiri</title>

    <!-- Tailwind CSS via CDN -->
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gray-100 min-h-screen flex items-center justify-center">

    <div class="bg-white shadow-xl rounded-xl px-10 py-8 w-full max-w-md">

        <!-- Judul -->
        <h2 class="text-2xl font-bold text-center text-blue-700 mb-6">
            Login Sistem Akreditasi Mandiri <br>
            <span class="text-gray-600 text-lg">Perpustakaan Universitas Dinamika</span>
        </h2>

        @if($errors->any())
            <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded mb-4">
                {{ $errors->first() }}
            </div>
        @endif

        <form method="POST" action="{{ route('login') }}">
            @csrf

            <!-- Email-->
            <div class="mb-5">
                <label class="block text-gray-700 mb-2 font-medium">Email</label>
                <input type="email" name="email" required
                    class="w-full px-4 py-2 border rounded-lg focus:ring-2 focus:ring-blue-400 focus:outline-none"
                    placeholder="Masukkan emial anda...">
            </div>

            <!-- Password -->
            <div class="mb-5">
                <label class="block text-gray-700 mb-2 font-medium">Password</label>
                <input type="password" name="password" required
                    class="w-full px-4 py-2 border rounded-lg focus:ring-2 focus:ring-blue-400 focus:outline-none"
                    placeholder="Masukkan password...">
            </div>

            <!-- Tombol Login -->
            <button type="submit"
                class="w-full bg-blue-600 text-white py-2 rounded-lg font-semibold hover:bg-blue-700 transition duration-200">
                Login
            </button>
        </form>

        <!-- Footer -->
        <p class="text-center text-gray-500 text-sm mt-6">
            © {{ date('Y') }} Sistem Akreditasi Mandiri • Universitas Dinamika
        </p>

    </div>

</body>
</html>
