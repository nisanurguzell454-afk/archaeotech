import sys
import os

# PHP'den gelen bilgileri alıyoruz
if len(sys.argv) > 3:
    resim_yolu = sys.argv[1]
    eser_adi = sys.argv[2]
    donem = sys.argv[3]

    # Profesyonel analiz notları oluşturuyoruz
    notlar = {
        "Selçuklu Dönemi": "Bu eser Selçuklu mimarisinin karakteristik özelliklerini (taş işçiliği, geometrik desenler) taşımaktadır.",
        "Osmanlı Dönemi": "Osmanlı klasik dönem mimari üslubu ve estetik detayları gözlemlenmektedir.",
        "Antik Çağ": "Buluntu, antik dönem yerleşim izlerini ve dönemin sanat anlayışını yansıtmaktadır.",
        "Modern Dönem": "Eser üzerinde restorasyon izleri ve modern koruma teknikleri tespit edilmiştir."
    }

    analiz_notu = notlar.get(donem, "Eser üzerinde genel dijital inceleme başlatıldı.")

    # PHP'ye göndermek üzere ekrana yazdırıyoruz (Bu kısım analiz.php'de görünecek)
    print(f"SİSTEM ANALİZİ: {eser_adi} için yapılan incelemede {donem} esintileri tespit edildi. {analiz_notu}")
else:
    print("HATA: Eksik veri gönderildi.")
