<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Email Berhasil Dikirim!</title>
    <script src="https://cdn.tailwindcss.com"></script> <!-- Pastikan TailwindCSS sudah terintegrasi -->
    <style>
        /* Animasi Fade-In untuk kontainer */
        @keyframes fadeIn {
            0% {
                opacity: 0;
                transform: translateY(20px);
            }

            100% {
                opacity: 1;
                transform: translateY(0);
            }
        }

        /* Animasi untuk kontainer utama */
        .fade-in {
            animation: fadeIn 1s ease-out;
        }

        /* Animasi untuk tombol */
        @keyframes scaleButton {
            0% {
                transform: scale(0.9);
            }

            100% {
                transform: scale(1);
            }
        }

        .scale-button {
            animation: scaleButton 0.3s ease-out;
        }

        /* Animasi SVG centang */
        @keyframes pulse {
            0% {
                transform: scale(1);
                stroke-width: 2;
            }

            50% {
                transform: scale(1.2);
                stroke-width: 3;
            }

            100% {
                transform: scale(1);
                stroke-width: 2;
            }
        }

        /* Apply pulse animation pada SVG */
        .pulse-animation {
            animation: pulse 1.5s ease-in-out infinite;
        }
    </style>
</head>

<body class="bg-gradient-to-r from-blue-50 to-green-50 flex items-center justify-center min-h-screen">

    <div class="bg-white p-10 rounded-lg shadow-2xl text-center max-w-lg w-full fade-in">
        <!-- Ikon SVG dengan animasi pulse -->
        <div class="mb-8">
            <svg xmlns="http://www.w3.org/2000/svg" class="w-20 h-20 text-green-600 mx-auto pulse-animation" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
            </svg>
        </div>

        <!-- Judul -->
        <h1 class="text-3xl font-bold text-green-600 mb-6">Email Berhasil Dikirim!</h1>

        <!-- Deskripsi -->
        <p class="text-lg text-gray-700 mb-8">
            Terima kasih! Email Anda telah sukses dikirim. Jangan lupa, kunjungi <a class="text-green-600" href="http://linkup.my.id">LinkUp Mail</a> untuk pengiriman email pada website anda.
        </p>

        <!-- Tombol Kembali -->
        <a href="javascript:history.back()" class="inline-block scale-button">
            <button class="px-8 py-3 bg-blue-600 text-white rounded-full hover:bg-blue-700 transition duration-300">
                Kembali
            </button>
        </a>
    </div>

</body>

</html>