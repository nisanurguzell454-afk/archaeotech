<?php
// 1. HATA RAPORLAMAYI ZİRVEYE ÇIKAR
error_reporting(E_ALL);
ini_set('display_errors', 1);

// 2. ÇALIŞTIĞINI KANITLA (Ekranda bunu görmeliyiz)
echo "<div style='background:orange; padding:20px;'>PHP Dosyası Başarıyla Tetiklendi!</div>";

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Klasör oluşturma zorlaması
    if (!file_exists("resimler")) {
        mkdir("resimler", 0777, true);
    }

    if (isset($_FILES["eser_resmi"])) {
        $target_file = "resimler/" . time() . "_" . basename($_FILES["eser_resmi"]["name"]);
        
        if (move_uploaded_file($_FILES["eser_resmi"]["tmp_name"], $target_file)) {
            echo "<h3>Resim Yüklendi: $target_file</h3>";
            
            // Python denemesi
            $komut = "python3 analiz.py " . escapeshellarg($target_file) . " 'Test' 'Antik' 2>&1";
            $cikti = shell_exec($komut);
            echo "<h4>Python Çıktısı:</h4><pre>$cikti</pre>";
            echo "<img src='$target_file' width='300'>";
        } else {
            echo "HATA: Resim taşınamadı. Geçici dizin: " . $_FILES["eser_resmi"]["tmp_name"];
        }
    } else {
        echo "HATA: Resim dosyası forma gelmedi!";
    }
} else {
    echo "Bu sayfaya direkt erişemezsiniz, lütfen formdan gelin.";
}
?>
