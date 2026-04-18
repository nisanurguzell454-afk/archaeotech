<!DOCTYPE html>
<html lang="tr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ArchaeoTech | Keşfet</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="main-wrapper">
        <header>
            <h1>ARCHAEOTECH</h1>
            <p style="color:#8d6e63; margin-bottom:40px;">Türkiye'nin Tarihi Mirasını Keşfedin</p>
        </header>

        <div class="search-card">
            <h3 style="margin-bottom:20px;">🔍 Hangi Eseri Merak Ediyorsunuz?</h3>
            <form action="analiz.php" method="post">
                <input type="text" name="eser_adi" placeholder="Örn: Erzurum Kalesi, Ayasofya..." required>
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
