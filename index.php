<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
?>
<!DOCTYPE html>
<html lang="tr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ArchaeoTech | Türkiye'nin Mirası</title>
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@700&family=Montserrat:wght@400;700&display=swap" rel="stylesheet">
    <style>
        * { box-sizing: border-box; margin: 0; padding: 0; }
        html, body { height: 100%; width: 100%; overflow: hidden; }

        /* ARKA PLAN: TÜRKİYE TARİHİ YERLER KOLAJI */
        body {
            font-family: 'Montserrat', sans-serif;
            background: url('https://w0.peakpx.com/wallpaper/453/193/HD-wallpaper-turkey-historical-places-collage.jpg') no-repeat center center fixed;
            background-size: cover;
            display: flex;
            justify-content: center;
            align-items: center;
            position: relative;
        }

        .overlay {
            position: absolute;
            top: 0; left: 0; width: 100%; height: 100%;
            background: rgba(0, 0, 0, 0.55);
            z-index: 1;
        }

        .main-wrapper {
            position: relative;
            z-index: 2;
            text-align: center;
            width: 90%;
            max-width: 480px;
        }

        h1 {
            font-family: 'Playfair Display', serif;
            font-size: 3.2rem;
            color: #ffffff;
            letter-spacing: 5px;
            text-shadow: 2px 2px 10px rgba(0,0,0,0.8);
            margin-bottom: 20px;
        }

        .card {
            background: rgba(255, 255, 255, 0.96);
            padding: 40px;
            border-radius: 30px;
            box-shadow: 0 20px 50px rgba(0,0,0,0.5);
            border-top: 10px solid #d4af37;
        }

        select, button {
            width: 100%;
            padding: 18px;
            border-radius: 12px;
            font-size: 1rem;
            font-family: 'Montserrat', sans-serif;
            margin-bottom: 20px;
            outline: none;
        }

        select { border: 2px solid #ddd; background: #fff; cursor: pointer; }

        button {
            background: #5d4037;
            color: white;
            border: none;
            font-weight: 700;
            cursor: pointer;
            transition: 0.3s;
        }

        button:hover { background: #d4af37; transform: translateY(-3px); }

        footer { margin-top: 40px; color: white; font-size: 0.85rem; text-shadow: 1px 1px 5px #000; }
    </style>
</head>
<body>
    <div class="overlay"></div>
    <div class="main-wrapper">
        <h1>ARCHAEOTECH</h1>
        
        <div class="card">
            <h3 style="color:#5d4037; margin-bottom:20px;">🏛️ Keşfedilecek Yeri Seçin</h3>
            <form action="analiz.php" method="GET">
                <select name="q" required>
                    <option value="" disabled selected>Wikipedia başlıklarından seçin...</option>
                    <option value="Efes">Efes (İzmir)</option>
                    <option value="Sümela Manastırı">Sümela Manastırı (Trabzon)</option>
                    <option value="Nemrut Dağı">Nemrut Dağı (Adıyaman)</option>
                    <option value="Göbeklitepe">Göbeklitepe (Şanlıurfa)</option>
                    <option value="Kapadokya">Kapadokya (Nevşehir)</option>
                    <option value="Erzurum Kalesi">Erzurum Kalesi (Erzurum)</option>
                    <option value="Çifte Minareli Medrese">Çifte Minareli Medrese (Erzurum)</option>
                    <option value="Üç Kümbetler">Üç Kümbetler (Erzurum)</option>
                    <option value="İshak Paşa Sarayı">İshak Paşa Sarayı (Ağrı)</option>
                    <option value="Ayasofya">Ayasofya (İstanbul)</option>
                    <option value="Topkapı Sarayı">Topkapı Sarayı (İstanbul)</option>
                    <option value="Ani (antik kent)">Ani Antik Kenti (Kars)</option>
                    <option value="Aspendos">Aspendos (Antalya)</option>
                    <option value="Hattuşaş">Hattuşaş (Çorum)</option>
                    <option value="Zeugma">Zeugma (Gaziantep)</option>
                    <option value="Çatalhöyük">Çatalhöyük (Konya)</option>
                    <option value="Bergama">Bergama (İzmir)</option>
                    <option value="Truva">Truva Antik Kenti (Çanakkale)</option>
                </select>
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
