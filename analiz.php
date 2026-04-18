<!DOCTYPE html>
<html lang="tr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ArchaeoTech | Sonuç</title>
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@700&family=Montserrat:wght@400;700&display=swap" rel="stylesheet">
    <style>
        body { font-family: 'Montserrat', sans-serif; background: #fdfaf5; padding: 20px; display: flex; justify-content: center; }
        .container { max-width: 650px; width: 100%; background: white; padding: 35px; border-radius: 25px; box-shadow: 0 10px 30px rgba(0,0,0,0.1); border-top: 8px solid #d4af37; text-align: center;}
        h2 { font-family: 'Playfair Display', serif; color: #5d4037; font-size: 2rem; }
        .bilgi { line-height: 1.8; text-align: justify; margin: 25px 0; color: #444; }
        .map-box { margin-top: 30px; border-radius: 15px; overflow: hidden; border: 1px solid #eee; }
        .btn-back { display: inline-block; margin-top: 20px; text-decoration: none; color: #8d6e63; font-weight: bold; }
    </style>
</head>
<body>
    <div class="container">
        <?php
        $q = $_GET['q'] ?? '';
        if ($q) {
            $url = "https://tr.wikipedia.org/api/rest_v1/page/summary/" . urlencode($q);
            $ch = curl_init();
            curl_setopt($ch, CURLOPT_URL, $url);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            curl_setopt($ch, CURLOPT_USERAGENT, 'ArchaeoTechBot/1.0');
            $res = curl_exec($ch); curl_close($ch);
            $data = json_decode($res, true);

            if (isset($data['title']) && $data['title'] != "Not found.") {
                echo "<h2>🏛️ " . $data['title'] . "</h2>";
                if (isset($data['originalimage']['source'])) {
                    echo "<img src='" . $data['originalimage']['source'] . "' style='width:100%; border-radius:15px; margin:20px 0;'>";
                }
                echo "<div class='bilgi'>" . $data['extract'] . "</div>";
                echo "<div class='map-box'><h3>📍 Konum</h3>";
                echo "<iframe width='100%' height='350' frameborder='0' src='https://maps.google.com/maps?q=" . urlencode($data['title']) . "&t=&z=14&ie=UTF8&iwloc=&output=embed'></iframe></div>";
            } else {
                echo "<h2>🔍 Sonuç Bulunamadı</h2><p>Lütfen daha bilinen bir isimle deneyin.</p>";
            }
        }
        ?>
        <a href="index.php" class="btn-back">← Geri Dön</a>
    </div>
</body>
</html>
