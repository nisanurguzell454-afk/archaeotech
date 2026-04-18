<!DOCTYPE html>
<html lang="tr">
<head>
    <meta charset="UTF-8">
    <title>ArchaeoTech | Giriş</title>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;700&display=swap" rel="stylesheet">
    <style>
        * { box-sizing: border-box; margin: 0; padding: 0; }
        body {
            font-family: 'Montserrat', sans-serif;
            background: url('https://w0.peakpx.com/wallpaper/453/193/HD-wallpaper-turkey-historical-places-collage.jpg') no-repeat center center fixed;
            background-size: cover; height: 100vh; display: flex; justify-content: center; align-items: center;
        }
        .overlay { position: absolute; top: 0; left: 0; width: 100%; height: 100%; background: rgba(0,0,0,0.6); z-index: 1; }
        .container { position: relative; z-index: 2; background: rgba(255,255,255,0.96); padding: 40px; border-radius: 25px; text-align: center; width: 90%; max-width: 450px; border-top: 10px solid #d4af37; box-shadow: 0 15px 35px rgba(0,0,0,0.5); }
        select, button { width: 100%; padding: 15px; margin: 10px 0; border-radius: 12px; border: 1px solid #ddd; font-size: 1rem; outline: none; }
        button { background: #5d4037; color: white; font-weight: bold; cursor: pointer; border: none; transition: 0.3s; }
        button:hover { background: #d4af37; transform: translateY(-3px); }
    </style>
</head>
<body>
    <div class="overlay"></div>
    <div class="container">
        <h1 style="color:#5d4037; margin-bottom:15px; letter-spacing: 2px;">ARCHAEOTECH</h1>
        <form action="analiz.php" method="GET">
            <h3 style="margin-bottom:15px; font-size:1rem; color:#5d4037;">TARİHİ YER SEÇİNİZ</h3>
            <select name="q" required>
                <option value="" disabled selected>Lütfen bir yer seçin...</option>
                <option value="Erzurum Kalesi">Erzurum Kalesi</option>
                <option value="Çifte Minareli Medrese">Çifte Minareli Medrese</option>
                <option value="Sümela Manastırı">Sümela Manastırı</option>
                <option value="Efes Antik Kenti">Efes Antik Kenti</option>
                <option value="Göbeklitepe">Göbeklitepe</option>
                <option value="Kapadokya">Kapadokya</option>
                <option value="Nemrut Dağı">Nemrut Dağı</option>
                <option value="İshak Paşa Sarayı">İshak Paşa Sarayı</option>
            </select>
            <button type="submit">ANALİZİ VE KONUMU GÖR</button>
        </form>
    </div>
</body>
</html>
