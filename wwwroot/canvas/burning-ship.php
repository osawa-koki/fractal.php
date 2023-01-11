<?php

$default_width = 500;
$default_height = 500;
$default_x_min = -1.8;
$default_x_max = -1.7;
$default_y_min = -0.1;
$default_y_max = 0.02;
$default_iteration = 20;
$default_threshold = 8;

// パラメタを取得する
$width = isset($_GET['width']) ? intval($_GET['width']) : $default_width;
$height = isset($_GET['height']) ? intval($_GET['height']) : $default_height;
$x_min = isset($_GET['x_min']) ? floatval($_GET['x_min']) : $default_x_min;
$x_max = isset($_GET['x_max']) ? floatval($_GET['x_max']) : $default_x_max;
$y_min = isset($_GET['y_min']) ? floatval($_GET['y_min']) : $default_y_min;
$y_max = isset($_GET['y_max']) ? floatval($_GET['y_max']) : $default_y_max;
$iteration = isset($_GET['iteration']) ? intval($_GET['iteration']) : $default_iteration;
$threshold = isset($_GET['threshold']) ? floatval($_GET['threshold']) : $default_threshold;

// パラメタのチェック
if ($width <= 0 || $height <= 0) {
  $width = $default_width;
}
if ($x_min >= $x_max) {
  $x_min = $default_x_min;
  $x_max = $default_x_max;
}
if ($y_min >= $y_max) {
  $y_min = $default_y_min;
  $y_max = $default_y_max;
}
if ($iteration <= 0 || $iteration > 1024) {
  $iteration = $default_iteration;
}
if ($threshold <= 0 || $threshold > 1024) {
  $threshold = $default_threshold;
}

// バーニングシップ集合を描写
$canvas = imagecreatetruecolor($width, $height);

// 色を設定
$colors = array();

for ($i = 0; $i < $iteration; $i++) {
  // R要素の値が大きいほど赤っぽくなる。
  $colors[$i] = imagecolorallocate($canvas, ($i * 10) % 256, $i % 256, $i % 256);
}

$black = imagecolorallocate($canvas, 0, 0, 0);
imagefill($canvas, 0, 0, $black);

// バーニングシップ集合を描写
$xRange = $x_max - $x_min;
$yRange = $y_max - $y_min;
$xStep = $xRange / $width;
$yStep = $yRange / $height;

for ($x = 0; $x < $width; $x++) {
  for ($y = 0; $y < $height; $y++) {
    $x0 = $x_min + $x * $xStep;
    $y0 = $y_min + $y * $yStep;
    $x1 = 0;
    $y1 = 0;
    $i = 0;
    while ($x1 * $x1 + $y1 * $y1 < $threshold && $i < $iteration) {
      $x2 = abs($x1 * $x1 - $y1 * $y1 + $x0);
      $y2 = abs(2 * $x1 * $y1 + $y0);
      $x1 = $x2;
      $y1 = $y2;
      $i++;
    }
    if ($i === $iteration) {
      imagesetpixel($canvas, $x, $y, $black);
    } else {
      imagesetpixel($canvas, $x, $y, $colors[$i]);
    }
  }
}

// ヘッダを出力
header('Content-Type: image/png');

// 画像を出力
imagepng($canvas);

// メモリを解放
imagedestroy($canvas);

?>
