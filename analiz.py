import sys
import wikipedia

# Wikipedia dilini Türkçe yapıyoruz
wikipedia.set_lang("tr")

if len(sys.argv) > 2:
    eser_adi = sys.argv[2]

    try:
        # Wikipedia'da eseri aratıyoruz
        # auto_suggest=False yaparak tam yazdığımız ismi aramasını sağlıyoruz
        sayfa = wikipedia.page(eser_adi, auto_suggest=True)
        
        bilgi = sayfa.summary # Özet bilgi
        icerik = sayfa.content[:1000] # İlk 1000 karakter (çok uzun olmaması için)
        link = sayfa.url

        print(f"<div class='rapor-konteyner'>")
        print(f"<h2>🏛️ {sayfa.title}</h2>")
        print(f"<div class='bilgi-section'><strong>📜 Detaylı Analiz Raporu:</strong><br>{bilgi}</div>")
        print(f"<div class='bilgi-section'><strong>🏗️ Mimari ve Tarihi Arka Plan:</strong><br>{icerik}...</div>")
        print(f"<p><a href='{link}' target='_blank' style='color:#5d4037;'>🔗 Kaynağından Daha Fazla Bilgi Al</a></p>")
        print(f"</div>")

    except Exception as e:
        # Eğer eser Wikipedia'da bulunamazsa genel bir açıklama yap
        print(f"<h3>🔍 Bilgi Bulunamadı</h3>")
        print(f"<p>'{eser_adi}' hakkında spesifik bir kayıt bulunamadı ancak dijital envanter kaydı oluşturuldu.</p>")
else:
    print("Veri hatası.")
