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
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/js/bootstrap.bundle.min.js" integrity="sha384-j1CDi7MgGQ12Z7Qab0qlWQ/Qqz24Gc6BM0thvEMVjHnfYGF0rmFCozFSxQBxwHKO" crossorigin="anonymous"></script>
</head>

<body>
  <header class="baslik">
  <nav class="navbar navbar-expand-lg bg-body-tertiary">
  <div class="container-fluid">
    <a class="navbar-brand" href="index.html"><img src="images/favicon.ico" alt="Ö Logo"></a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link" aria-current="page" href="index.html"><i class="fa-solid fa-house"></i> Ana Sayfa</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="cv.html"><i class="fa-solid fa-circle-user"></i> CV Sayfası</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="ilgi-alanlarim.php"><i class="fa-solid fa-location-dot"></i> İlgi Alanlarım</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="sehrim.html"><i class="fa-solid fa-city"></i> Şehrim</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="takimimiz.html"><i class="fa-solid fa-futbol"></i> Takımımız</a>
        </li>
        <li class="nav-item">
          <a class="nav-link active" href="iletisim.php"><i class="fa-solid fa-phone"></i> İletişim</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="login.php"><i class="fa-solid fa-right-to-bracket"></i> Giriş</a>
        </li>
      </ul>
    </div>
  </div>
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
