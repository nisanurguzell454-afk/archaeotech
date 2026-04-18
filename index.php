<!DOCTYPE html>
<html lang="tr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <title>ArchaeoTech | Akıllı Analiz</title>
    <link rel="stylesheet" href="style.css">
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@700&family=Roboto:wght@300;400&display=swap" rel="stylesheet">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="mobile-web-app-status-bar-style" content="black">
</head>
<body>

<header>
    <h1>ARCHAEOTECH</h1>
    <p>Dijital Arkeoloji ve Dönem Teşhis Sistemi</p>
</header>

<div class="container">
    <div class="card">
        <h3>Eser Teşhis Paneli</h3>
        <p>Eserin fotoğrafını yükleyin ve adını yazın. Yapay zeka motorumuz dönemi ve tarihi detayları belirleyecektir.</p>
        
        <form action="analiz.php" method="post" enctype="multipart/form-data">
            <div class="form-group">
                <label>Eser Fotoğrafı</label>
                <input type="file" name="eser_resmi" accept="image/*" required>
            </div>

            <div class="form-group">
                <input type="text" name="eser_adi" placeholder="Eserin Adını Yazın (Örn: Sümela Manastırı)" required>
            </div>

            <button type="submit" class="btn-analiz">ANALİZİ BAŞLAT</button>
        </form>
    </div>
</div>

<footer>
    <p>Nisa Nur Güzel | Atatürk Üniversitesi Mezuniyet Projesi &copy; 2026</p>
</footer>

</body>
</html>
