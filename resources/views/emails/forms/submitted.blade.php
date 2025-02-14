<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pesan Kontak Baru</title>
    <style>
        /* Body dengan gradient background */
        body {
            font-family: Arial, sans-serif;
            background: linear-gradient(135deg, #6e7fdb, #2b87f0);
            /* Gradient Background */
            margin: 0;
            padding: 0;
            color: #ffffff;
            /* Font color untuk teks di body */
        }

        /* Kontainer untuk email, menambahkan pengaturan margin otomatis untuk center */
        .email-container {
            width: 100%;
            max-width: 600px;
            margin: 20px auto;
            /* Menjaga kontainer tetap di tengah dengan margin di layar kecil */
            background-color: #ffffff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            color: #333333;
            /* Teks pada container email */
            box-sizing: border-box;
        }

        /* Header Email */
        .email-header {
            text-align: center;
            margin-bottom: 20px;
        }

        .email-header h2 {
            font-size: 24px;
            color: #2b87f0;
            margin: 0;
        }

        /* Isi Konten Email */
        .email-content {
            font-size: 16px;
            color: #333333;
            line-height: 1.5;
        }

        .email-content p {
            margin: 8px 0;
        }

        /* Footer Email */
        .footer {
            text-align: center;
            font-size: 12px;
            color: #777777;
            margin-top: 20px;
            padding-top: 20px;
            border-top: 1px solid #e0e0e0;
        }

        .footer a {
            color: #2b87f0;
            text-decoration: none;
            font-weight: bold;
        }

        .footer p {
            margin: 5px 0;
        }

        /* Media Query untuk responsif di mobile */
        @media (max-width: 600px) {
            body {
                background: linear-gradient(135deg, #4a6cfa, #2b87f0);
                /* Gradient sedikit berbeda untuk mobile */
            }

            .email-container {
                margin: auto;
                margin-top: 30px;
                padding: 15px;
                /* Mengurangi padding di mobile */
            }

            .email-header h2 {
                font-size: 20px;
                /* Menurunkan ukuran font header untuk mobile */
            }

            .email-content {
                font-size: 14px;
                /* Menyesuaikan font size untuk mobile */
            }

            .footer {
                font-size: 11px;
            }
        }
    </style>
</head>

<body>

    <div class="email-container">
        <div class="email-header">
            <h2>Pesan Kontak Baru</h2>
        </div>

        <div class="email-content">
            <p><strong>Nama Pengirim:</strong> {{ $name }}</p>
            <p><strong>Email Pengirim:</strong> {{ $email }}</p>
            <p><strong>Pesan:</strong></p>
            <p>{{ $message }}</p>
        </div>

        <div class="footer">
            <p>Terima kasih telah menghubungi kami!</p>
            <p>Untuk pertanyaan lebih lanjut, kunjungi <a href="http://linkup.my.id">website kami</a>.</p>
        </div>
    </div>

</body>

</html>