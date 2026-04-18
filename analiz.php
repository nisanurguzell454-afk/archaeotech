import sys
import wikipedia

wikipedia.set_lang("tr")

if len(sys.argv) > 2:
    eser_adi = sys.argv[2]
    try:
        # Wikipedia'da ara
        sayfa = wikipedia.page(eser_adi, auto_suggest=True)
        # Bilgileri hazırla
        ozet = sayfa.summary.split('.')[:4] # İlk 4 cümleyi al
        bilgi_metni = ". ".join(ozet) + "."
        harita_link = f"https://www.google.com/maps/search/{sayfa.title.replace(' ', '+')}"
        
        # PHP'ye HTML formatında gönder
        print(f"<div class='sonuc-kart'>")
        print(f"<h2>🏛️ {sayfa.title}</h2>")
        print(f"<div class='bilgi-metni'>{bilgi_metni}</div>")
        print(f"<a href='{harita_link}' target='_blank' class='btn-harita'>📍 Haritada Konumunu Gör</a>")
        print(f"<div class='kaynak'>Kaynak: Wikipedia | <a href='{sayfa.url}' target='_blank'>Devamını Oku</a></div>")
        print(f"</div>")
    except:
        print(f"<div class='hata-mesaji'>🔍 '{eser_adi}' hakkında detaylı bilgi bulunamadı. Lütfen tam adını yazmayı deneyin.</div>")
else:
    print("Veri hatası.")
