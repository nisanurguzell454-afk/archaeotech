<!DOCTYPE html>
<html lang="tr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ArchaeoTech | Türkiye'yi Keşfet</title>
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@700&family=Montserrat:wght@400;700&display=swap" rel="stylesheet">
    <style>
        /* TÜM SAYFA AYARLARI */
        * { box-sizing: border-box; margin: 0; padding: 0; }
        
        body, html { height: 100%; }

        /* ARKA PLAN: TÜRKİYE'NİN TARİHİ ESERLERİNİ KAPSAYAN ÖZEL GÖRSEL */
        body {
            font-family: 'Montserrat', sans-serif;
            background: url('https://w0.peakpx.com/wallpaper/453/193/HD-wallpaper-turkey-historical-places-collage.jpg') no-repeat center center fixed;
            background-size: cover;
            display: flex;
            justify-content: center;
            align-items: center;
            overflow: hidden;
        }

        /* ARKA PLANI KARARTAN KATMAN (YAZILARIN OKUNMASI İÇİN) */
        .overlay {
            position: absolute;
            top: 0; left: 0; width: 100%; height: 100%;
            background: rgba(0, 0, 0, 0.4);
            z-index: 1;
        }

        /* ANA İÇERİK KUTUSU */
        .main-wrapper {
            position: relative;
            z-index: 2;
            text-align: center;
            width: 90%;
            max-width: 500px;
        }

        /* ŞIK BAŞLIK */
        h1 {
            font-family: 'Playfair Display', serif;
            font-size: 3.5rem;
            color: #ffffff;
            letter-spacing: 6px;
            margin-bottom: 5px;
            text-shadow: 3px 3px 15px rgba(0,0,0,0.7);
        }

        header p {
            color: #f1f1f1;
            font-weight: 300;
            margin-bottom: 40px;
            letter-spacing: 2px;
            text-shadow: 1px 1px 5px rgba(0,0,0,0.5);
        }

        /* ARAMA KARTI */
        .card {
            background: rgba(255, 255, 255, 0.93);
            padding: 45px 30px;
            border-radius: 30px;
            box-shadow: 0 20px 50px rgba(0,0,0,0.4);
            border-top: 8px solid #d4af37; /* Altın Sarısı Detay */
        }

        .card h3 {
            margin-bottom: 25px;
            color: #5d4037;
            font-size: 1.1rem;
        }

        /* GİRİŞ ALANI */
        input[type="text"] {
            width: 100%;
            padding: 18px;
            border-radius: 12px;
            border: 1px solid #ddd;
            margin-bottom: 25px;
            font-size: 1rem;
            outline: none;
            transition: 0.3s;
            text-align: center;
        }

        input[type="text"]:focus {
            border-color: #d4af37;
            box-shadow: 0 0 10px rgba(212, 175, 55, 0.2);
        }

        /* BUTON */
        button {
            width: 100%;
            padding: 18px;
            background: #5d4037;
            color: white;
            border: none;
            border-radius: 12px;
            font-weight: 700;
            font-size: 1.1rem;
            cursor: pointer;
            transition: 0.4s;
            letter-spacing: 1px;
        }

        button:hover {
            background: #d4af37;
            transform: translateY(-3px);
            box-shadow: 0 10px 20px rgba(0,0,0,0.2);
        }

        /* ALT BİLGİ */
        footer {
            margin-top: 60px;
            color: #ffffff;
            font-size: 0.85rem;
            line-height: 1.8;
            text-shadow: 1px 1px 5px #000;
        }
    </style>
</head>
<body>

<div class="overlay"></div>

<div class="main-wrapper">
    <header>
        <h1>ARCHAEOTECH</h1>
        <p>Türkiye'nin Tarihi Mirasını Keşfedin</p>
    </header>

    <div class="card">
        <h3>🔍 Hangi Eseri Merak Ediyorsunuz?</h3>
        <form action="analiz.php" method="GET">
            <input type="text" name="q" placeholder="Örn: Erzurum Kalesi, Efes, Nemrut..." required>
            <button type="submit">KEŞFETMEYE BAŞLA</button>
        </form>
    </div>

    <footer>
        <strong>Nisa Nur Güzel</strong><br>
        Atatürk Üniversitesi Mezuniyet Projesi © 2026
    </footer>
</div>

</body>
</html>
