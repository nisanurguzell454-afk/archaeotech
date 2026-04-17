<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

echo "<html><head><link rel='stylesheet' href='style.css'></head><body style='background:#f4ece1; text-align:center; padding:20px;'>";

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $eser_adi = $_POST['eser_adi'] ?? 'Adsiz';
    $donem = $_POST['donem'] ?? 'Bilinmiyor';
    $target_file = "resimler/" . time() . "_" . basename($_FILES["eser_resmi"]["name"]);

    if (move_uploaded_file($_FILES["eser_resmi"]["tmp_name"], $target_file)) {
        // Python'ı çalıştır
        $komut = "python3 analiz.py " . escapeshellarg($target_file) . " " . escapeshellarg($eser_adi) . " " . escapeshellarg($donem) . " 2>&1";
        $cikti = shell_exec($komut);

        echo "<div class='card' style='max-width:600px; margin:auto; padding:20px;'>";
        echo "<h2>🏛️ ARKEOLOJİK RAPOR</h2>";
        echo "<div style='background:#fffde7; padding:15px; border:1px solid #fbc02d; margin-bottom:20px;'>";
        echo "<strong>Sistem Notu:</strong> " . $cikti;
        echo "</div>";
        echo "<img src='$target_file' style='width:100%; border-radius:5px;'>";
        echo "<br><br><a href='index.php' class='btn-analiz'>Yeni Kayıt</a>";
        echo "</div>";
    }
}
echo "</body></html>";
?>
