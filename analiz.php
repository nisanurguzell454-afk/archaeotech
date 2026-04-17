<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

echo "<html><head><link rel='stylesheet' href='style.css'></head><body style='background:#f4ece1; padding:20px; text-align:center;'>";

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_FILES['eser_resmi'])) {
    
    $eser_adi = $_POST['eser_adi'] ?? 'Adsız';
    $donem = $_POST['donem'] ?? 'Bilinmiyor';
    $resimler_klasoru = 'resimler/';

    if (!file_exists($resimler_klasoru)) { mkdir($resimler_klasoru, 0777, true); }

    $dosya_adi = time() . '_' . basename($_FILES['eser_resmi']['name']);
    $hedef_yol = $resimler_klasoru . $dosya_adi;

    if (move_uploaded_file($_FILES['eser_resmi']['tmp_name'], $hedef_yol)) {
        
        // Python'ı çalıştırıyoruz
        $komut = "python3 analiz.py " . escapeshellarg($hedef_yol) . " " . escapeshellarg($eser_adi) . " " . escapeshellarg($donem) . " 2>&1";
        $python_cikti = shell_exec($komut);

        echo "<div class='card' style='max-width:800px; margin:auto;'>";
        echo "<h2 style='color:#5d4037;'>🏛️ DİJİTAL ENVANTER RAPORU</h2>";
        echo "<hr style='border:1px solid #d7ccc8;'>";
        
        // Python'dan gelen bilgiyi altın rengi bir kutuda gösteriyoruz
        echo "<div style='background:#fdf5e6; border-left:5px solid #d4af37; padding:15px; margin:20px 0; text-align:left; font-style:italic;'>";
        echo $python_cikti;
        echo "</div>";

        echo "<img src='$hedef_yol' style='max-width:100%; border:10px solid white; box-shadow:0 10px 30px rgba(0,0,0,0.2);'>";
        echo "<br><br><a href='index.php' class='btn-analiz' style='text-decoration:none; display:inline-block;'>Yeni Kayıt Ekle</a>";
        echo "</div>";

    } else { echo "<div style='color:red;'>HATA: Resim yüklenemedi!</div>"; }
}
echo "</body></html>";
?>
