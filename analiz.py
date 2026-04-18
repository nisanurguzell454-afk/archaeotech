import sys
import wikipedia
import warnings

# Wikipedia hatalarını ve uyarılarını gizle
warnings.filterwarnings("ignore")
wikipedia.set_lang("tr")

if len(sys.argv) > 2:
    eser_adi = sys.argv[2]
    try:
        # Wikipedia'da arama yap
        sayfa = wikipedia.page(eser_adi, auto_suggest=True)
        # Sadece ilk 5 cümleyi al (Ferah bir görünüm için)
        ozet = ". ".join(sayfa.summary.split('.')[:5]) + "."
        
        # Google Haritalar Embed URL (Canlı Harita)
        map_url = f"https://maps.google.com/maps?q={sayfa.title.replace(' ', '%20')}&t=&z=14&ie=UTF8&iwloc=&output=embed"

        print(f"<div class='result-card'>")
        print(f"<h2>🏛️ {sayfa.title}</h2>")
        print(f"<div class='info-text'>{ozet}</div>")
        print(f"<div class='map-container'>")
        print(f"<h3>📍 Eserin Konumu</h3>")
        print(f"<iframe width='100%' height='300' frameborder='0' style='border-radius:15px;' src='{map_url}' allowfullscreen></iframe>")
        print(f"</div>")
        print(f"<div class='footer-links'>Kaynak: Wikipedia | <a href='{sayfa.url}' target='_blank'>Devamı</a></div>")
        print(f"</div>")
    except:
        print(f"<div class='error-card'>🔍 '{eser_adi}' hakkında detaylı bilgi bulunamadı. Lütfen tam adını kontrol edin.</div>")
