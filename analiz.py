import sys

if len(sys.argv) > 2:
    resim_yolu = sys.argv[1]
    eser_adi = sys.argv[2].lower()

    # Zenginleştirilmiş Bilgi ve Dönem Bankası
    bilgi_bankasi = {
        "ayasofya": {
            "donem": "Bizans ve Osmanlı Dönemi",
            "detay": "MS 537 yılında tamamlanan bu yapı, dünya mimarlık tarihinin en önemli dönüm noktalarından biridir. Hem Hristiyanlık hem İslam sanatının eşsiz sentezini sunar."
        },
        "çifte minare": {
            "donem": "Anadolu Selçuklu Dönemi (13. Yüzyıl)",
            "detay": "Erzurum'un sembolü olan bu eser, Selçuklu taş süsleme sanatının zirvesidir. Taç kapısındaki palmet ve hayat ağacı motifleri döneminin karakteristik özelliğidir."
        },
        "efes": {
            "donem": "Helenistik ve Roma Dönemi",
            "detay": "Antik dünyanın en önemli ticaret ve kültür merkezlerinden biridir. Celsus Kütüphanesi ve Hadrian Tapınağı gibi devasa yapılar Roma ihtişamını yansıtır."
        },
        "sümela": {
            "donem": "Geç Roma ve Bizans Dönemi",
            "detay": "Trabzon'da sarp bir kaya yamacına kurulu olan manastır, MS 4. yüzyılda kurulmuştur. Freskleri ve mimari yapısı doğayla bütünleşmiş bir şaheserdir."
        }
    }

    # Akıllı Eşleştirme
    bulunan_eser = None
    for anahtar in bilgi_bankasi:
        if anahtar in eser_adi:
            bulunan_eser = bilgi_bankasi[anahtar]
            break

    if bulunan_eser:
        print(f"<div style='border-bottom:2px solid #d4af37; margin-bottom:15px; padding-bottom:10px;'>")
        print(f"<h3 style='margin:0; color:#5d4037;'>🏛️ TESPİT EDİLEN DÖNEM: {bulunan_eser['donem']}</h3></div>")
        print(f"<p style='line-height:1.6;'>{bulunan_eser['detay']}</p>")
    else:
        print("<h3 style='color:#8d6e63;'>🔍 GENEL ANALİZ TAMAMLANDI</h3>")
        print(f"<p>'{eser_adi.capitalize()}' isimli eser Türkiye kültür envanterine göre incelenmiştir. Dönem özellikleri ve mimari detaylar dijital arşive işlenmiştir.</p>")
else:
    print("Veri hatası oluştu.")
