# Atte

![image](https://github.com/tatsuyakunugi/Atte/assets/143701240/3a09f161-ec6a-474e-a75e-1be52a2030ed)

このアプリは勤怠管理のためのアプリになります。

会員登録をすることで毎日の勤怠を記録することが出来、

日付別の勤怠記録も確認できます。

また、ユーザーの個人ページから日付検索をすることにより、

個人の日別勤怠記録も閲覧できます。

## 作成した目的

このアプリは模擬案件の課題として制作しました。

与えられた要件や完成イメージ図をもとに、

テーブル設計・ER図作成・コーディングを行いました。

## アプリケーションURL

デプロイをしていないのでアプリケーションURLはありません。

## 他のリポジトリ

ありません。

## 機能一覧

・会員登録機能（入力項目は名前、メールアドレス、パスワード、確認用パスワード）

・ログイン機能（メールアドレスとパスワードで認証）

・ログアウト機能

・勤怠打刻機能（出勤・退勤の打刻、休憩開始・休憩就労の打刻）

・その日に勤務した全ユーザーの勤怠実績を閲覧可能

・ユーザー一覧から個人の勤怠実績を日付検索により閲覧可能

### 機能に関する注釈

・勤務は1日1回までに制御

・日を跨いだ時点で翌日の出勤操作に切り替え

・日を跨いでの勤務（夜勤など）にも対応

・休憩は勤務中に何度でも取得可能

## 使用技術

・php

・laravel8.83.8

・MYSQL:8.0.26

## テーブル設計

![image](https://github.com/tatsuyakunugi/Atte/assets/143701240/2ce29c3d-a2db-4557-89fc-2a28305c2df8)
![image](https://github.com/tatsuyakunugi/Atte/assets/143701240/860c44ba-07d9-4639-ae55-bba6c9199f96)
![image](https://github.com/tatsuyakunugi/Atte/assets/143701240/7fd95147-2ccb-4db4-8aa9-8b7975fefba9)

## ER図

![image](https://github.com/tatsuyakunugi/Atte/assets/143701240/d4cf0120-00e6-4b32-89c6-63d3b81dfcc0)

## 環境構築

### Dockerビルド

1．git clone git@github.com:coachtech-material/laravel-docker-template.git

2．docker-compose up -d --build

### laravel環境構築

1．docker-compose exec php bash

2．composer install

3．cp .env.example .env（.env.exampleファイルから.envを作成し、環境変数を変更）

4．php artisan key:generate

5．composer require laravel/fortify

6．php artisan vendor:publish --provider="Laravel\Fortify\FortifyServiceProvider"

7．(composer.jsonの"require"内に"laravel/tinker": "^2.5",と"nesbot/carbon": "^2.31"を追記し)composer update

8．php artisan migrate

9．php artisan db:seed

## その他

### テスト用ユーザー

名前：テスト太郎

メールアドレス：test@example.com

パスワード：testpass

### ダミーデータ

機能確認用のデータとして、
、
・20件のユーザーデイタを登録
 
・5月10日に10件の勤怠データを登録
 
