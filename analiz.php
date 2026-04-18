<!DOCTYPE html>
<html lang="tr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ArchaeoTech | Sonuçlar</title>
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@700&family=Montserrat:wght@400;700&display=swap" rel="stylesheet">
    <style>
        body { font-family: 'Montserrat', sans-serif; background: #fdfaf5; margin: 0; padding: 20px; display: flex; justify-content: center; }
        .container { max-width: 650px; width: 100%; background: white; padding: 35px; border-radius: 25px; box-shadow: 0 10px 30px rgba(0,0,0,0.1); border-top: 8px solid #d4af37; }
        h2 { font-family: 'Playfair Display', serif; color: #5d4037; font-size: 2rem; margin-bottom: 20px; }
        .eser-img { width: 100%; border-radius: 15px; margin-bottom: 25px; box-shadow: 0 5px 15px rgba(0,0,0,0.1); }
        .bilgi { line-height: 1.8; text-align: justify; color: #444; font-size: 1.05rem; }
        .map-box { margin-top: 35px; border-radius: 15px; overflow: hidden; border: 1px solid #eee; }
        .btn-geri { display: inline-block; margin-top: 30px; text-decoration: none; color: #8d6e63; font-weight: 700; border-bottom: 2px solid #d4af37; }
    </style>
</head>
<body>
    <div class="container">
        <?php
        $q = $_GET['q'] ?? '';
        if ($q) {
            // Wikipedia API Bağlantısı
            $url = "https://tr.wikipedia.org/api/rest_v1/page/summary/" . urlencode($q);
            $ch = curl_init();
            curl_setopt($ch, CURLOPT_URL, $url);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            curl_setopt($ch, CURLOPT_USERAGENT, 'ArchaeoTechBot/1.0');
            $res = curl_exec($ch);
            curl_close($ch);
            $data = json_decode($res, true);

            if (isset($data['title']) && $data['title'] != "Not found.") {
                echo "<h2>🏛️ " . $data['title'] . "</h2>";
                
                // Eğer Wikipedia'da resim varsa göster
                if (isset($data['originalimage']['source'])) {
                    echo "<img src='" . $data['originalimage']['source'] . "' class='eser-img'>";
                }
                
                echo "<div class='bilgi'>" . $data['extract'] . "</div>";
                
                // Canlı Harita Bölümü
                echo "<div class='map-box'>";
                echo "<h3 style='padding:15px; margin:0; background:#f9f9f9; font-size:1rem;'>📍 Konum Bilgisi</h3>";
                echo "<iframe width='100%' height='350' frameborder='0' src='https://maps.google.com/maps?q=" . urlencode($data['title']) . "&t=&z=14&ie=UTF8&iwloc=&output=embed'></iframe>";
                echo "</div>";
            } else {
                echo "<h2>🔍 Sonuç Bulunamadı</h2>";
                echo "<p>Aradığınız yer hakkında bilgiye ulaşılamadı. Lütfen tam adını yazmayı deneyin.</p>";
            }
        }
        ?>
        <a href="index.php" class="btn-geri">← Başka Bir Yer Keşfet</a>
    </div>
</body>
</html>
