import sys
import wikipedia

wikipedia.set_lang("tr")

if len(sys.argv) > 2:
    eser_adi = sys.argv[2]
    try:
        sayfa = wikipedia.page(eser_adi, auto_suggest=True)
        # Google Haritalar Linki Oluşturma
        map_url = f"https://www.google.com/maps/search/?api=1&query={sayfa.title.replace(' ', '+')}"
        
        print(f"<div class='result-container'>")
        print(f"<h2>🏛️ {sayfa.title}</h2>")
        
        # Harita Butonu
        print(f"<div class='map-box'><a href='{map_url}' target='_blank' class='btn-map'>📍 Haritada Görüntüle</a></div>")
        
        # Daha ferah metin düzeni (İlk 3 paragrafı alıyoruz)
        ozet = sayfa.summary.split('.')[:5] # İlk 5 cümleyi al
        print(f"<div class='content-text'>{''.join(ozet)}.</div>")
        
        print(f"<div class='footer-info'>Kaynak: Wikipedia | <a href='{sayfa.url}' target='_blank'>Tamamını Oku</a></div>")
        print(f"</div>")

    except:
        print(f"<div class='error'>'{eser_adi}' hakkında spesifik bir bilgi bulunamadı. Lütfen ismi kontrol edin.</div>")
