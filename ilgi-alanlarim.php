<!DOCTYPE html>
<html lang="tr">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>İlgi Alanlarım</title>
  <link rel="stylesheet" href="style.css">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
  <header class="text-center p-4 bg-dark text-white">
    <h1>İlgi Alanlarım</h1>
    <p>Bu web sitesinde kendimi ve memleketimi tanıtıyorum.</p>
  </header>

  <main class="container mt-4">
  <a href="index.php">ANA SAYFA</a>
  <a href="cv.php">CV</a>

    <?php
$url = "https://www.scorebat.com/video-api/v3/";
$response = file_get_contents($url);

$data = json_decode($response, true);

echo "<h1>Tuttuğum futbol takımının son maçlarının özetleri:</h1>";

if (isset($data['response'])) {
    $maclar = $data['response'];

    foreach ($maclar as $mac) {
        if (strpos($mac['title'], 'Galatasaray') !== false) {
            $title = $mac['title'];
            $tarih = date("d.m.Y H:i", strtotime($mac['date']));
            $competition = $mac['competition'];
            $embed = $mac['videos'][0]['embed'];

            echo "<hr>";
            echo "<h3>$title</h3>";
            echo "<p><strong>Tarih:</strong> $tarih</p>";
            echo "<p><strong>Lig:</strong> $competition</p>";
            echo "<div>$embed</div>";
        }
    }
} else {
    echo "Veri alınamadı.";
}
?>
  </main>

  <footer class="text-center bg-light p-3 mt-4">
    <p>© 2025 - Ömer Faruk Kaymas tarafından hazırlandı</p>
  </footer>
</body>
</html>