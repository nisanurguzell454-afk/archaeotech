<!DOCTYPE html>
<html lang="tr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ArchaeoTech | Sonuç ve Konum</title>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;700&display=swap" rel="stylesheet">
    <style>
        * { box-sizing: border-box; margin: 0; padding: 0; }
        body { font-family: 'Montserrat', sans-serif; background: #fdfaf5; padding: 20px; display: flex; justify-content: center; color: #3e2723; }
        .container { max-width: 650px; width: 100%; background: white; padding: 30px; border-radius: 25px; box-shadow: 0 10px 30px rgba(0,0,0,0.1); border-top: 8px solid #d4af37; text-align: center; }
        h2 { color: #5d4037; margin-bottom: 15px; font-size: 1.8rem; }
        .eser-img { width: 100%; border-radius: 15px; margin-bottom: 20px; box-shadow: 0 5px 15px rgba(0,0,0,0.1); }
        .bilgi { text-align: justify; line-height: 1.8; margin-bottom: 25px; color: #444; }
        
        /* HARİTA ALANI */
        .map-container { 
            margin-top: 25px; 
            border-radius: 20px; 
            overflow: hidden; 
            border: 2px solid #eee;
            background: #f9f9f9;
        }
        iframe { width: 100%; height: 400px; border: 0; }
        
        .btn-map-link {
            display: inline-block;
            margin-top: 10px;
            padding: 10px 20px;
            background: #4285F4;
            color: white;
            text-decoration: none;
            border-radius: 8px;
            font-size: 0.9rem;
            font-weight: bold;
        }

        .btn-back { display: inline-block; margin-top: 30px; text-decoration: none; color: #8d6e63; font-weight: 700; border-bottom: 2px solid #d4af37; }
    </style>
</head>
<body>
    <div class="container">
        <?php
        $q = $_GET['q'] ?? '';
        if ($q) {
            // Wikipedia'dan Veri Çekme
            $url = "https://tr.wikipedia.org/api/rest_v1/page/summary/" . urlencode($q);
            $ch = curl_init();
            curl_setopt($ch, CURLOPT_URL, $url);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            curl_setopt($ch, CURLOPT_USERAGENT, 'ArchaeoTech/1.0');
            $res = curl_exec($ch);
            curl_close($ch);
            $data = json_decode($res, true);

            if (isset($data['title'])) {
                echo "<h2>🏛️ " . $data['title'] . "</h2>";
                
                if (isset($data['originalimage']['source'])) {
                    echo "<img src='" . $data['originalimage']['source'] . "' class='eser-img'>";
                }
                
                echo "<div class='bilgi'>" . ($data['extract'] ?? 'Bilgi bulunamadı.') . "</div>";
                
                // GÜNCELLENMİŞ VE HATASIZ HARİTA BAĞLANTISI
                echo "<h3>📍 Konum ve Ulaşım</h3>";
                echo "<div class='map-container'>";
                // Google Maps resmi Embed URL formatı kullanıldı
                $map_url = "https://maps.google.com/maps?q=" . urlencode($data['title'] . " Türkiye") . "&t=&z=13&ie=UTF8&iwloc=&output=embed";
                echo "<iframe src='$map_url'></iframe>";
                echo "</div>";
                
                // Harita açılmazsa diye alternatif buton
                $direct_map_link = "https://www.google.com/maps/search/" . urlencode($data['title']);
                echo "<a href='$direct_map_link' target='_blank' class='btn-map-link'>🌐 Google Haritalar'da Tam Ekran Aç</a>";
                
            } else {
                echo "<h2>🔍 Hata</h2><p>Veri alınırken bir sorun oluştu.</p>";
            }
        }
        ?>
        <br>
        <a href="index.php" class="btn-back">← Başka Bir Yer Seç</a>
    </div>
</body>
</html>
