<?php

$default_width = 500;
$default_height = 500;
$default_x_min = -2.0;
$default_x_max = 2.0;
$default_y_min = -2;
$default_y_max = 2;
$default_cx = -0.4;
$default_cy = 0.6;
$default_iteration = 256;
$default_threshold = 8;

// パラメタを取得する
$width = isset($_GET['width']) ? intval($_GET['width']) : $default_width;
$height = isset($_GET['height']) ? intval($_GET['height']) : $default_height;
$x_min = isset($_GET['x_min']) ? floatval($_GET['x_min']) : $default_x_min;
$x_max = isset($_GET['x_max']) ? floatval($_GET['x_max']) : $default_x_max;
$y_min = isset($_GET['y_min']) ? floatval($_GET['y_min']) : $default_y_min;
$y_max = isset($_GET['y_max']) ? floatval($_GET['y_max']) : $default_y_max;
$cx = isset($_GET['cx']) ? floatval($_GET['cx']) : $default_cx;
$cy = isset($_GET['cy']) ? floatval($_GET['cy']) : $default_cy;
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
if ($cx < $x_min || $cx > $x_max) {
  $cx = $default_cx;
}
if ($cy < $y_min || $cy > $y_max) {
  $cy = $default_cy;
}
if ($iteration <= 0 || $iteration > 1024) {
  $iteration = $default_iteration;
}
if ($threshold <= 0 || $threshold > 1024) {
  $threshold = $default_threshold;
}

// ジュリア集合を描写
$canvas = imagecreatetruecolor($width, $height);

// 色を設定
$colors = array();

for ($i = 0; $i < $iteration; $i++) {
  $colors[$i] = imagecolorallocate($canvas, $i % 256, ($i * 2) % 256, ($i * 4) % 256);
}

// ジュリア集合を描写
for ($y = 0; $y < $height; $y++) {
  for ($x = 0; $x < $width; $x++) {
    $zx = $x_min + ($x_max - $x_min) * $x / $width;
    $zy = $y_min + ($y_max - $y_min) * $y / $height;
    $i = 0;

    while ($i < $iteration) {
      $zx2 = $zx * $zx;
      $zy2 = $zy * $zy;

      if ($zx2 + $zy2 > $threshold) {
        break;
      }

      $zy = 2 * $zx * $zy + $cy;
      $zx = $zx2 - $zy2 + $cx;
      $i++;
    }

    imagesetpixel($canvas, $x, $y, $colors[$i]);
  }
}

// 画像を出力
imagepng($canvas);

// メモリを解放
imagedestroy($canvas);

?>