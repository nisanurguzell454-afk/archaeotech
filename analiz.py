import sys
import wikipedia

wikipedia.set_lang("tr")

if len(sys.argv) > 2:
    eser_adi = sys.argv[2]
    try:
        # Wikipedia sayfasını detaylı çek
        sayfa = wikipedia.page(eser_adi, auto_suggest=True)
        ozet = ". ".join(sayfa.summary.split('.')[:5]) + "." # İlk 5 cümle
        
        # Orijinal Resim ve Harita URL'leri
        resim_url = sayfa.images[0] if sayfa.images else ""
        harita_url = f"https://www.google.com/maps?q={sayfa.title.replace(' ', '+')}&output=embed"

        print(f"<div class='result-container'>")
        print(f"<h2>🏛️ {sayfa.title}</h2>")
        
        # Eğer resim varsa göster
        if resim_url:
            print(f"<img src='{resim_url}' class='eser-resmi' alt='{sayfa.title}'>")
        
        print(f"<div class='info-text'>{ozet}</div>")
        
        # Canlı Harita Alanı
        print(f"<div class='map-section'>")
        print(f"<h3>📍 Harita Üzerindeki Konumu</h3>")
        print(f"<iframe width='100%' height='300' frameborder='0' src='{harita_url}' style='border-radius:15px;'></iframe>")
        print(f"</div>")
        
        print(f"<br><a href='index.php' class='btn-back'>← Yeni Arama Yap</a>")
        print(f"</div>")

    except:
        print(f"<div class='result-container'><h3>🔍 Bilgi Bulunamadı</h3>")
        print(f"<p>'{eser_adi}' hakkında spesifik bir kayıt bulunamadı. Lütfen tam adını yazmayı deneyin.</p></div>")
