<!DOCTYPE html>
<html lang="tr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ArchaeoTech | Keşfet</title>
    <link rel="stylesheet" href="tasarim.css?v=1">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;700&display=swap" rel="stylesheet">
    <style>
        /* Eğer CSS dosyası yine yüklenmezse diye buraya acil durum kodları koyuyorum */
        body { 
            display: flex !important; 
            justify-content: center !important; 
            align-items: center !important; 
            min-height: 100vh; 
            margin: 0; 
            background: #fdfaf5;
            font-family: 'Montserrat', sans-serif;
        }
        .main-wrapper { text-align: center; width: 100%; max-width: 400px; padding: 20px; }
    </style>
</head>
<body>

<div class="main-wrapper">
    <header>
        <h1 style="color: #5d4037; letter-spacing: 3px;">ARCHAEOTECH</h1>
        <p style="color: #8d6e63;">Türkiye'nin Tarihi Mirasını Keşfedin</p>
    </header>

    <div class="search-card" style="background: white; padding: 30px; border-radius: 20px; box-shadow: 0 10px 30px rgba(0,0,0,0.1); border-top: 5px solid #d4af37;">
        <h3 style="margin-bottom: 20px; font-size: 1rem;">🔍 Hangi Eseri Merak Ediyorsunuz?</h3>
        <form action="analiz.php" method="post">
            <input type="text" name="eser_adi" placeholder="Örn: Ayasofya..." required style="width: 100%; padding: 15px; margin-bottom: 15px; border-radius: 10px; border: 1px solid #ddd;">
            <button type="submit" style="width: 100%; padding: 15px; background: #5d4037; color: white; border: none; border-radius: 10px; font-weight: bold; cursor: pointer;">KEŞFETMEYE BAŞLA</button>
        </form>
    </div>

    <footer style="margin-top: 40px; font-size: 0.8rem; color: #a1887f;">
        <strong>Nisa Nur Güzel</strong><br>
        Atatürk Üniversitesi© 2026
    </footer>
</div>

</body>
</html>
