<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reset Password</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gradient-to-r from-[#c4fea5] to-[#9dffe1] flex items-center justify-center min-h-screen">

    <div class="w-full max-w-md p-8 bg-white rounded-lg shadow-md border border-gray-200">
        <!-- Logo and Name -->
        <div class="mb-6 flex items-center justify-center">
            <img src="{{ asset('images/logo.svg') }}" alt="Logo" class="w-16 mr-3">
            <h1 class="text-2xl font-semibold text-gray-600">LinkUp Mail</h1>
        </div>

        <h2 class="text-2xl font-bold text-center text-gray-600 mb-4">Reset Password</h2>

        <!-- Reset Password Form -->
        <form method="POST" action="{{ route('password.store') }}">
            @csrf

            <!-- Password Reset Token -->
            <input type="hidden" name="token" value="{{ $request->route('token') }}">

            <!-- Email Address -->
            <div class="mb-4">
                <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
                <input type="email" name="email" id="email" value="{{ old('email', $request->email) }}" required
                    class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:ring-2 focus:ring-[#B5E237] focus:outline-none">
                @error('email')
                <div class="text-red-600 text-xs mt-2">{{ $message }}</div>
                @enderror
            </div>

            <!-- Password -->
            <div class="mb-4">
                <label for="password" class="block text-sm font-medium text-gray-700">Password</label>
                <input type="password" name="password" id="password" required
                    class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:ring-2 focus:ring-[#B5E237] focus:outline-none">
                @error('password')
                <div class="text-red-600 text-xs mt-2">{{ $message }}</div>
                @enderror
            </div>

            <!-- Confirm Password -->
            <div class="mb-6">
                <label for="password_confirmation" class="block text-sm font-medium text-gray-700">Confirm Password</label>
                <input type="password" name="password_confirmation" id="password_confirmation" required
                    class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:ring-2 focus:ring-[#B5E237] focus:outline-none">
                @error('password_confirmation')
                <div class="text-red-600 text-xs mt-2">{{ $message }}</div>
                @enderror
            </div>

            <!-- Submit Button -->
            <div class="flex items-center justify-end mt-4">
                <button type="submit"
                    class="w-full py-2 bg-[#56e237] text-white font-semibold rounded-md hover:bg-[#62c42d] transition duration-300">
                    Reset Password
                </button>
            </div>
        </form>

        <div class="mt-4 text-center">
            <p class="text-sm text-gray-600">
                <a href="{{ route('login') }}" class="text-[#56e237] hover:text-[#62c42d]">
                    Kembali ke Halaman Login
                </a>
            </p>
        </div>
    </div>

</body>

</html>