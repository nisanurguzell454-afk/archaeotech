import sys

# PHP'den gelen verileri alıyoruz
if len(sys.argv) > 3:
    resim_yolu = sys.argv[1]
    eser_adi = sys.argv[2].lower()
    donem = sys.argv[3]

    # BİLGİ BANKASI
    bilgi_bankasi = {
        "çifte minare": "Erzurum'un sembolü olan bu yapı, Selçuklu mimarisinin en seçkin örneklerindendir. 13. yüzyıl sonunda inşa edilmiştir.",
        "ayasofya": "İstanbul'un simgesi Ayasofya, mimarlık tarihinin dönüm noktalarından biridir. Bizans döneminde kilise, Osmanlı'da cami olarak kullanılmıştır.",
        "efes": "İzmir Selçuk'taki bu antik kent, Roma döneminin en görkemli yerleşimlerinden biridir.",
        "nemrut": "Adıyaman'daki dev heykeller Kommagene Kralı I. Antiochos tarafından yaptırılmıştır.",
        "sumela": "Trabzon'daki sarp kayalıklar üzerine kurulu olan bu manastır, MS 4. yüzyılda inşa edilmiştir.",
        "göbeklitepe": "Şanlıurfa'daki bu alan, tarihin sıfır noktası olarak bilinen dünyanın en eski tapınağıdır."
    }

    bulunan_bilgi = ""
    for anahtar, bilgi in bilgi_bankasi.items():
        if anahtar in eser_adi:
            bulunan_bilgi = bilgi
            break

    if not bulunan_bilgi:
        bulunan_bilgi = f"{eser_adi.capitalize()}, {donem} mimari özelliklerini yansıtan kültürel mirasımız için büyük önem taşıyan bir eserdir."

    # PHP'ye temiz çıktı gönderiyoruz
    print(bulunan_bilgi)

else:
    print("HATA: Veri akışı sağlanamadı.")
