<!DOCTYPE html>
<html lang="tr">
<head>
    <meta charset="UTF-8">
    <title>ArchaeoTech | Detaylar</title>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;700&display=swap" rel="stylesheet">
    <style>
        body { font-family: 'Montserrat', sans-serif; background: #fdfaf5; padding: 20px; display: flex; justify-content: center; }
        .container { max-width: 750px; width: 100%; background: white; padding: 35px; border-radius: 25px; box-shadow: 0 10px 30px rgba(0,0,0,0.1); border-top: 10px solid #d4af37; text-align: center; }
        .bilgi { text-align: justify; line-height: 1.8; color: #333; margin: 20px 0; font-size: 1.05rem; }
        .map-box { border-radius: 20px; overflow: hidden; border: 2px solid #eee; margin-top: 20px; }
        .btn-back { display: inline-block; margin-top: 20px; text-decoration: none; color: #8d6e63; font-weight: 700; border-bottom: 2px solid #d4af37; }
    </style>
</head>
<body>
    <div class="container">
        <?php
        $q = $_GET['q'] ?? '';
        if ($q) {
            // 1. ADIM: Wikipedia'da arama yapıyoruz ve en geniş metni (extracts) istiyoruz
            $api_url = "https://tr.wikipedia.org/w/api.php?action=query&prop=extracts|pageimages&exintro&explaintext&titles=" . urlencode($q) . "&format=json&pithumbsize=1000&redirects=1";
            
            $ch = curl_init();
            curl_setopt($ch, CURLOPT_URL, $api_url);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            curl_setopt($ch, CURLOPT_USERAGENT, 'Mozilla/5.0');
            $res = curl_exec($ch);
            curl_close($ch);
            
            $data = json_decode($res, true);
            $pages = $data['query']['pages'];
            $page = reset($pages); // Gelen ilk sayfayı al

            if (isset($page['title']) && !isset($page['missing'])) {
                echo "<h2>🏛️ " . $page['title'] . "</h2>";
                
                // Resim varsa göster
                if (isset($page['thumbnail']['source'])) {
                    echo "<img src='" . $page['thumbnail']['source'] . "' style='width:100%; border-radius:15px; margin:20px 0;'>";
                }
                
                // Uzun Metni Göster
                echo "<div class='bilgi'>" . ($page['extract'] ?? 'Detaylı bilgi bulunamadı.') . "</div>";
                
                // Harita
                echo "<h3>📍 Haritadaki Konumu</h3>";
                echo "<div class='map-box'>";
                $map_url = "https://maps.google.com/maps?q=" . urlencode($page['title'] . " Türkiye") . "&t=&z=14&ie=UTF8&iwloc=&output=embed";
                echo "<iframe width='100%' height='400' frameborder='0' src='$map_url'></iframe>";
                echo "</div>";
            } else {
                echo "<h2>🔍 Sonuç Bulunamadı</h2><p>Wikipedia bu başlıkta bir veri döndüremedi.</p>";
            }
        }
        ?>
        <a href="index.php" class="btn-back">← Geri Dön</a>
    </div>
</body>
</html>
