import sys

# PHP'den gelen verileri al
if len(sys.argv) > 3:
    eser_adi = sys.argv[2].lower()
    donem = sys.argv[3]

    # Bilgi havuzu
    bilgi_bankasi = {
        "ayasofya": "İstanbul'daki Ayasofya, dünya mimarlık tarihinin en önemli eserlerinden biridir. Bizans ve Osmanlı izlerini taşır.",
        "çifte minare": "Erzurum'un sembolü olan bu yapı, Selçuklu taş işçiliğinin zirve noktasıdır.",
        "efes": "İzmir'deki Efes antik kenti, Roma döneminin en görkemli yerleşim birimidir."
    }

    # Arama yap
    cevap = "Genel Analiz: Bu eser " + donem + " donemine ait onemli bir mirastir."
    for anahtar in bilgi_bankasi:
        if anahtar in eser_adi:
            cevap = bilgi_bankasi[anahtar]
            break
    
    print(cevap)
else:
    print("Veri eksik.")
