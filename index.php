<!DOCTYPE html>
<html lang="tr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ArchaeoTech | Türkiye'nin Mirası</title>
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@700&family=Montserrat:wght@400;700&display=swap" rel="stylesheet">
    
    <style>
        /* TEMEL AYARLAR */
        * { box-sizing: border-box; margin: 0; padding: 0; }
        html, body { height: 100%; width: 100%; overflow: hidden; }

        /* ARKA PLAN KOLAJI */
        body {
            font-family: 'Montserrat', sans-serif;
            background: url('https://w0.peakpx.com/wallpaper/453/193/HD-wallpaper-turkey-historical-places-collage.jpg') no-repeat center center fixed;
            background-size: cover;
            display: flex;
            justify-content: center;
            align-items: center;
            position: relative;
        }

        /* KARARTMA PERDESİ (Yazıların netliği için) */
        .overlay {
            position: absolute;
            top: 0; left: 0; width: 100%; height: 100%;
            background: rgba(0, 0, 0, 0.55);
            z-index: 1;
        }

        /* ANA KUTU */
        .main-wrapper {
            position: relative;
            z-index: 2;
            text-align: center;
            width: 95%;
            max-width: 500px;
        }

        h1 {
            font-family: 'Playfair Display', serif;
            font-size: 3rem;
            color: #ffffff;
            letter-spacing: 5px;
            margin-bottom: 10px;
            text-shadow: 2px 2px 10px rgba(0,0,0,0.8);
        }

        .subtitle {
            color: #f1f1f1;
            margin-bottom: 30px;
            font-size: 1rem;
            text-shadow: 1px 1px 5px rgba(0,0,0,0.5);
        }

        /* BEYAZ KART ALANI */
        .card {
            background: rgba(255, 255, 255, 0.96);
            padding: 40px 30px;
            border-radius: 25px;
            box-shadow: 0 20px 40px rgba(0,0,0,0.4);
            border-top: 10px solid #d4af37;
        }

        .card h3 {
            margin-bottom: 25px;
            color: #5d4037;
            font-size: 1.2rem;
        }

        /* SEÇİM LİSTESİ (SELECT) */
        select
