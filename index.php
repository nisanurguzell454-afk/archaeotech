<!DOCTYPE html>
<html lang="tr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <title>ArchaeoTech | Akıllı Keşif</title>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300;500;700&display=swap" rel="stylesheet">
    <style>
        /* TÜM TASARIMI BURAYA GÖMDÜM - HATA ŞANSI SIFIR */
        * { box-sizing: border-box; margin: 0; padding: 0; }
        
        body {
            font-family: 'Montserrat', sans-serif;
            background: #fdfaf5; /* Antik fildişi rengi */
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            color: #3e2723;
        }

        .main-wrapper {
            width: 100%;
            max-width: 450px;
            padding: 25px;
            text-align: center;
        }

        header h1 {
            font-size: 2.2rem;
            letter-spacing: 5px;
            color: #5d4037;
            margin-bottom: 5px;
            font-weight: 700;
        }

        header p {
            font-size: 0.9rem;
            color: #8d6e63;
            margin-bottom: 40px;
            font-weight: 300;
        }

        .search-card {
            background: #ffffff;
            padding: 35px 25px;
            border-radius: 25px;
            box-shadow: 0 20px 40px rgba(0,0,0,0.08);
            border-top: 6px solid #d4af37; /* Altın sarısı detay */
        }

        .search-card h3 {
            margin-bottom: 25px;
            font-size: 1.1rem;
            color: #5d4037;
        }

        input[type="text"] {
            width: 100%;
            padding: 18px;
            border: 1px solid #e0e0e0;
            border-radius: 12px;
            margin-bottom: 20px;
            font-size: 1rem;
            font-family: inherit;
            outline: none;
            transition: 0.3s;
        }

        input[type="text"]:focus {
            border-color: #d4af37;
            box-shadow: 0 0 10px rgba(212, 175, 55, 0.1);
        }

        .btn-discover {
            width: 100%;
            padding: 18px;
            background: #5d4037;
            color: #ffffff;
            border: none;
            border-radius: 12px;
            font-weight: 700;
            font-size: 1rem;
            cursor: pointer;
            transition: 0.3s;
            letter-spacing: 1px;
        }

        .btn-discover:hover {
            background: #d4af37;
            transform: translateY(-2px);
        }

        footer {
            margin-top: 50px;
            font-size: 0.8rem;
            color: #a1887f;
            line-height: 1.6;
        }

        /* Mobil Cihazlar İçin Ekstra Hassasiyet */
        @media (max-width: 400px) {
            header h1 { font-size: 1.8rem; }
            .search-card { padding: 25px 15px; }
        }
        </style>
</head>
<body>

<div class="main-wrapper">
    <header>
        <h1>ARCHAEOTECH</h1>
        <p>Türkiye'nin Tarihi Mirasını Keşfedin</p>
    </header>

    <div class="search-card">
        <h3>🔍 Hangi Eseri Merak Ediy
