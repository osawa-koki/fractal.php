<!DOCTYPE html>
<?php
$title = "๐ Fractal-Drawer ๐";
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
        'emoji' => '๐ฌ',
        'name' => 'ใใณใใซใใญ้ๅ',
        'description' => "The ใใฉใฏใฟใซๅณๅฝขใงใใญ๐ง\nไธๆ่ญฐใชๆใใใใใญใฌใคใชๅณๅฝขใงใใ",
        'path' => '/canvas/mandelbrot',
      ),
      array(
        'emoji' => '๐',
        'name' => 'ใธใฅใชใข้ๅ',
        'description' => "ไบบๆฐๅบฆใฏใใณใใซใใญ้ๅใซๅฃใใใฎใฎใ\nใใณใใซใใญ้ๅใซๆฏในใฆใใใ่ค้ใชๅณๅฝขใงใพใฏใพใฏใใพใใ",
        'path' => '/canvas/julia',
      ),
      array(
        'emoji' => '๐',
        'name' => 'ใใฉใคใณใผใณ้ๅ',
        'description' => "ใใณใใซใใญ้ๅใฎ้ใงใใ\n้ใจใใใฎใฏ่ฃ้ๅใฎๆๅณใงใใ",
        'path' => '/canvas/tricorn',
      ),
      array(
        'emoji' => '๐ข',
        'name' => 'ใใผใใณใฐใทใใ้ๅ',
        'description' => "ใชใใ ใใ่นใ็ใใฆใใใใใชๅณๅฝขใงใใ\nๆฐๅญฆใฎไธ็ใฃใฆ้ข็ฝใ๐๐๐\n(by ็ง็ซๆ็ณปๅ)",
        'path' => '/canvas/burning-ship',
      ),
    );
    foreach ($fractals as $fractal) {
      echo '<h2>' . $fractal['emoji'] . ' ' . $fractal['name'] . ' ' . $fractal['emoji'] . '</h2>';
      echo '<p>' . $fractal['description'] . '</p>';
      echo '<iframe src="' . $fractal['path'] . '"></iframe>';
    }
    ?>
  </main>
</body>
</html>
