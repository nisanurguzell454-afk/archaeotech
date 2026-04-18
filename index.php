<!DOCTYPE html>
<html lang="tr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ArchaeoTech | Giriş</title>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;700&family=Playfair+Display:wght@700&display=swap" rel="stylesheet">
    <style>
        * { box-sizing: border-box; margin: 0; padding: 0; }
        body, html { height: 100%; width: 100%; overflow: hidden; }
        body {
            font-family: 'Montserrat', sans-serif;
            background: url('https://w0.peakpx.com/wallpaper/453/193/HD-wallpaper-turkey-historical-places-collage.jpg') no-repeat center center fixed;
            background-size: cover;
            display: flex; justify-content: center; align-items: center; position: relative;
        }
        .overlay { position: absolute; top: 0; left: 0; width: 100%; height: 100%; background: rgba(0,0,0,0.6); z-index: 1; }
        .container { position: relative; z-index: 2; background: rgba(255,255,255,0.96); padding: 40px; border-radius: 25px; text-align: center; width: 90%; max-width: 450px; border-top: 10px solid #d4af37; box-shadow: 0 15px 35px rgba(0,0,0,0.5); }
        h1 { font-family: 'Playfair Display', serif; color: #5d4037; font-size: 2.5rem; margin-bottom: 20px; letter-spacing: 2px; }
        select, button { width: 100%; padding: 15px; margin: 10px 0; border-radius: 12px; border: 1px solid #ddd; font-size: 1rem; outline: none; display: block; }
        button { background: #5d4037; color: white; font-weight: bold; cursor: pointer; border: none; transition: 0.3s; }
        button:hover { background: #d4af37; transform: translateY(-3px); }
    </style>
</head>
<body>
    <div class="overlay"></div>
    <div class="container">
        <h1>ARCHAEOTECH</h1>
        <p style="margin-bottom:20px; color:#666;">Türkiye'nin Mirasını Keşfedin</p>
        <form action="analiz.php" method="GET">
            <h3 style="color:#5d4037; font-size:1rem; margin-bottom:10px;">TARİHİ YER SEÇİNİZ</h3>
            <select name="q" required>
                <option value="" disabled selected>Lütfen listeden bir yer seçin...</option>
                <option value="Efes">Efes Antik Kenti (İzmir)</option>
                <option value="Sümela Manastırı">Sümela Manastırı (Trabzon)</option>
                <option value="Göbeklitepe">Göbeklitepe (Şanlıurfa)</option>
                <option value="Nemrut Dağı">Nemrut Dağı (Adıyaman)</option>
                <option value="Kapadokya">Kapadokya (Nevşehir)</option>
                <option value="Erzurum Kalesi">Erzurum Kalesi (Erzurum)</option>
                <option value="Çifte Minareli Medrese">Çifte Minareli Medrese (Erzurum)</option>
                <option value="İshak Paşa Sarayı">İshak Paşa Sarayı (Ağrı)</option>
                <option value="Ani (antik kent)">Ani Antik Kenti (Kars)</option>
                <option value="Ayasofya">Ayasofya (İstanbul)</option>
                <option value="Topkapı Sarayı">Topkapı Sarayı (İstanbul)</option>
                <option value="Hattuşaş">Hattuşaş (Çorum)</option>
                <option value="Aspendos">Aspendos (Antalya)</option>
            </select>
            <button type="submit">ANALİZİ BAŞLAT</button>
        </form>
        <p style="margin-top:20px; font-size:11px; color:#999;">Nisa Nur Güzel | 2026</p>
    </div>
</body>
</html>
