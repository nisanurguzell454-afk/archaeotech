<!DOCTYPE html>
<html lang="tr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ArchaeoTech | Tarihi Keşif</title>
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@700&family=Montserrat:wght@400;700&display=swap" rel="stylesheet">
    <style>
        /* SIFIRLAMA VE ANA AYARLAR */
        * { box-sizing: border-box; margin: 0; padding: 0; }
        
        body, html { height: 100%; margin: 0; overflow: hidden; }

        /* ARKA PLAN: TÜRKİYE'NİN TARİHİ ESERLERİNİ KAPSAYAN KOLAJ */
        body {
            font-family: 'Montserrat', sans-serif;
            background: url('https://w0.peakpx.com/wallpaper/453/193/HD-wallpaper-turkey-historical-places-collage.jpg') no-repeat center center fixed;
            background-size: cover;
            display: flex;
            justify-content: center;
            align-items: center;
            position: relative;
        }

        /* KARARTMA KATMANI */
        .overlay {
            position: absolute;
            top: 0; left: 0; width: 100%; height: 100%;
            background: rgba(0, 0, 0, 0.5);
            z-index: 1;
        }

        /* İÇERİK KUTUSU */
        .main-wrapper {
            position: relative;
            z-index: 2;
            text-align: center;
            width: 90%;
            max-width: 480px;
        }

        h1 {
            font-family: 'Playfair Display', serif;
            font-size: 3rem;
            color: #ffffff;
            letter-spacing: 5px;
            margin-bottom: 10px;
            text-shadow: 2px 2px 10px rgba(0,0,0,0.7);
        }

        header p { color: #f1f1f1; margin-bottom: 30px; text-shadow: 1px 1px 5px rgba(0,0,0,0.5); }

        /* KART TASARIMI */
        .card {
            background: rgba(255, 255, 255, 0.95);
            padding: 40px;
            border-radius: 25px;
            box-shadow: 0 15px 35px rgba(0,0,0,0.4);
            border-top: 8px solid #d4af37;
        }

        /* SEÇİM KUTUSU (SELECT) STİLİ */
        select {
            width: 100%;
            padding: 15px;
            border-radius: 10px;
            border: 1px solid #ddd;
            margin-bottom: 25px;
            font-size: 1rem;
            font-family: 'Montserrat', sans-serif;
            background-color: white;
            cursor: pointer;
            outline: none;
        }

        button {
            width: 100%;
            padding: 18px;
            background: #5d4037;
            color: white;
            border: none;
            border-radius: 12px;
            font-weight: 700;
            cursor: pointer;
            transition: 0.3s;
        }

        button:hover { background: #d4af37; transform: translateY(-3px); }

        footer { margin-top: 40px; color: white; font-size: 0.8rem; text-shadow: 1px 1px 5px #000; }
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
        <h3>📍 Keşfetmek İstediğiniz Yeri Seçin</h3>
        <br>
        <form action="analiz.php" method="GET">
            <select name="q" required>
                <option value="" disabled selected>Bir yer seçiniz...</option>
                <option value="Efes Antik Kenti">Efes Antik Kenti (İzmir)</option>
                <option value="Sümela Manastırı">Sümela Manastırı (Trabzon)</option>
                <option value="Nemrut Dağı">Nemrut Dağı (Adıyaman)</option>
                <option value="Göbeklitepe">Göbeklitepe (Şanlıurfa)</option>
                <option value="Kapadokya">Kapadokya (Nevşehir)</option>
                <option value="Erzurum Kalesi">Erzurum Kalesi (Erzurum)</option>
                <option value="Çifte Minareli Medrese">Çifte Minareli Medrese (Erzurum)</option>
                <option value="İshak Paşa Sarayı">İshak Paşa Sarayı (Ağrı)</option>
                <option value="Ayasofya">Ayasofya-i Kebir Cami (İstanbul)</option>
                <option value="Topkapı Sarayı">Topkapı Sarayı (İstanbul)</option>
                <option value="Ani Harabeleri">Ani Harabeleri (Kars)</option>
                <option value="Aspendos">Aspendos Antik Tiyatrosu (Antalya)</option>
                <option value="Hattuşaş">Hattuşaş (Çorum)</option>
                <option value="Çatalhöyük">Çatalhöyük (Konya)</option>
                <option value="Zeugma">Zeugma Antik Kenti (Gaziantep)</option>
            </select>
            <button type="submit">ANALİZİ VE HARİTAYI GÖR</button>
        </form>
    </div>

    <footer>
        <strong>Nisa Nur Güzel</strong><br>
        Atatürk Üniversitesi Mezuniyet Projesi © 2026
    </footer>
</div>

</body>
</html>
