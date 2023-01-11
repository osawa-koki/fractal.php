<!DOCTYPE html>
<?php
$title = "🐙 Fractal-Drawer 🐙";
?>
<html lang="ja">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title><?php echo $title; ?></title>
  <link rel="stylesheet" href="style.css" />
  <link rel="shortcut icon" href="/favicon.ico" type="image/x-icon" />
</head>
<body>
  <main>
    <h1><?php echo $title; ?></h1>
    <?php
    $fractals = array(
      array(
        'emoji' => '🐬',
        'name' => 'マンデルブロ集合',
        'path' => '/canvas/mandelbrot',
      ),
      array(
        'emoji' => '🐍',
        'name' => 'ジュリア集合',
        'path' => '/canvas/julia',
      ),
      array(
        'emoji' => '🐋',
        'name' => 'トライコーン集合',
        'path' => '/canvas/tricorn',
      ),
      array(
        'emoji' => '🐢',
        'name' => 'バーニングシップ集合',
        'path' => '/canvas/burning-ship',
      ),
    );
    foreach ($fractals as $fractal) {
      echo '<h2>' . $fractal['emoji'] . ' ' . $fractal['name'] . ' ' . $fractal['emoji'] . '</h2>';
      echo '<iframe src="' . $fractal['path'] . '"></iframe>';
    }
    ?>
  </main>
</body>
</html>
