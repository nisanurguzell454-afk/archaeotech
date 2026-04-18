<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
?>
<!DOCTYPE html>
<html lang="tr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ArchaeoTech | Analiz</title>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;700&display=swap" rel="stylesheet">
    <style>
        body { font-family: 'Montserrat', sans-serif; background: #fdfaf5; padding: 20px; display: flex; justify-content: center; }
        .container { max-width: 600px; width: 100%; background: white; padding: 30px; border-radius: 20px; box-shadow: 0 10px 30px rgba(0,0,0,0.1); border-top: 8px solid #d4af37; text-align: center; }
        .eser-img { width: 100%; border-radius: 15px; margin: 20px 0; }
        .bilgi { text-align: justify; line-height: 1.6; color: #444; }
        .map-box { margin-top: 20px; border-radius: 15px; overflow: hidden; border: 1px solid #ddd; }
        .btn-back { display: inline-block; margin-top: 20px; text-decoration: none; color: #8d6e63; font-weight: bold; border-bottom: 2px solid #d4af37; }
    </style>
</head>
<body>
    <div class="container">
        <?php
        $q = $_GET['q'] ?? '';
        if ($q) {
            // 1. ADIM: Wikipedia'da arama yap (Tam başlığı bulmak için)
            $search_url = "https://tr.wikipedia.org/w/api.php?action=query&list=search&srsearch=" . urlencode($q) . "&format=json";
            $search_res = file_get_contents($search_url);
            $search_data = json_decode($search_res, true);

            if (!empty($search_data['query']['search'])) {
                // Wikipedia'nın bulduğu en yakın başlığı alıyoruz
                $found_title = $search_data['query']['search'][0]['title'];
                
                // 2. ADIM: Bu başlığın özetini ve resmini getir
                $url = "https://tr.wikipedia.org/api/rest_v1/page/summary/" . urlencode($found_title);
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
                    
                    // Harita Kısmı
                    echo "<div class='map-box'>";
                    $map_q = urlencode($data['title'] . " Türkiye");
                    echo "<iframe width='100%' height='300' frameborder='0' src='https://maps.google.com/maps?q=$map_q&t=&z=13&ie=UTF8&iwloc=&output=embed'></iframe>";
                    echo "</div>";
                }
            } else {
                echo "<h2>🔍 Sonuç Bulunamadı</h2><p>Lütfen farklı bir yer seçin.</p>";
            }
        }
        ?>
        <a href="index.php" class="btn-back">← Geri Dön</a>
    </div>
</body>
</html>
