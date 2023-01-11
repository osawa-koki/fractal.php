# fractal.php

🐍🐍🐍 PHPのGDライブラリを使用してフラクタル図形を描写する。  

## 成果物イロイロ

### マンデルブロ集合

![マンデルブロ集合](./.development/img/mandelbrot.png)  

### ジュリア集合

![ジュリア集合](./.development/img/julia.png)  

### トライコーン集合

![トライコーン集合](./.development/img/tricorn.png)  

### バーニングシップ集合

![バーニングシップ集合](./.development/img/burning-ship.png)  

## 実行方法

```shell
docker build -t fractal-php . && docker run -p 80:80 -it --rm --name my-fractal-php fractal-php
```

<http://localhost:80>へアクセス。  
80番ポートをリッスンしたくない場合には、ホスト側のポートを変えてください。  
