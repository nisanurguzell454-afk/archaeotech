<!DOCTYPE html>
<html lang="tr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ArchaeoTech | Analiz Raporu</title>
    <link rel="stylesheet" href="style.css">
</head>
<body class="result-body">
    <div class="main-wrapper">
        <header>
            <h1>ARCHAEOTECH</h1>
        </header>

        <div class="content">
            <?php
            if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                $eser_adi = $_POST['eser_adi'] ?? 'Bilinmiyor';
                $komut = "python3 analiz.py '' " . escapeshellarg($eser_adi) . " '' 2>&1";
                $cikti = shell_exec($komut);
                echo $cikti;
            }
            ?>
            <br>
            <a href="index.php" class="btn-geri">← Yeni Arama Yap</a>
        </div>

        <footer>
            <strong>Nisa Nur Güzel</strong><br>
            Atatürk Üniversitesi © 2026
        </footer>
    </div>
</body>
</html>
