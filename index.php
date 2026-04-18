<!DOCTYPE html>
<html lang="tr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ArchaeoTech | Kesfet</title>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;700&display=swap" rel="stylesheet">
    <style>
        * { box-sizing: border-box; margin: 0; padding: 0; }
        body { font-family: 'Montserrat', sans-serif; background: #fdfaf5; display: flex; justify-content: center; align-items: center; min-height: 100vh; color: #3e2723; }
        .main-wrapper { width: 100%; max-width: 450px; padding: 25px; text-align: center; }
        header h1 { font-size: 2.2rem; letter-spacing: 5px; color: #5d4037; margin-bottom: 5px; font-weight: 700; }
        header p { font-size: 0.9rem; color: #8d6e63; margin-bottom: 40px; font-weight: 300; }
        .search-card { background: #ffffff; padding: 35px 25px; border-radius: 25px; box-shadow: 0 20px 40px rgba(0,0,0,0.08); border-top: 6px solid #d4af37; }
        input[type="text"] { width: 100%; padding: 18px; border: 1px solid #e0e0e0; border-radius: 12px; margin-bottom: 20px; font-size: 1rem; outline: none; }
        .btn-discover { width: 100%; padding: 18px; background: #5d4037; color: #ffffff; border: none; border-radius: 12px; font-weight: 700; cursor: pointer; transition: 0.3s; }
        .btn-discover:hover { background: #d4af37; transform: translateY(-2px); }
        footer { margin-top: 50px; font-size: 0.8rem; color: #a1887f; line-height: 1.6; }
    </style>
</head>
<body>
    <div class="main-wrapper">
        <header>
            <h1>ARCHAEOTECH</h1>
            <p>Türkiye'nin Tarihi Mirasını Keşfedin</p>
        </header>
        <div class="search-card">
            <h3 style="margin-bottom:20px;">🔍 Hangi Eseri Merak Ediyorsunuz?</h3>
            <form action="analiz.php" method="post">
                <input type="text" name="eser_adi" placeholder="Örn: Erzurum Kalesi, Efes..." required>
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
