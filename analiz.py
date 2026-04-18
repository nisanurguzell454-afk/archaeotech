import sys
import wikipedia
import warnings

# Wikipedia'daki gereksiz uyarıları ve HTML parser hatalarını gizler
warnings.filterwarnings("ignore")

# Wikipedia dilini Türkçe olarak sabitle
wikipedia.set_lang("tr")

def analiz_et():
    # PHP'den gelen eser adını alıyoruz
    if len(sys.argv) > 1:
        # sys.argv[1] genellikle boş veya dummy olur, asıl veri 2. veya 3. sırada gelebilir 
        # Garantiye almak için tüm argümanları birleştiriyoruz
        arama_terimi = " ".join(sys.argv[1:]).strip()
        
        if not arama_terimi:
            print("<div class='error-card'>⚠️ Eser adı alınamadı.</div>")
            return

        try:
            # Wikipedia'da sayfayı bul
            # auto_suggest=True sayesinde küçük harf hatalarını kendi düzeltir
            sayfa = wikipedia.page(arama_terimi, auto_suggest=True)
            
            # Başlık ve Özet (İlk 6 cümleyi alıyoruz, boğucu olmasın)
            baslik = sayfa.title
            ozet = ". ".join(sayfa.summary.split('.')[:6]) + "."
            
            # PHP'ye gidecek HTML çıktısını hazırlıyoruz
            print(f"<div class='result-container'>")
            print(f"<h2>🏛️ {baslik}</h2>")
            
            # Wikipedia'daki ana resmi çekmeye çalışıyoruz
            if sayfa.images:
                # Genellikle ilk resim en alakalı olandır
                print(f"<img src='{sayfa.images[0]}' class='eser-img' alt='{baslik}'>")
            
            print(f"<div class='bilgi'>{ozet}</div>")
            
            # CANLI HARİTA BÖLÜMÜ (Invalid Request hatasını bitiren format)
            print(f"<div class='map-box'>")
            print(f"<div class='map-title'>📍 {baslik} - Harita Konumu</div>")
            map_url = f"https://maps.google.com/maps?q={baslik.replace(' ', '+')}&t=&z=14&ie=UTF8&iwloc=&output=embed"
            print(f"<iframe width='100%' height='400' frameborder='0' style='border:0;' src='{map_url}' allowfullscreen></iframe>")
            print(f"</div>")
            
            print(f"</div>")

        except wikipedia.exceptions.DisambiguationError as e:
            print(f"<div class='error-card'>🔍 Birden fazla sonuç bulundu. Lütfen daha spesifik yazın. (Örn: {e.options[0]})</div>")
        except wikipedia.exceptions.PageError:
            print(f"<div class='error-card'>🔍 '{arama_terimi}' hakkında Wikipedia'da kayıt bulunamadı.</div>")
        except Exception as e:
            print(f"<div class='error-card'>⚠️ Bir hata oluştu: Lütfen internet bağlantısını kontrol edin.</div>")
    else:
        print("<div class='error-card'>⚠️ Geçersiz istek: Eser adı eksik.</div>")

if __name__ == "__main__":
    analiz_et()
