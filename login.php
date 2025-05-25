<!DOCTYPE html>
<html lang="tr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Giriş</title>
    <link rel="icon" href="images/favicon.ico" type="image/x-icon">
    <link rel="stylesheet" href="style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" />
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

        <h1>GİRİŞ</h1>
    </header>

    <main class="container mt-4">

        <?php
        $giris = false;
        $hata = "";
        if(isset($_POST["email"]) && isset($_POST["sifre"])) {
            if(filter_var( $_POST["email"], FILTER_VALIDATE_EMAIL)) {
                $kullanici_adi = explode('@', $_POST["email"])[0];
            if($_POST["sifre"] == $kullanici_adi) {
                echo "giriş başarılı, hoş geldin: " .$kullanici_adi;
        $giris = true;

            }
            else  {
                $hata = "giriş başarısız, hatalı bilgi"; 
            }
            }
            else {
                $hata = "geçersiz email adresi!";
            }
        }

        if(!empty($hata)) {
            echo "<b class='text-danger'>".$hata."</b>";
        }
        if(!$giris ) {
        ?>
        <form action="login.php" method="post">
            <input name="email" type="email" class="form-control" placeholder="Email adresi" required>
            <input name="sifre" type="password" class="form-control" placeholder="Şifre" required>
            <button class="btn btn-primary">Giriş yap</button>
        </form>
        <?php } ?>

    </main>

    <footer class="text-center bg-light p-3 mt-4">
        <p>© 2025 - Ömer Faruk Kaymas tarafından hazırlandı</p>
    </footer>
</body>

</html>