# Difiaba — サロン予約管理

イタリア発のヘアカラー・ケアブランド Difiaba を扱うサロン向けに作った、来店予約と施術メニューの管理システムです。

## できること

**お客さま側**

来店予約フォーム（`bookavisit.php`）。希望のメニューと日時を選んで送信すると、サロン側に通知が飛びます。

**サロン側**

ログインすると管理画面に入れます。

| 画面 | 役割 |
|---|---|
| 予約一覧 | 未対応・承認済み・完了・却下の4つの状態で切り替え |
| メニュー管理 | 施術メニューの追加・編集 |
| 利用者管理 | スタッフアカウントの確認 |

## 構成

素の PHP です。フレームワークもビルド工程もありません。

```
index.php            トップ
bookavisit.php       予約フォーム
login.php            ログイン
header.php           共通ヘッダ
components/          サイドナビ・トップナビ
backend/             API とセッション管理
backend/PHPMailer/   メール送信
assets2/             CSS・JS・画像
```

`backend/` に処理を分けていて、画面側は fetch で叩く形です。`fetch_pending.php` `fetch_approved.php` `fetch_completed.php` `fetch_reject.php` が予約の状態ごとに分かれています。

メールは PHPMailer を同梱しています。共用サーバーでも動くように、Composer は使っていません。

## 動かし方

PHP が動くサーバーに置いて、`backend/config.php` にデータベースの接続情報を入れます。

ローカルなら以下で確認できます。

```bash
php -S localhost:8080
```

## 設計で考えたこと

**予約の状態を4つに分けた**

未対応・承認済み・完了・却下。サロンの運用に合わせています。「承認したけど来店前」と「施術が終わった」を分けないと、当日の確認が面倒になるためです。

**Composer を使わなかった**

サロンが契約している共用サーバーで動かす前提でした。FTPで上げれば動く状態を維持したかったので、PHPMailer はリポジトリに同梱しています。

---

## つくった人

ブラックにゃー（blacknyaa）— 大阪のフリーランスAIエンジニアです。生成AI×Web開発を軸に、業務システムとWebサイトを受託で作っています。

| | |
|---|---|
| ランサーズ | [ブラックにゃー (Ponta-0363)](https://www.lancers.jp/profile/Ponta-0363) |
| note | [note.com/blacknyaa](https://note.com/blacknyaa) |
| Qiita | [qiita.com/blacknyaa](https://qiita.com/blacknyaa) |
| Zenn | [zenn.dev/blacknyaa](https://zenn.dev/blacknyaa) |
| YOUTRUST | [youtrust.jp/users/blacknyaa](https://youtrust.jp/users/blacknyaa) |
| GitHub | [github.com/blacknyaa](https://github.com/blacknyaa) |

お仕事のご相談は、ランサーズ経由でも直接でも受けています。NDAも対応します。
