<!DOCTYPE html>
<html lang="tr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ArchaeoTech | Türkiye'nin Tarihi Mirası</title>
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@700&family=Montserrat:wght@400;700&display=swap" rel="stylesheet">
    
    <style>
        /* SIFIRLAMA VE TEMEL AYARLAR */
        * { box-sizing: border-box; margin: 0; padding: 0; }
        
        html, body { height: 100%; width: 100%; margin: 0; overflow: hidden; }

        /* ARKA PLAN: TÜRKİYE'NİN TARİHİ YERLERİNİ KAPSAYAN ÖZEL KOLAJ GÖRSELİ */
        body {
            font-family: 'Montserrat', sans-serif;
            /* Bu resim Türkiye'nin ikonik yerlerini içeren profesyonel bir kolajdır */
            background-image: url('https://w0.peakpx.com/wallpaper/453/193/HD-wallpaper-turkey-historical-places-collage.jpg');
            
            /* Resmin tam ortalanmasını ve tekrar etmemesini sağlar */
            background-position: center center;
            background-repeat: no-repeat;
            
            /* Resmin ekranla birlikte kaymamasını (sabit kalmasını) sağlar */
            background-attachment: fixed;
            
            /* En Önemli Satır: Resmi tüm ekrana hatasız yayar, boşluk bırakmaz */
            background-size: cover; 
            
            display: flex;
            justify-content: center;
            align-items: center;
            position: relative;
        }

        /* ARKA PLANI ŞIKLAŞTIRAN VE OKUNABİLİRLİĞİ ARTIRAN KARARTMA PERDESİ */
        .overlay {
            position: absolute;
            top: 0; left: 0; width: 100%; height: 100%;
            background: rgba(0, 0, 0, 0.5); /* Siyahlık oranını %50 yaptık */
            z-index: 1;
        }

        /* ANA İÇERİK KONTEYNERI (main-wrapper) */
        .main-wrapper {
            position: relative;
            z-index: 2;
            text-align: center;
            width: 90%;
            max-width: 480px;
        }

        /* BAŞLIK TASARIMI */
        h1 {
            font-family: 'Playfair Display', serif;
            font-size: 3.5rem;
            color: #ffffff;
            letter-spacing: 5px;
            margin-bottom: 10px;
            text-shadow: 3px 3px 15px rgba(0,0,0,0.8);
        }

        header p { 
            color: #f1f1f1; 
            margin-bottom: 35px; 
            font-weight: 300;
            text-shadow: 1px 1px 5px rgba(0,0,0,0.6); 
        }

        /* SEÇİM KARTI (BEYAZ KUTU) */
        .card {
            background: rgba(255, 255, 255, 0.96);
            padding: 45px 35px;
            border-radius: 30px;
            box-shadow: 0 25px 50px rgba(0,0,0,0.5);
            border-top: 10px solid #d4af37; /* Altın Sarısı Kalın Çizgi */
        }

        .card h3 {
            margin-bottom: 25px;
            color: #5d4037;
            font-size: 1.2rem;
            font-weight: 700;
        }

        /* SEÇİM KUTUSU (SELECT) */
        select {
            width: 100%;
            padding: 18px;
            border-radius: 12px;
            border: 2px solid #ddd;
            margin-bottom: 25px;
            font-size: 1rem;
            font-family: 'Montserrat', sans-serif;
            background-color: #fff;
            outline: none;
            text-align: center;
