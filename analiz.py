import sys
import wikipedia
import requests

# Wikipedia dilini Türkçe yap ve uyarıları kapat
wikipedia.set_lang("tr")
import warnings
warnings.filterwarnings("ignore")

if len(sys.argv) > 2:
    eser_adi = sys.argv[2]
    try:
        # Wikipedia'da ara
        sayfa = wikipedia.page(eser_adi, auto_suggest=True)
        # Özet bilgiyi al (Uyarısız, temiz)
        bilgi_metni = sayfa.summary
        if len(bilgi_metni) > 1000:
            bilgi_metni = bilgi_metni[:1000] + "..."

        # Canlı Google Haritası URL'si oluşturma (Arama terimine göre)
        google_maps_embed_url = f"https://www.google.com/maps/embed/v1/search?key=YOUR_ACTUAL_GOOGLE_MAPS_API_KEY&q={sayfa.title.replace(' ', '+')}"
        # NOT: Jüride tam çalışması için gerçek bir API anahtarı gerekebilir.
        # Şimdilik tarayıcıların iframe içinde google maps'i göstermesine güveniyoruz.
        # Eğer API anahtarın yoksa, tarayıcıda doğrudan açılan bir link daha garanti olabilir.
        # Alternatif (Link): f"https://www.google.com/maps/search/{sayfa.title.replace(' ', '+')}"

        # PHP'ye HTML formatında raporu gönder
        print(f"<div class='rapor-konteyner'>")
        print(f"<h2>🏛️ {sayfa.title}</h2>")
        print(f"<p class='bilgi-metni'>{bilgi_metni}</p>")
        print(f"<div class='kaynak'>Kaynak: Wikipedia | <a href='{sayfa.url}' target='_blank'>Devamını Oku</a></div>")
        
        # HARİTA BÖLÜMÜ (Burada Google Maps Embedded kullanıyoruz)
        print(f"<div class='harita-bolumu'>")
        print(f"<h3>📍 Konum ve Coğrafi Bilgi</h3>")
        # Iframe ile canlı harita gösterimi
        print(f"<iframe width='100%' height='300' frameborder='0' style='border:0; border-radius:10px;' src='https://maps.google.com/maps?q={sayfa.title.replace(' ', '+')}&t=&z=13&ie=UTF8&iwloc=&output=embed' allowfullscreen></iframe>")
        # Eğer üstteki iframe Render'da engellenirse, jüride şu linki kullanabilirsin:
        # print(f"<a href='https://www.google.com/maps/search/{sayfa.title.replace(' ', '+')}' target='_blank' class='btn-harita'>Google Haritalar'da Canlı Gör</a>")
        print(f"</div>")
        
        print(f"</div>")
    except:
        print(f"<div class='hata-mesaji'>🔍 '{eser_adi}' hakkında detaylı kayıt bulunamadı. Lütfen ismin tam ve doğru yazıldığından emin olun (Örn: Çifte Minareli Medrese).</div>")
else:
    print("Veri hatası.")
