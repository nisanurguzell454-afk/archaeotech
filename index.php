<!DOCTYPE html>
<html lang="tr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ArchaeoTech | Giriş</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
        <header>
            <h1>ARCHAEOTECH</h1>
            <p>Tarihi Miras Kayıt Sistemi</p>
        </header>

        <form action="analiz.php" method="post" enctype="multipart/form-data" class="card">
            <div class="input-group">
                <label>Eserin Fotoğrafı:</label>
                <input type="file" name="eser_resmi" required>
            </div>
            
            <div class="input-group">
                <label>Eserin Adı:</label>
                <input type="text" name="eser_adi" placeholder="Örn: Ayasofya" required>
            </div>

            <button type="submit" class="btn">ANALİZİ BAŞLAT</button>
        </form>
        
        <footer>
            <p>Nisa Nur Güzel | 2026</p>
        </footer>
    </div>
</body>
</html>
