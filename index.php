<!DOCTYPE html>
<html lang="tr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ArchaeoTech | Giriş</title>
    <link rel="stylesheet" href="style.css">
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@700&family=Montserrat:wght@400;700&display=swap" rel="stylesheet">
</head>
<body class="home-bg">
    <div class="overlay"></div>
    <div class="main-wrapper">
        <header>
            <h1>ARCHAEOTECH</h1>
            <p>Türkiye'nin Tarihi Mirasını Keşfedin</p>
        </header>

        <div class="search-card">
            <h3>🔍 Merak Ettiğiniz Eseri Yazın</h3>
            <form action="analiz.php" method="post">
                <input type="text" name="eser_adi" placeholder="Örn: Erzurum Kalesi, Efes, Ayasofya..." required>
                <button type="submit" class="btn-discover">KEŞFETMEYE BAŞLA</button>
            </form>
        </div>

        <footer>
            <strong>Nisa Nur Güzel</strong><br>
            Atatürk Üniversitesi Mezuniyet Projesi © 2026
        </footer>
    </div>
</body>
</html>
