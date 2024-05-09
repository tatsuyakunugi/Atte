# アプリケーション名　＜Atte＞

![image](https://github.com/tatsuyakunugi/Atte/assets/143701240/3a09f161-ec6a-474e-a75e-1be52a2030ed)

## 作成した目的

## アプリケーションURL
・開発環境 http://localhost/
・phpMyAdmin http://llocalhost:8080

## 機能一覧

## 使用技術
・php
・laravel8.83.8
・MYSQL

## テーブル設計

![image](https://github.com/tatsuyakunugi/Atte/assets/143701240/2ce29c3d-a2db-4557-89fc-2a28305c2df8)
![image](https://github.com/tatsuyakunugi/Atte/assets/143701240/860c44ba-07d9-4639-ae55-bba6c9199f96)
![image](https://github.com/tatsuyakunugi/Atte/assets/143701240/7fd95147-2ccb-4db4-8aa9-8b7975fefba9)

## ER図

![image](https://github.com/tatsuyakunugi/Atte/assets/143701240/d4cf0120-00e6-4b32-89c6-63d3b81dfcc0)

## 環境構築

### Dockerビルド
1．
2．docker-compose up -d --build

### laravel環境構築
1．docker-compose exec php bash
2．composer install
3．.env.exampleファイルから.envを作成し、環境変数を変更
4．php artisan key:generate
5．php artisan migrate
6．php artisan db:seed

## その他

### テスト用ユーザー
名前：テスト太郎
メールアドレス：test@example.com
パスワード：testpass
