<!DOCTYPE html>
<html lang="tr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ArchaeoTech | Keşfet</title>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;700&display=swap" rel="stylesheet">
    <style>
        body { font-family: 'Montserrat', sans-serif; background: #fdfaf5; display: flex; justify-content: center; align-items: center; min-height: 100vh; margin: 0; }
        .card { background: white; padding: 40px; border-radius: 20px; box-shadow: 0 10px 30px rgba(0,0,0,0.1); text-align: center; max-width: 400px; width: 90%; border-top: 5px solid #d4af37; }
        h1 { color: #5d4037; letter-spacing: 2px; }
        input { width: 100%; padding: 15px; margin: 20px 0; border-radius: 10px; border: 1px solid #ddd; outline: none; }
        button { width: 100%; padding: 15px; background: #5d4037; color: white; border: none; border-radius: 10px; font-weight: bold; cursor: pointer; }
        footer { margin-top: 30px; font-size: 12px; color: #a1887f; }
    </style>
</head>
<body>
    <div class="card">
        <h1>ARCHAEOTECH</h1>
        <p>Tarihi Miras Keşif Sistemi</p>
        <form action="analiz.php" method="GET">
            <input type="text" name="q" placeholder="Eser Adı (Örn: Efes)" required>
            <button type="submit">KEŞFETMEYE BAŞLA</button>
        </form>
        <footer>Nisa Nur Güzel | Atatürk Üniversitesi</footer>
    </div>
</body>
</html>
