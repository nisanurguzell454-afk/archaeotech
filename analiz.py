# ANALİZ.PY İÇİNDEKİ HARİTA KODU
print(f"<div class='map-section'>")
print(f"<h3>📍 Eserin Haritadaki Konumu</h3>")
# En sağlam Google Maps Embed formatı budur:
map_url = f"https://www.google.com/maps/embed/v1/place?key=BURAYA_VARSA_API_KEY_YOKSA_DIREKT_URL&q={sayfa.title.replace(' ', '+')}"
# API Key olmadan en hızlı çalışan yöntem:
print(f"<iframe width='100%' height='350' frameborder='0' style='border:0; border-radius:15px; box-shadow: 0 5px 15px rgba(0,0,0,0.1);' src='https://maps.google.com/maps?q={sayfa.title.replace(' ', '+')}&t=&z=13&ie=UTF8&iwloc=&output=embed' allowfullscreen></iframe>")
print(f"</div>")
