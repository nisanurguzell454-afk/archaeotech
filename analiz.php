<!DOCTYPE html>
<html lang="tr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ArchaeoTech | Analiz Sonucu</title>
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@700&family=Montserrat:wght@400;700&display=swap" rel="stylesheet">
    <style>
        /* TASARIM AYARLARI */
        * { box-sizing: border-box; margin: 0; padding: 0; }
        body { 
            font-family: 'Montserrat', sans-serif; 
            background: #fdfaf5; 
            display: flex; 
            justify-content: center; 
            padding: 40px 20px;
            color: #3e2723;
        }
        .container { 
            max-width: 700px; 
            width: 100%; 
            background: white; 
            padding: 40px; 
            border-radius: 25px; 
            box-shadow: 0 15px 35px rgba(0,0,0,0.1); 
            border-top: 10px solid #d4af37; 
            text-align: center;
        }
        h2 { 
            font-family: 'Playfair Display', serif; 
            color: #5d4037; 
            font-size: 2.2rem; 
            margin-bottom: 25px; 
        }
        .eser-img { 
            width: 100%; 
            max-height: 400px; 
            object-fit: cover; 
            border-radius: 15px; 
            margin-bottom: 25px; 
            box-shadow: 0 5px 15px rgba(0,0,0,0.1);
        }
        .bilgi { 
            line-height: 1.8; 
            text-align: justify; 
            color: #444; 
            font-size: 1.1rem; 
            margin-bottom: 30px;
        }
        .map-box { 
            margin-top: 40px; 
            border-radius: 20px; 
            overflow: hidden; 
            border: 2px solid #f1ede4;
        }
        .btn-back { 
            display: inline-block; 
            margin-top: 35px; 
            text-decoration: none; 
            color: #8d6e63; 
            font-weight: 700; 
            border-bottom: 2px solid #d4af37; 
            transition: 0.3s;
        }
        .btn-back:hover { color: #d4af37; }
    </style>
</head>
<body>
    <div class="container">
        <?php
        // Index sayfasından gelen 'q' parametresini (yer adını) alıyoruz
        $q = $_GET['q'] ?? '';

        if ($q) {
            // Wikipedia API'den veri çekme (CURL kullanarak en güvenli yol)
            $url = "https://tr.wikipedia.org/api/rest_v1/page/summary/" . urlencode($q);
            
            $ch = curl_init();
            curl_setopt($ch, CURLOPT_URL, $url);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            curl_setopt($ch, CURLOPT_USERAGENT, 'ArchaeoTechBot/1.0');
            $res = curl_exec($ch);
            curl_close($ch);
            
            $data = json_decode($res, true);

            // Eğer Wikipedia'da bu başlık varsa
            if (isset($data['title'])) {
                // 1. ESER ADI
                echo "<h2>🏛️ " . $data['title'] . "</h2>";
                
                // 2. ESER RESMİ
                if (isset($data['originalimage']['source'])) {
                    echo "<img src='" . $data['originalimage']['source'] . "' class='eser-img' alt='" . $data['title'] . "'>";
                }
                
                // 3. ESER BİLGİSİ
                echo "<div class='bilgi'>" . ($data['extract'] ?? 'Bu yer hakkında detaylı bilgi yüklenemedi.') . "</div>";
                
                // 4. CANLI HARİTA (Google Maps)
                echo "<h3>📍 Haritadaki Konumu</h3>";
                echo "<div class='map-box'>";
                // Wikipedia başlığını haritada aratıyoruz
                $map_url = "http://googleusercontent.com/maps.google.com/9" . urlencode($data['title'] . " Türkiye") . "&t=&z=14&ie=UTF8&iwloc=&output=embed";
                echo "<iframe width='100%' height='400' frameborder='0' src='$map_url' allowfullscreen></iframe>";
                echo "</div>";

            } else {
                echo "<h2>🔍 Veri Alınamadı</h2>";
                echo "<p>Seçtiğiniz yer hakkında bilgi çekilirken Wikipedia tarafında bir sorun oluştu. Lütfen tekrar deneyin.</p>";
            }
        } else {
            echo "<h2>⚠️ Hata</h2><p>Lütfen ana sayfadan bir tarihi yer seçin.</p>";
        }
        ?>
        <a href="index.php" class="btn-back">← Yeni Bir Keşif Başlat</a>
    </div>
</body>
</html>
