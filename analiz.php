<!DOCTYPE html>
<html lang="tr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ArchaeoTech | Sonuç</title>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;700&display=swap" rel="stylesheet">
    <style>
        body { font-family: 'Montserrat', sans-serif; background: #fdfaf5; padding: 20px; display: flex; justify-content: center; }
        .container { max-width: 600px; width: 100%; background: white; padding: 30px; border-radius: 20px; box-shadow: 0 10px 30px rgba(0,0,0,0.1); border-top: 5px solid #d4af37; }
        h2 { color: #5d4037; border-bottom: 2px solid #f0f0f0; padding-bottom: 10px; }
        .bilgi { line-height: 1.8; text-align: justify; margin: 20px 0; color: #444; }
        .harita { border-radius: 15px; overflow: hidden; margin-top: 20px; border: 1px solid #ddd; }
        .btn-geri { display: inline-block; margin-top: 20px; text-decoration: none; color: #8d6e63; font-weight: bold; }
    </style>
</head>
<body>
    <div class="container">
        <?php
        $sorgu = $_GET['q'] ?? '';
        if ($sorgu) {
            // Wikipedia API'den canlı bilgi çekme
            $url = "https://tr.wikipedia.org/api/rest_v1/page/summary/" . urlencode($sorgu);
            $ch = curl_init();
            curl_setopt($ch, CURLOPT_URL, $url);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            curl_setopt($ch, CURLOPT_USERAGENT, 'ArchaeoTechProject/1.0');
            $response = curl_exec($ch);
            curl_close($ch);
            
            $data = json_decode($response, true);

            if (isset($data['title']) && $data['title'] != "Not found.") {
                echo "<h2>🏛️ " . $data['title'] . "</h2>";
                
                if (isset($data['originalimage']['source'])) {
                    echo "<img src='" . $data['originalimage']['source'] . "' style='width:100%; border-radius:15px; margin-bottom:20px;'>";
                }
                
                echo "<div class='bilgi'>" . $data['extract'] . "</div>";
                
                // Canlı Harita
                echo "<div class='harita'>";
                echo "<h3>📍 Konum</h3>";
                echo "<iframe width='100%' height='300' frameborder='0' src='https://maps.google.com/maps?q=" . urlencode($data['title']) . "&t=&z=13&ie=UTF8&iwloc=&output=embed'></iframe>";
                echo "</div>";
            } else {
                echo "<h2>🔍 Sonuç Bulunamadı</h2>";
                echo "<p>Lütfen eser ismini doğru yazdığınızdan emin olun (Örn: 'Sümela Manastırı' yerine 'Sümela').</p>";
            }
        }
        ?>
        <a href="index.php" class="btn-geri">← Yeni Arama</a>
    </div>
</body>
</html>
