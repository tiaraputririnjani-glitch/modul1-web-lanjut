<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistem Akademik | Tiara Putri Rinjani</title>
    <style>
        /* CSS Modern & Menarik */
        :root {
            --primary: #6366f1;
            --secondary: #a855f7;
            --bg-gradient: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        }

        * {
            margin: 0; padding: 0; box-sizing: border-box;
            font-family: 'Plus Jakarta Sans', 'Segoe UI', sans-serif;
        }

        body {
            background: var(--bg-gradient);
            min-height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            padding: 40px 20px;
        }

        .main-container {
            background: rgba(255, 255, 255, 0.95);
            backdrop-filter: blur(10px);
            border-radius: 30px;
            box-shadow: 0 25px 50px -12px rgba(0, 0, 0, 0.25);
            width: 100%;
            max-width: 1000px;
            overflow: hidden;
            animation: fadeIn 0.8s ease-out;
        }

        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(20px); }
            to { opacity: 1; transform: translateY(0); }
        }

        .top-banner {
            background: linear-gradient(90deg, var(--primary), var(--secondary));
            padding: 60px 20px;
            text-align: center;
            color: white;
        }

        .top-banner h1 { font-size: 3rem; font-weight: 800; margin-bottom: 10px; }
        .top-banner p { font-size: 1.1rem; opacity: 0.9; letter-spacing: 1px; }

        .profile-section {
            display: flex;
            flex-direction: column;
            align-items: center;
            margin-top: -50px;
            padding: 0 40px 30px;
        }

        .avatar-wrapper {
            width: 120px; height: 120px;
            border-radius: 50%;
            background: white;
            display: flex; justify-content: center; align-items: center;
            box-shadow: 0 10px 25px rgba(0,0,0,0.1);
            border: 5px solid white;
        }

        .avatar-circle {
            width: 100%; height: 100%;
            border-radius: 50%;
            background: linear-gradient(45deg, #f093fb 0%, #f5576c 100%);
            display: flex; justify-content: center; align-items: center;
            font-size: 2.5rem; color: white; font-weight: bold;
        }

        .name-tag { text-align: center; margin-top: 15px; }
        .name-tag h2 { font-size: 1.8rem; color: #1e293b; }
        .name-tag p { color: #64748b; font-weight: 500; }

        .dashboard-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
            gap: 25px;
            padding: 20px 40px 40px;
        }

        .info-card {
            background: #ffffff;
            border: 1px solid #f1f5f9;
            border-radius: 20px;
            padding: 25px;
            transition: all 0.3s ease;
            position: relative;
            overflow: hidden;
        }

        .info-card:hover {
            transform: translateY(-10px);
            box-shadow: 0 20px 25px -5px rgba(0, 0, 0, 0.1);
            border-color: var(--primary);
        }

        .info-card h3 {
            font-size: 1.2rem; color: #1e293b;
            margin-bottom: 15px; display: flex; align-items: center; gap: 10px;
        }

        .mk-list { list-style: none; }
        .mk-item {
            padding: 10px 15px;
            background: #f8fafc;
            border-radius: 12px;
            margin-bottom: 8px;
            font-weight: 500;
            color: #475569;
            display: flex; justify-content: space-between;
        }

        .btn-modern {
            background: var(--bg-gradient);
            color: white;
            padding: 12px 25px;
            border-radius: 15px;
            text-decoration: none;
            font-weight: 700;
            display: inline-block;
            margin-top: 10px;
            box-shadow: 0 10px 15px -3px rgba(99, 102, 241, 0.4);
            transition: transform 0.2s;
        }

        .btn-modern:hover { transform: scale(1.05); }

        .footer-minimal {
            text-align: center;
            padding: 20px;
            color: #94a3b8;
            font-size: 0.85rem;
            border-top: 1px solid #f1f5f9;
        }

        @media (max-width: 640px) {
            .top-banner h1 { font-size: 2rem; }
            .dashboard-grid { padding: 20px; }
        }
    </style>
</head>
<body>

    <div class="main-container">
        <div class="top-banner">
            <h1>SIALIM</h1>
            <p>PORTAL AKADEMIK DIGITAL</p>
        </div>

        <div class="profile-section">
            <div class="avatar-wrapper">
                <div class="avatar-circle">TR</div>
            </div>
            <div class="name-tag">
                <h2>Tiara Putri Rinjani</h2>
                <p>NIM: 43240443 • Sistem Informasi</p>
            </div>
            <div style="margin-top: 15px;">
                <span style="background: #e0e7ff; color: #4338ca; padding: 5px 15px; border-radius: 20px; font-weight: bold; font-size: 0.9rem;">IPK: 3.85</span>
                <span style="background: #fef3c7; color: #92400e; padding: 5px 15px; border-radius: 20px; font-weight: bold; font-size: 0.9rem;">Semester 4</span>
            </div>
        </div>

        <div class="dashboard-grid">
            <div class="info-card">
                <h3><span>📚</span> Mata Kuliah Aktif</h3>
                <div class="mk-list">
                    @foreach($mata_kuliah as $mk)
                        <div class="mk-item">
                            <span>{{ $mk }}</span>
                            <span style="color: #10b981;">●</span>
                        </div>
                    @endforeach
                </div>
            </div>

            <div class="info-card">
                <h3><span>📅</span> Agenda Terdekat</h3>
                <div class="mk-item" style="border-left: 4px solid #f59e0b;">
                    <div><b>Kuis Data Mining</b><br><small>Besok, 08:00 WIB</small></div>
                </div>
                <div class="mk-item" style="border-left: 4px solid #ef4444;">
                    <div><b>Project Laravel</b><br><small>01 Feb, 08:00 WIB</small></div>
                </div>
                <a href="#" class="btn-modern">Lihat Semua</a>
            </div>

            <div class="info-card">
                <h3><span>📊</span> Progres SKS</h3>
                <p style="color: #64748b; font-size: 0.9rem; margin-bottom: 10px;">Target Lulus: 144 SKS</p>
                <div style="width: 100%; background: #e2e8f0; height: 10px; border-radius: 10px; margin-bottom: 15px;">
                    <div style="width: 65%; background: var(--bg-gradient); height: 100%; border-radius: 10px;"></div>
                </div>
                <p><b>65% Selesai</b> (94/144 SKS)</p>
            </div>
        </div>

        <div class="footer-minimal">
            &copy; 2026 Universitas Teknologi Digital • Build with 💜 by Tiara
        </div>
    </div>

</body>
</html>