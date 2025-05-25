<!DOCTYPE html>
<html lang="tr">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>İletişim Sonucu</title>
  <link rel="icon" href="images/favicon.ico" type="image/x-icon">
  <link rel="stylesheet" href="style.css" />
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" />
</head>

<body>
  <header class="baslik">
    <nav class="navbar">
      <ul>
        <li><a href="index.html"><i class="fa-solid fa-house"></i> Anasayfa</a></li>
        <li><a href="cv.html"><i class="fa-solid fa-circle-user"></i> CV Sayfası</a></li>
        <li><a href="ilgi-alanlarim.php"><i class="fa-solid fa-location-dot"></i> İlgi Alanlarım</a></li>
        <li><a href="sehrim.html"><i class="fa-solid fa-city"></i> Şehrim</a></li>
        <li><a href="takimimiz.html"><i class="fa-solid fa-futbol"></i> Takımımız</a></li>
        <li><a href="iletisim.php"><i class="fa-solid fa-phone"></i> İletişim</a></li>
        <li><a href="login.php"><i class="fa-solid fa-right-to-bracket"></i> Giriş</a></li>
      </ul>
    </nav> <br>

    <h1>İletişim Formu Gönderildi</h1>
  </header>

  <main class="container mt-4">
    <div>
      <div>
        <h3>Gönderilen Bilgiler</h3>
        <br>
        
        <?php
        function veriYaz($etiket, $deger) {
            echo "<p><strong>$etiket:</strong> " . htmlspecialchars($deger) . "</p>";
        }

        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            veriYaz("Ad Soyad", $_POST["ad"] ?? "-");
            veriYaz("E-posta", $_POST["email"] ?? "-");
            veriYaz("Telefon", $_POST["telefon"] ?? "-");
            veriYaz("Cinsiyet", $_POST["cinsiyet"] ?? "-");
            veriYaz("Şehir", $_POST["sehir"] ?? "-");
            veriYaz("Mesaj", nl2br(htmlspecialchars($_POST["mesaj"] ?? "-")));
        } else {
            echo "<p class='text-danger'>Form verisi bulunamadı.</p>";
        }
        ?>

        <a href="iletisim.php" class="btn btn-outline-primary mt-3">Geri Dön</a>
      </div>
    </div>
  </main>

  <footer class="text-center bg-light p-3 mt-4">
    <p>© 2025 - Ömer Faruk Kaymas tarafından hazırlandı</p>
  </footer>
</body>

</html>
