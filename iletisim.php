<!DOCTYPE html>
<html lang="tr">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>İletişim</title>
  <link rel="stylesheet" href="style.css" />
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" />
  <script src="https://unpkg.com/vue@3"></script>
</head>

<body>
  <header class="baslik">
    <nav class="navbar">
      <ul>
        <li><a href="index.php"><i class="fa-solid fa-house"></i> Anasayfa</a></li>
        <li><a href="cv.html"><i class="fa-solid fa-circle-user"></i> CV Sayfası</a></li>
        <li><a href="ilgi-alanlarim.php"><i class="fa-solid fa-location-dot"></i> İlgi Alanlarım</a></li>
        <li><a href="sehrim.html"><i class="fa-solid fa-city"></i> Şehrim</a></li>
        <li><a href="takimimiz.html"><i class="fa-solid fa-futbol"></i> Takımımız</a></li>
        <li><a href="iletisim.php"><i class="fa-solid fa-phone"></i> İletişim</a></li>
        <li><a href="login.php"><i class="fa-solid fa-right-to-bracket"></i> Giriş</a></li>
      </ul>
    </nav> <br>
    
    <h1>İletişim</h1>
  </header>

  <main class="container mt-4">
    <div id="app">
      <form id="iletisimForm" action="iletisim-sonuc.php" method="POST" target="_blank">
        <div class="mb-3">
          <label class="form-label">Ad Soyad</label>
          <input type="text" class="form-control" v-model="ad" name="ad" />
        </div>

        <div class="mb-3">
          <label class="form-label">E-posta</label>
          <input type="text" class="form-control" v-model="email" name="email" />
        </div>

        <div class="mb-3">
          <label class="form-label">Telefon</label>
          <input type="text" class="form-control" v-model="telefon" name="telefon" />
        </div>

        <div class="mb-3">
          <label class="form-label">Cinsiyet</label><br />
          <div class="form-check form-check-inline">
            <input class="form-check-input" type="radio" name="cinsiyet" value="Erkek" v-model="cinsiyet" />
            <label class="form-check-label">Erkek</label>
          </div>
          <div class="form-check form-check-inline">
            <input class="form-check-input" type="radio" name="cinsiyet" value="Kadın" v-model="cinsiyet" />
            <label class="form-check-label">Kadın</label>
          </div>
        </div>

        <div class="mb-3">
          <label class="form-label">Şehir</label>
          <select class="form-select" v-model="sehir" name="sehir">
            <option value="">Seçiniz</option>
            <option value="Sakarya">Sakarya</option>
            <option value="İstanbul">İstanbul</option>
            <option value="Ankara">Ankara</option>
            <option value="Diğer">Diğer</option>
          </select>
        </div>

        <div class="mb-3">
          <label class="form-label">Mesaj</label>
          <textarea class="form-control" rows="4" v-model="mesaj" name="mesaj"></textarea>
        </div>

        <div class="d-flex gap-2">
          <button type="button" class="btn btn-warning" @click="jsKontrol">JS ile Doğrula</button>
          <button type="button" class="btn btn-info" @click="vueKontrol">Vue.js ile Doğrula</button>
          <button type="submit" class="btn btn-primary">Gönder</button>
          <button type="reset" class="btn btn-secondary">Temizle</button>
        </div>

        <p class="mt-3 text-danger">{{ hata }}</p>
      </form>
    </div>
  </main>

  <footer class="text-center bg-light p-3 mt-4">
    <p>© 2025 - Ömer Faruk Kaymas tarafından hazırlandı</p>
  </footer>

  <script>
  const { createApp } = Vue;

  createApp({
    data() {
      return {
        ad: "",
        email: "",
        telefon: "",
        cinsiyet: "",
        sehir: "",
        mesaj: "",
        hata: "",
        jsBasarili: false,
        vueBasarili: false
      };
    },
    methods: {
      jsKontrol() {
        this.hata = "";
        const telRegex = /^[0-9]+$/;
        if (
          this.ad === "" ||
          this.email === "" ||
          this.telefon === "" ||
          this.cinsiyet === "" ||
          this.sehir === "" ||
          this.mesaj === ""
        ) {
          this.hata = "Lütfen tüm alanları doldurun.";
          this.jsBasarili = false;
        } else if (!this.email.includes("@")) {
          this.hata = "Geçersiz e-posta adresi.";
          this.jsBasarili = false;
        } else if (!telRegex.test(this.telefon)) {
          this.hata = "Telefon sadece rakamlardan oluşmalıdır.";
          this.jsBasarili = false;
        } else {
          alert("JS ile doğrulama başarılı!");
          this.jsBasarili = true;
        }
      },

      vueKontrol() {
        this.hata = "";
        const telRegex = /^[0-9]{10,15}$/;
        if (!this.ad || !this.email || !this.telefon || !this.cinsiyet || !this.sehir || !this.mesaj) {
          this.hata = "Vue.js: Lütfen tüm alanları doldurun.";
          this.vueBasarili = false;
        } else if (!/^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(this.email)) {
          this.hata = "Vue.js: Geçersiz e-posta adresi.";
          this.vueBasarili = false;
        } else if (!telRegex.test(this.telefon)) {
          this.hata = "Vue.js: Telefon numarası sadece rakamlardan oluşmalı ve 10-15 hane olmalı.";
          this.vueBasarili = false;
        } else {
          alert("Vue.js ile doğrulama başarılı!");
          this.vueBasarili = true;
        }
      },

      formGonder(e) {
        if (!this.jsBasarili || !this.vueBasarili) {
          e.preventDefault();
          this.hata = "Formu göndermek için her iki doğrulamanın da başarılı olması gerekiyor.";
        }
      }
    },
    mounted() {
      document.getElementById("iletisimForm").addEventListener("submit", this.formGonder);
    }
  }).mount("#app");
</script>
</body>

</html>