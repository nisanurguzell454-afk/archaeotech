import sys
import wikipedia
import requests

wikipedia.set_lang("tr")

if len(sys.argv) > 2:
    eser_adi = sys.argv[2]
    try:
        # Wikipedia sayfasını detaylı çek
        sayfa = wikipedia.page(eser_adi, auto_suggest=True)
        # Orijinal metni al (Uyarısız, temiz)
        ozet = sayfa.summary
        
        # Orijinal Resim ve Harita URL'leri
        # Wikipedia'daki ilk resmi ana görsel olarak alıyoruz
        resim_url = sayfa.images[0] if sayfa.images else ""
        google_maps_embed_url = f"https://www.google.com/maps/embed/v1/place?key=YOUR_ACTUAL_GOOGLE_MAPS_API_KEY&q={sayfa.title.replace(' ', '+')}"
        
        # NOT: Gerçek bir API anahtarı olmadan Iframe tam çalışmayabilir.
        # Jüride garanti olması için iframe yerine doğrudan Google Maps linki de ekliyoruz.

        print(f"<div class='result-container'>")
        print(f"<h2>🏛️ {sayfa.title}</h2>")
        
        # Eğer resim varsa göster
        if resim_url:
            print(f"<img src='{resim_url}' class='eser-resmi' alt='{sayfa.title}'>")
        
        print(f"<div class='info-text'>{ozet}</div>")
        
        print(f"<div class='map-section'>")
        print(f"<h3>📍 Harita Üzerindeki Konumu</h3>")
        # Iframe ile canlı harita gösterimi (Engellenirse jüride linki kullan)
        print(f"<iframe width='100%' height='300' frameborder='0' style='border:0; border-radius:10px;' src='{google_maps_embed_url}' allowfullscreen></iframe>")
        # Eğer API anahtarın yoksa şu link daha garanti:
        print(f"<br><a href='{f'https://www.google.com/maps/search/{sayfa.title.replace(' ', '+')}'}' target='_blank' class='btn-harita'>Google Haritalar'da Canlı Gör</a>")
        print(f"</div>")
        
        print(f"</div>")

    except Exception as e:
        print(f"<div class='error-card'>🔍 '{eser_adi}' hakkında spesifik bir bilgi bulunamadı. Lütfen ismi tam ve doğru yazmayı deneyin.</div>")
else:
    print("Veri hatası.")
