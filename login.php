<!DOCTYPE html>
<html lang="tr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>GİRİŞ</title>
    <link rel="stylesheet" href="style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <header class="text-center p-4 bg-dark text-white">
        <h1>GİRİŞ</h1>

    </header>

    <main class="container mt-4">
        <a href="index.php">ANA SAYFA</a>

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