<!DOCTYPE html>
<html lang="tr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ArchaeoTech | Analiz Sonucu</title>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;700&family=Playfair+Display:wght@700&display=swap" rel="stylesheet">
    <style>
        /* TASARIM KAYMASINI ÖNLEYEN VE ŞIKLAŞTIRAN STİLLER */
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
            border-top: 8px solid #d4af37; 
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
            font-size: 1.05rem; 
            margin-bottom: 30px;
        }
        .map-box { 
            margin-top: 40px; 
            border-radius: 20px; 
            overflow: hidden; 
            border: 1px solid #eee;
            background: #f9f9f9;
        }
        .map-title {
            padding: 15px;
            background: #f1ede4;
            color: #5d4037;
            font-weight: bold;
            text-align: left;
            font-size: 0.9rem;
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
        // Arama terimini al (q parametresi index.php'den geliyor)
        $q = $_GET['q'] ?? ($_POST['eser_adi'] ?? '');

        if ($q) {
            // Wikipedia API'den veri çekme
            $url = "https://tr.wikipedia.org/api/rest_v1/page/summary/" . urlencode($q);
            $ch = curl_init();
            curl_setopt($ch, CURLOPT_URL, $url);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            curl_setopt($ch, CURLOPT_USERAGENT, 'ArchaeoTechBot/1.0');
            $res = curl_exec($ch);
            curl_close($ch);
            
            $data = json_decode($res, true);

            if (isset($data['title']) && $data['title'] != "Not found.") {
                // ESER ADI
                echo "<h2>🏛️ " . $data['title'] . "</h2>";
                
                // ESER RESMİ (Eğer Wikipedia'da varsa)
                if (isset($data['originalimage']['source'])) {
                    echo "<img src='" . $data['originalimage']['source'] . "' class='eser-img' alt='" . $data['title'] . "'>";
                }
                
                // ESER BİLGİSİ
                echo "<div class='bilgi'>" . $data['extract'] . "</div>";
                
                // CANLI HARİTA (Hatasız q parametreli sürüm)
                echo "<div class='map-box'>";
                echo "<div class='map-title'>📍 Harita Üzerinde Konum</div>";
                echo "<iframe 
                        width='100%' 
                        height='400' 
                        frameborder='0' 
                        style='border:0;' 
                        src='https://maps.google.com/maps?q=" . urlencode($data['title']) . "&t=&z=14&ie=UTF8&iwloc=&output=embed' 
                        allowfullscreen>
                      </iframe>";
                echo "</div>";

            } else {
                echo "<h2>🔍 Sonuç Bulunamadı</h2>";
                echo "<p>Aradığınız yer hakkında bilgiye ulaşılamadı. Lütfen ismin doğruluğunu kontrol edin (Örn: Efes Antik Kenti).</p>";
            }
        } else {
            echo "<h2>⚠️ Hata</h2><p>Lütfen bir eser adı girerek aramayı başlatın.</p>";
        }
        ?>
        <a href="index.php" class="btn-back">← Yeni Bir Keşif Başlat</a>
    </div>
</body>
</html>
