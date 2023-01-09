<!DOCTYPE html>
<?php
$title = "🐙 Fractal-Drawer 🐙";
?>
<html lang="ja">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title><?php echo $title; ?></title>
  <link rel="stylesheet" href="style.css">
</head>
<body>
  <main>
    <h1><?php echo $title; ?></h1>
    <h2>🐬 マンデルブロ集合 🐬</h2>
    <iframe src="/canvas/mandelbrot"></iframe>
    <h2>🐍 ジュリア集合 🐍</h2>
    <iframe src="/canvas/julia"></iframe>
  </main>
</body>
</html>
