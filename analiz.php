<?php
// Hataları ekrana basması için bu 2 satır çok kritik!
error_reporting(E_ALL);
ini_set('display_errors', 1);

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $eser_adi = $_POST['eser_adi'] ?? 'Adsız Eser';
    $donem = $_POST['donem'] ?? 'Bilinmiyor';
    
    // Klasör kontrolü
    $target_dir = "resimler/";
    if (!file_exists($target_dir)) {
        mkdir($target_dir, 0777, true);
    }

    $filename = time() . "_" . basename($_FILES["eser_resmi"]["name"]);
    $target_file = $target_dir . $filename;

    if (move_uploaded_file($_FILES["eser_resmi"]["tmp_name"], $target_file)) {
        // Python'ı çalıştır ve hataları yakala (2>&1 hatayı PHP'ye yönlendirir)
        $komut = "python3 analiz.py " . escapeshellarg($target_file) . " " . escapeshellarg($eser_adi) . " " . escapeshellarg($donem) . " 2>&1";
        $cikti = shell_exec($komut);

        // Sonuç ekranı
        echo "<html><head><link rel='stylesheet' href='style.css'></head><body style='background:#f4ece1; text-align:center; padding:50px;'>";
        echo "<div class='card'>";
        echo "<h2>✅ Analiz Başarıyla Tamamlandı</h2>";
        echo "<p><strong>Sistem Çıktısı:</strong> $cikti</p>";
        echo "<img src='$target_file' style='max-width:100%; border:10px solid #fff; box-shadow:0 0 20px rgba(0,0,0,0.2);'><br><br>";
        echo "<a href='index.php' class='btn-analiz' style='text-decoration:none;'>Yeni Kayıt Ekle</a>";
        echo "</div></body></html>";
    } else {
        echo "HATA: Resim sunucuya yüklenemedi. Klasör izinlerini kontrol edin.";
    }
}
?>
