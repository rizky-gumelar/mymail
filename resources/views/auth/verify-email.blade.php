<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Verifikasi Email</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gradient-to-r from-[#c4fea5] to-[#9dffe1] flex items-center justify-center min-h-screen">

    <div class="w-full max-w-md p-8 bg-white rounded-lg shadow-md border border-gray-200">
        <!-- Logo and Name -->
        <div class="mb-6 flex items-center justify-center">
            <img src="{{ asset('images/logo.svg') }}" alt="Logo" class="w-16 mr-3">
            <h1 class="text-2xl font-semibold text-gray-600">LinkUp Mail</h1>
        </div>

        <h2 class="text-2xl font-bold text-center text-gray-600 mb-4">Verifikasi Email</h2>

        <!-- Verification Instructions -->
        <div class="mb-4 text-sm text-gray-600">
            {{ __('Terima kasih telah mendaftar! Sebelum memulai, harap verifikasi alamat email Anda dengan mengklik tautan yang telah kami kirimkan ke email Anda. Jika Anda tidak menerima email tersebut, kami akan dengan senang hati mengirimkan kembali.') }}
        </div>

        @if (session('status') == 'verification-link-sent')
        <div class="mb-4 font-medium text-sm text-green-600">
            {{ __('Tautan verifikasi baru telah dikirim ke alamat email yang Anda daftarkan.') }}
        </div>
        @endif

        <!-- Resend Verification Email Form -->
        <div class="mt-4 flex items-center justify-between">
            <form method="POST" action="{{ route('verification.send') }}">
                @csrf

                <div>
                    <button type="submit"
                        class="w-full py-2 px-2 bg-[#56e237] text-white font-semibold rounded-md hover:bg-[#62c42d] transition duration-300">
                        Kirim Ulang Email Verifikasi
                    </button>
                </div>
            </form>

            <!-- Logout Form -->
            <form method="POST" action="{{ route('logout') }}">
                @csrf

                <button type="submit"
                    class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                    {{ __('Log Out') }}
                </button>
            </form>
        </div>

    </div>

</body>

</html>