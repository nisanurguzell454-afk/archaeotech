<?php
// 1. Hataları görmek için en üstte olmalı
error_reporting(E_ALL);
ini_set('display_errors', 1);

echo "<html><head><link rel='stylesheet' href='style.css'></head><body style='background:#f4ece1; padding:50px; text-align:center;'>";

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_FILES['eser_resmi'])) {
    
    $eser_adi = $_POST['eser_adi'] ?? 'Adsız';
    $donem = $_POST['donem'] ?? 'Bilinmiyor';
    $resimler_klasoru = 'resimler/';

    // Klasör yoksa oluştur
    if (!file_exists($resimler_klasoru)) {
        mkdir($resimler_klasoru, 0777, true);
    }

    $dosya_adi = time() . '_' . basename($_FILES['eser_resmi']['name']);
    $hedef_yol = $resimler_klasoru . $dosya_adi;

    if (move_uploaded_file($_FILES['eser_resmi']['tmp_name'], $hedef_yol)) {
        
        // Python'ı çalıştır ve çıktısını yakala
        $komut = "python3 analiz.py " . escapeshellarg($hedef_yol) . " " . escapeshellarg($eser_adi) . " " . escapeshellarg($donem) . " 2>&1";
        $python_cikti = shell_exec($komut);

        echo "<div class='card'>";
        echo "<h2>🏛️ Analiz Sonucu</h2>";
        echo "<p><strong>Python Yanıtı:</strong> " . ($python_cikti ? $python_cikti : "Yanıt yok") . "</p>";
        echo "<img src='$hedef_yol' style='max-width:100%; border:10px solid white; box-shadow:0 10px 30px rgba(0,0,0,0.2);'>";
        echo "<br><br><a href='index.php' class='btn-analiz' style='text-decoration:none;'>Yeni Kayıt</a>";
        echo "</div>";

    } else {
        echo "<div style='color:red;'>HATA: Resim yüklenemedi!</div>";
    }

} else {
    echo "<div>Doğrudan erişim engellendi. Lütfen ana sayfadan form doldurun.</div>";
}

echo "</body></html>";
?>
