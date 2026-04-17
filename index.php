<!DOCTYPE html>
<html lang="tr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ArchaeoTech | Dijital Arkeoloji ve Analiz Sistemi</title>
    <link rel="stylesheet" href="style.css">
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@700&family=Roboto:wght@300;400&display=swap" rel="stylesheet">
</head>
<body>

<header>
    <div class="header-content">
        <h1>ARCHAEOTECH</h1>
        <p>Nisa Nur Güzel | Dijital Arkeoloji Veri Analiz Terminali</p>
    </div>
</header>

<div class="container">
    <div class="card">
        <h3>Envanter Kayıt ve Dijital Analiz</h3>
        <p>Sisteme yeni bir arkeolojik buluntu yükleyin. Python analiz motoru, yüklediğiniz görseli otomatik olarak işleyecek ve arşiv numarası atayacaktır.</p>
        
        <form action="analiz.php" method="post" enctype="multipart/form-data">
            <div class="form-group">
                <label for="eser_resmi">Eser Görseli Seçin:</label>
                <input type="file" name="eser_resmi" id="eser_resmi" required>
            </div>

            <div class="form-group">
                <input type="text" name="eser_adi" placeholder="Eserin Adı (Örn: Çifte Minareli Medrese Detayı)" required>
            </div>

            <div class="form-group">
                <select name="donem" required>
                    <option value="" disabled selected>Tarihi Dönem Seçiniz</option>
                    <option value="Antik Çağ">Antik Çağ</option>
                    <option value="Selçuklu Dönemi">Selçuklu Dönemi</option>
                    <option value="Osmanlı Dönemi">Osmanlı Dönemi</option>
                    <option value="Modern Dönem">Modern Dönem / Restorasyon</option>
                </select>
            </div>

            <button type="submit" class="btn-analiz">Sisteme İşle ve Arşivle</button>
        </form>
    </div>

    <div class="galeri-baslik">
        <hr>
        <span>Son Analiz Edilen Bulgular</span>
        <hr>
    </div>

    <div class="archive-info">
        <p style="text-align: center; color: #8d6e63; font-style: italic;">
            Sistem şu an yeni veri girişine hazırdır. Analiz motoru (Python 3.x) arka planda aktif.
        </p>
    </div>
</div>

<footer>
    <p>&copy; 2026 ArchaeoTech Projesi - Atatürk Üniversitesi Bilgisayar Programcılığı Mezuniyet Çalışması</p>
</footer>

</body>
</html>