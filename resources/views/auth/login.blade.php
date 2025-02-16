<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gradient-to-r from-[#c4fea5] to-[#9dffe1] flex items-center justify-center min-h-screen">

    <div class="w-full max-w-md p-8 bg-white rounded-lg shadow-md border border-gray-200">
        <!-- Logo and Name -->
        <div class="mb-6 flex items-center justify-center">
            <img src="{{ asset('images/logo.svg') }}" alt="Logo" class="w-16 mr-3">
            <h1 class="text-2xl font-semibold text-gray-600">LinkUp Mail</h1>
        </div>

        <h2 class="text-2xl font-bold text-center text-gray-600 mb-4">Masuk</h2>

        <!-- Login Form -->
        <form method="POST" action="{{ route('login') }}">
            @csrf

            <div class="mb-4">
                <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
                <input type="email" name="email" id="email" required class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:ring-2 focus:ring-[#B5E237] focus:outline-none">
            </div>

            <div class="mb-6">
                <label for="password" class="block text-sm font-medium text-gray-700">Password</label>
                <input type="password" name="password" id="password" required class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:ring-2 focus:ring-[#B5E237] focus:outline-none">
            </div>

            <div class="flex items-center justify-between">
                <button type="submit" class="w-full py-2 bg-[#56e237] text-white font-semibold rounded-md hover:bg-[#62c42d] transition duration-300">Masuk</button>
            </div>
        </form>

        <!-- Reset Password Link -->
        <div class="mt-4 text-center">
            <a href="{{ route('password.request') }}" class="text-sm text-[#56e237] hover:text-[#62c42d]">
                Lupa password?
            </a>
        </div>

        <div class="mt-4 text-center">
            <p class="text-sm text-gray-600">Belum punya akun? <a href="{{ route('register') }}" class="text-[#56e237] hover:text-[#9BC42D]">Daftar</a></p>
        </div>
    </div>

</body>

</html>