<?php
// PHP hata ayıklama modunu açalım (Beyaz ekranın sebebini görmek için)
error_reporting(E_ALL);
ini_set('display_errors', 1);
?>
<!DOCTYPE html>
<html lang="tr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ArchaeoTech | Türkiye</title>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;700&display=swap" rel="stylesheet">
    <style>
        * { box-sizing: border-box; margin: 0; padding: 0; }
        body {
            font-family: 'Montserrat', sans-serif;
            background: url('https://w0.peakpx.com/wallpaper/453/193/HD-wallpaper-turkey-historical-places-collage.jpg') no-repeat center center fixed;
            background-size: cover;
            height: 100vh; display: flex; justify-content: center; align-items: center;
        }
        .overlay { position: absolute; top: 0; left: 0; width: 100%; height: 100%; background: rgba(0,0,0,0.5); z-index: 1; }
        .card { position: relative; z-index: 2; background: white; padding: 40px; border-radius: 20px; text-align: center; width: 90%; max-width: 400px; border-top: 8px solid #d4af37; }
        select, button { width: 100%; padding: 15px; margin: 10px 0; border-radius: 10px; border: 1px solid #ddd; font-family: inherit; }
        button { background: #5d4037; color: white; font-weight: bold; cursor: pointer; border: none; }
        button:hover { background: #d4af37; }
    </style>
</head>
<body>
    <div class="overlay"></div>
    <div class="card">
        <h1 style="color:#5d4037; margin-bottom:10px;">ARCHAEOTECH</h1>
        <p style="font-size:13px; color:#777; margin-bottom:20px;">Türkiye'nin Tarihi Mirasını Keşfet</p>
        <form action="analiz.php" method="GET">
            <select name="q" required>
                <option value="" disabled selected>Bir yer seçin...</option>
                <option value="Efes">Efes Antik Kenti</option>
                <option value="Sümela Manastırı">Sümela Manastırı</option>
                <option value="Göbeklitepe">Göbeklitepe</option>
                <option value="Erzurum Kalesi">Erzurum Kalesi</option>
                <option value="Kapadokya">Kapadokya</option>
            </select>
            <button type="submit">KEŞFETMEYE BAŞLA</button>
        </form>
        <p style="margin-top:20px; font-size:11px;">Nisa Nur Güzel | 2026</p>
    </div>
</body>
</html>
