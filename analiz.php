<!DOCTYPE html>
<html lang="tr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ArchaeoTech | Sonuçlar</title>
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@700&family=Montserrat:wght@400;700&display=swap" rel="stylesheet">
    <style>
        * { box-sizing: border-box; margin: 0; padding: 0; }
        body { font-family: 'Montserrat', sans-serif; background: #fdfaf5; display: flex; justify-content: center; padding: 20px; color: #3e2723; }
        .container { max-width: 650px; width: 100%; background: white; padding: 35px; border-radius: 25px; box-shadow: 0 10px 30px rgba(0,0,0,0.1); border-top: 8px solid #d4af37; text-align: center; }
        h2 { font-family: 'Playfair Display', serif; color: #5d4037; font-size: 2rem; margin-bottom: 20px; }
        .eser-img { width: 100%; border-radius: 15px; margin-bottom: 25px; box-shadow: 0 5px 15px rgba(0,0,0,0.1); }
        .bilgi { line-height: 1.8; text-align: justify; color: #444; font-size: 1.05rem; }
        .map-box { margin-top: 35px; border-radius: 15px; overflow: hidden; border: 1px solid #eee; }
        .btn-back { display: inline-block; margin-top: 30px; text-decoration: none; color: #8d6e63; font-weight: 700; border-bottom: 2px solid #d4af37; }
    </style>
</head>
<body>
    <div class="container">
        <?php
        $q = $_GET['q'] ?? '';
        if ($q) {
            // 1. ADIM: Wikipedia Arama Motorunu kullan (En yakın başlığı bulur)
            $search_url = "https://tr.wikipedia.org/w/api.php?action=query&list=search&srsearch=" . urlencode($q) . "&format=json";
            $search_res = file_get_contents($search_url);
            $search_data = json_decode($search_res, true);

            if (!empty($search_data['query']['search'])) {
                // En iyi eşleşen başlığı al
                $best_title = $search_data['query']['search'][0]['title'];
                
                // 2. ADIM: Bu başlığın özetini ve resmini getir
                $url = "https://tr.wikipedia.org/api/rest_v1/page/summary/" . urlencode($best_title);
                $ch = curl_init();
                curl_setopt($ch, CURLOPT_URL, $url);
                curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
                curl_setopt($ch, CURLOPT_USERAGENT, 'ArchaeoTechBot/1.0');
                $res = curl_exec($ch); curl_close($ch);
                $data = json_decode($res, true);

                echo "<h2>🏛️ " . $data['title'] . "</h2>";
                
                if (isset($data['originalimage']['source'])) {
                    echo "<img src='" . $data['originalimage']['source'] . "' class='eser-img'>";
                }
                
                echo "<div class='bilgi'>" . ($data['extract'] ?? 'Bilgi bulunamadı.') . "</div>";
                
                // Hatasız Harita
                echo "<div class='map-box'>";
                echo "<iframe width='100%' height='350' frameborder='0' src='https://www.google.com/maps/search/" . urlencode($data['title']) . "&t=&z=14&ie=UTF8&iwloc=&output=embed'></iframe>";
                echo "</div>";
            } else {
                echo "<h2>🔍 Üzgünüz...</h2>";
                echo "<p>Aradığınız yer hakkında bilgiye ulaşılamadı. Lütfen başka bir yer deneyin.</p>";
            }
        }
        ?>
        <a href="index.php" class="btn-back">← Geri Dön</a>
    </div>
</body>
</html>
