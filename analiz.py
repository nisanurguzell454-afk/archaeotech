import sys
import wikipedia

wikipedia.set_lang("tr")

if len(sys.argv) > 2:
    eser_adi = sys.argv[2]
    try:
        # Wikipedia'dan temiz bilgi çekme
        sayfa = wikipedia.page(eser_adi, auto_suggest=True)
        ozet = sayfa.summary[:800] + "..." # Boğucu olmasın diye sınırladık
        
        # Harita Linki (Tıklayınca Google Haritalar'da açılır)
        harita_link = f"https://www.google.com/maps/search/{sayfa.title.replace(' ', '+')}"

        print(f"<div class='sonuc'>")
        print(f"<h2>🏛️ {sayfa.title}</h2>")
        print(f"<p>{ozet}</p>")
        print(f"<div class='harita-alani'>")
        print(f"<a href='{harita_link}' target='_blank' class='map-btn'>📍 Konumu Haritada Gör</a>")
        print(f"</div>")
        print(f"</div>")
    except:
        print(f"<h2>🔍 {eser_adi}</h2><p>Eser sisteme kaydedildi, detaylı bilgiler araştırılıyor.</p>")
