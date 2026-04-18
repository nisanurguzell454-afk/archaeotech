<!DOCTYPE html>
<html lang="tr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ArchaeoTech | Detaylar</title>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;700&family=Playfair+Display:wght@700&display=swap" rel="stylesheet">
    <style>
        body { font-family: 'Montserrat', sans-serif; background: #fdfaf5; display: flex; justify-content: center; padding: 20px; }
        .container { max-width: 750px; width: 100%; background: white; padding: 35px; border-radius: 25px; box-shadow: 0 10px 30px rgba(0,0,0,0.1); border-top: 10px solid #d4af37; text-align: center; }
        h2 { font-family: 'Playfair Display', serif; color: #5d4037; font-size: 2rem; margin-bottom: 20px; }
        .eser-img { width: 100%; border-radius: 15px; margin-bottom: 20px; box-shadow: 0 5px 15px rgba(0,0,0,0.1); }
        .bilgi { text-align: justify; line-height: 1.8; color: #333; margin-bottom: 30px; font-size: 1.05rem; white-space: pre-wrap; }
        .map-box { border-radius: 20px; overflow: hidden; border: 2px solid #eee; margin-top: 20px; }
        .btn-back { display: inline-block; margin-top: 30px; text-decoration: none; color: #8d6e63; font-weight: 700; border-bottom: 2px solid #d4af37; }
    </style>
</head>
<body>
    <div class="container">
        <?php
        $q = $_GET['q'] ?? '';
        if ($q) {
            // Wikipedia özet servisini kullanıyoruz (Uzun metin için extract parametresi ile)
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
                // Açıklama metnini basıyoruz
                echo "<div class='bilgi'>" . ($data['extract'] ?? 'Bilgi çekilemedi.') . "</div>";
                
                // Konum Gösterimi
                echo "<h3>📍 Konum Bilgisi</h3>";
                echo "<div class='map-box'>";
                $map_q = urlencode($data['title'] . " Türkiye");
                echo "<iframe width='100%' height='400' frameborder='0' src='https://maps.google.com/maps?q=$map_q&t=&z=14&ie=UTF8&iwloc=&output=embed'></iframe>";
                echo "</div>";
            } else {
                echo "<h2>🔍 Hata</h2><p>Aradığınız yer bulunamadı.</p>";
            }
        }
        ?>
        <a href="index.php" class="btn-back">← Geri Dön</a>
    </div>
</body>
</html>
