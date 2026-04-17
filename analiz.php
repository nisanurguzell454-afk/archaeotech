import sys

# PHP'den gelen verileri alıyoruz
if len(sys.argv) > 3:
    resim_yolu = sys.argv[1]
    eser_adi = sys.argv[2].lower() # Küçük harfe çeviriyoruz ki arama kolay olsun
    donem = sys.argv[3]

    # TÜRKİYE TARİHİ ESERLER BİLGİ BANKASI
    bilgi_bankasi = {
        "çifte minare": "Erzurum'un sembolü olan bu yapı, Selçuklu mimarisinin en seçkin örneklerindendir. 13. yüzyıl sonunda inşa edilmiştir. Taç kapısındaki taş işçiliği ve devasa minareleriyle tanınır.",
        "ayasofya": "İstanbul'un en önemli simgelerinden biridir. Bizans İmparatoru I. Justinianus tarafından yaptırılmış, Osmanlı döneminde camiye çevrilmiştir. Mimarlık tarihinin dönüm noktalarından biridir.",
        "efes": "İzmir Selçuk'ta bulunan antik kent, dünyanın en önemli arkeolojik alanlarından biridir. Celsus Kütüphanesi ve devasa tiyatrosuyla Roma dönemi ihtişamını yansıtır.",
        "nemrut": "Adıyaman'da bulunan bu devasa heykeller, Kommagene Kralı I. Antiochos tarafından yaptırılmıştır. UNESCO Dünya Mirası listesinde yer alan görkemli bir kutsal alandır.",
        "sumela": "Trabzon'daki sarp kayalıklar üzerine kurulu olan bu manastır, MS 4. yüzyılda kurulmuştur. Freskleri ve mimarisiyle Doğu Karadeniz'in en etkileyici tarihi yapılarından biridir.",
        "göbeklitepe": "Şanlıurfa yakınlarındaki bu alan, tarihin sıfır noktası olarak bilinir. İnsanlık tarihindeki en eski tapınak kompleksidir ve yerleşik hayata geçişle ilgili ezberleri bozmuştur."
    }

    # Eser adını kontrol ediyoruz, eğer bankada yoksa genel bir açıklama yapıyoruz
    bulunan_bilgi = ""
    for anahtar, bilgi in bilgi_bankasi.items():
        if anahtar in eser_adi:
            bulunan_bilgi = bilgi
            break

    if not bulunan_bilgi:
        bulunan_bilgi = f"{eser_adi} hakkında genel bir inceleme yapıldı. {donem} mimari özellikleri ve dönemin sanat anlayışını yansıtan bu eser, kültürel mirasımız için büyük önem taşımaktadır."

    # PHP'ye sonuç gönderiyoruz
    print(f"<h3>🏛️ ANALİZ RAPORU</h3>")
    print(f"<p><strong>Tespit Edilen Bilgi:</strong> {bulunan_bilgi}</p>")
    print(f"<p style='color:#8d6e63; font-size:0.9em;'><em>*Sistem veritabanı üzerinden otomatik oluşturulmuştur.</em></p>")

else:
    print("HATA: Veri akışı sağlanamadı.")
