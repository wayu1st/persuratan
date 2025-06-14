<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Dashboard Persuratan</title>
    <style>
        /* Modern clean styling with high contrast and breathable spacing */
        @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@400;700&display=swap');

        body {
            font-family: 'Poppins', sans-serif;
            margin: 0;
            background: linear-gradient(135deg, #2b5876, #4e4376);
            color: #f0f0f0;
            min-height: 100vh;
            display: flex;
            flex-direction: column;
            align-items: center;
            padding: 40px 16px;
            box-sizing: border-box;
        }

        header {
            width: 100%;
            max-width: 1200px;
            margin-bottom: 48px;
            text-align: center;
        }

        h1 {
            font-weight: 700;
            font-size: 3rem;
            background: linear-gradient(135deg, #62a1f8, #7e3aff);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            margin-bottom: 8px;
        }

        p.subtitle {
            font-weight: 400;
            font-size: 1.25rem;
            color: #d1d1d1;
            margin-top: 0;
        }
        
        main {
            width: 100%;
            max-width: 1200px;
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
            gap: 32px;
        }

        .card {
            background: rgba(255, 255, 255, 0.08);
            border-radius: 14px;
            padding: 24px 32px;
            box-shadow: 0 6px 20px rgba(0, 0, 0, 0.4);
            display: flex;
            flex-direction: column;
            justify-content: center;
            transition: transform 0.3s ease, box-shadow 0.3s ease;
            cursor: default;
        }

        .card:hover {
            transform: translateY(-8px);
            box-shadow: 0 12px 30px rgba(0, 0, 0, 0.6);
        }

        .card h2 {
            font-size: 1.75rem;
            margin-bottom: 16px;
            color: #a8c0ff;
        }

        .card p {
            font-size: 1rem;
            line-height: 1.5;
            color: #c1c1c1;
            flex-grow: 1;
        }

        /* Responsive footer */
        footer {
            margin-top: 64px;
            color: #888;
            font-size: 0.9rem;
            text-align: center;
            width: 100%;
            max-width: 1200px;
        }

        @media (max-width: 640px) {
            h1 {
                font-size: 2.2rem;
            }

            main {
                grid-template-columns: 1fr;
                gap: 24px;
            }

            .card {
                padding: 20px 24px;
            }
        }
    </style>
</head>
<body>
    <header>
        <h1>Dashboard Persuratan</h1>
        <p class="subtitle">Sistem manajemen surat modern & responsif</p>
    </header>

    <main>
        <section class="card" role="region" aria-label="Jumlah surat masuk dan keluar">
            <h2>Surat Masuk & Keluar</h2>
            <p>Lihat dan kelola surat yang masuk dan keluar secara efisien dengan fitur pemfilteran dan pencarian lengkap.</p>
        </section>

        <section class="card" role="region" aria-label="Jenis surat yang tersedia">
            <h2>Jenis Surat</h2>
            <p>Organisasi surat berdasarkan tipe untuk memudahkan pengarsipan dan pelaporan.</p>
        </section>

        <section class="card" role="region" aria-label="Pengguna sistem">
            <h2>Manajemen Pengguna</h2>
            <p>Kelola akses dan hak pengguna agar keamanan data tetap terjaga serta distribusi tugas berjalan lancar.</p>
        </section>

        <section class="card" role="region" aria-label="Laporan dan statistik surat">
            <h2>Laporan & Statistik</h2>
            <p>Monitor aktivitas surat dengan grafik dan laporan yang informatif untuk pengambilan keputusan yang tepat.</p>
        </section>
    </main>

    <footer>
        &copy; {{ date('Y') }} Sistem Persuratan - Hak Cipta Dilindungi
    </footer>
</body>
</html>

