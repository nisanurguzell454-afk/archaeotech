<!DOCTYPE html>
<html lang="tr">
<head>
    <meta charset="UTF-8">
    <title>ArchaeoTech | Detaylar</title>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;700&display=swap" rel="stylesheet">
    <style>
        body { font-family: 'Montserrat', sans-serif; background: #fdfaf5; padding: 20px; display: flex; justify-content: center; }
        .container { max-width: 800px; width: 100%; background: white; padding: 35px; border-radius: 25px; box-shadow: 0 10px 30px rgba(0,0,0,0.1); border-top: 10px solid #d4af37; text-align: center; }
        .bilgi { text-align: justify; line-height: 1.8; color: #333; margin: 25px 0; font-size: 1.1rem; }
        .map-box { border-radius: 20px; overflow: hidden; border: 2px solid #eee; margin-top: 30px; }
        .btn-back { display: inline-block; margin-top: 25px; text-decoration: none; color: #8d6e63; font-weight: 700; border-bottom: 2px solid #d4af37; }
        h2 { color: #5d4037; font-size: 2.2rem; }
    </style>
</head>
<body>
    <div class="container">
        <?php
        $q = $_GET['q'] ?? '';
        if ($q) {
            // 1. ADIM: Wikipedia'da en yakın başlığı bulmak için arama yapıyoruz
            $search_url = "https://tr.wikipedia.org/w/api.php?action=query&list=search&srsearch=" . urlencode($q) . "&format=json";
            $ch_search = curl_init();
            curl_setopt($ch_search, CURLOPT_URL, $search_url);
            curl_setopt($ch_search, CURLOPT_RETURNTRANSFER, true);
            curl_setopt($ch_search, CURLOPT_USERAGENT, 'ArchaeoTechBot/1.0');
            $search_res = curl_exec($ch_search);
            curl_close($ch_search);
            $search_data = json_decode($search_res, true);

            if (!empty($search_data['query']['search'])) {
                // Wikipedia'nın bulduğu ilk (en doğru) başlığı alıyoruz
                $best_title = $search_data['query']['search'][0]['title'];

                // 2. ADIM: Bu başlığın tam içeriğini çekiyoruz
                $api_url = "https://tr.wikipedia.org/w/api.php?action=query&prop=extracts|pageimages&exintro&explaintext&titles=" . urlencode($best_title) . "&format=json&pithumbsize=1000&redirects=1";
                
                $ch = curl_init();
                curl_setopt($ch, CURLOPT_URL, $api_url);
                curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
                curl_setopt($ch, CURLOPT_USERAGENT, 'Mozilla/5.0');
                $res = curl_exec($ch);
                curl_close($ch);
                
                $data = json_decode($res, true);
                $pages = $data['query']['pages'];
                $page = reset($pages);

                if (isset($page['title'])) {
                    echo "<h2>🏛️ " . $page['title'] . "</h2>";
                    
                    if (isset($page['thumbnail']['source'])) {
                        echo "<img src='" . $page['thumbnail']['source'] . "' style='width:100%; border-radius:15px; margin:20px 0; box-shadow: 0 5px 15px rgba(0,0,0,0.1);'>";
                    }
                    
                    echo "<div class='bilgi'>" . ($page['extract'] ?? 'Detaylı bilgi bulunamadı.') . "</div>";
                    
                    echo "<h3>📍 Haritadaki Konumu</h3>";
                    echo "<div class='map-box'>";
                    $map_url = "http://googleusercontent.com/maps.google.com/7" . urlencode($page['title'] . " Türkiye") . "&t=&z=14&ie=UTF8&iwloc=&output=embed";
                    echo "<iframe width='100%' height='400' frameborder='0' src='$map_url'></iframe>";
                    echo "</div>";
                }
            } else {
                echo "<h2>🔍 Sonuç Bulunamadı</h2><p>Lütfen listeden geçerli bir yer seçin.</p>";
            }
        }
        ?>
        <a href="index.php" class="btn-back">← Yeni Bir Keşif Yap</a>
    </div>
</body>
</html>
