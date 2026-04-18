<!DOCTYPE html>
<html lang="tr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ArchaeoTech | Türkiye'yi Keşfet</title>
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@700&family=Montserrat:wght@400;700&display=swap" rel="stylesheet">
    <style>
        * { box-sizing: border-box; margin: 0; padding: 0; }
        body {
            margin: 0;
            font-family: 'Montserrat', sans-serif;
            background: url('https://images.unsplash.com/photo-1599110906812-70659639534c?q=80&w=2070&auto=format&fit=crop') no-repeat center center fixed;
            background-size: cover;
            height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
        }
        .overlay {
            position: absolute;
            top: 0; left: 0; width: 100%; height: 100%;
            background: rgba(0, 0, 0, 0.5); /* Arka planı biraz karartır */
            z-index: 1;
        }
        .main-wrapper {
            position: relative;
            z-index: 2;
            text-align: center;
            width: 90%;
            max-width: 500px;
        }
        h1 {
            font-family: 'Playfair Display', serif;
            font-size: 3.5rem;
            color: #fff;
            letter-spacing: 5px;
            margin-bottom: 10px;
            text-shadow: 2px 2px 10px rgba(0,0,0,0.5);
        }
        p { color: #ddd; font-weight: 300; margin-bottom: 40px; }
        .search-card {
            background: rgba(255, 255, 255, 0.95);
            padding: 40px;
            border-radius: 25px;
            box-shadow: 0 15px 35px rgba(0,0,0,0.3);
            border-top: 6px solid #d4af37;
        }
        input[type="text"] {
            width: 100%;
            padding: 18px;
            border-radius: 12px;
            border: 1px solid #ddd;
            margin-bottom: 20px;
            font-size: 1rem;
            outline: none;
        }
        button {
            width: 100%;
            padding: 18px;
            background: #5d4037;
            color: white;
            border: none;
            border-radius: 12px;
            font-weight: 700;
            cursor: pointer;
            transition: 0.3s;
        }
        button:hover { background: #d4af37; transform: translateY(-2px); }
        footer { margin-top: 50px; color: #fff; font-size: 0.8rem; }
    </style>
</head>
<body>
    <div class="overlay"></div>
    <div class="main-wrapper">
        <header>
            <h1>ARCHAEOTECH</h1>
            <p>Türkiye'nin Tarihi Mirasını Keşfedin</p>
        </header>

        <div class="search-card">
            <form action="analiz.php" method="GET">
                <input type="text" name="q" placeholder="Eser Adı Yazın (Örn: Nemrut Dağı)" required>
                <button type="submit">KEŞFETMEYE BAŞLA</button>
            </form>
        </div>

        <footer>
            <strong>Nisa Nur Güzel</strong><br>
            Atatürk Üniversitesi Mezuniyet Projesi © 2026
        </footer>
    </div>
</body>
</html>
