# MAC PHP PATH SETTING

```PHP:
~%export PATH=/Applications/MAMP/bin/php/php7.3.24/bin:$PATH
~%source ~/.bash_profile
~%which php
/Applications/MAMP/bin/php/php7.3.24/bin/php
~%php -v
PHP 7.3.24 (cli) (built: Nov 30 2020 13:02:01) ( NTS )
Copyright (c) 1997-2018 The PHP Group
Zend Engine v3.3.24, Copyright (c) 1998-2018 Zend Technologies
```

# LARAVEL PROJECT CREATE

```PHP:
~%cd /Applications/MAMP
MAMP%ls
Icon?				LISEZ-MOI.rtf			README.rtf			conf				htdocs				tmp
LEAME.rtf			Library				bin				db				licences			прочти.rtf
LIESMICH.rtf			MAMP.app			cgi-bin				fcgi-bin			logs				お読みください.rtf
MAMP%cd htdocs
htdocs%ls
index.php
htdocs%composer create-project laravel/laravel laravel-app --prefer-dist "6.0.*"
htdocs%ls
index.php		laravel-app
```

# GitHub Repository Create & Push

```PHP:
laravel-app%git init
Initialized empty Git repository in /Applications/MAMP/htdocs/laravel-app/.git/

laravel-app%git add .
aravel-app%git commit -m "Initial commit laravel-app"
[master (root-commit) a4b11fc] Initial commit laravel-app
 88 files changed, 9698 insertions(+)

laravel-app%git remote add origin https://github.com/Sakagami-Keisuke/Laravel-app
laravel-app%git remote -v
origin  https://github.com/Sakagami-Keisuke/Laravel-app (fetch)
origin  https://github.com/Sakagami-Keisuke/Laravel-app (push)

laravel-app%git push origin master
```

# MAMP DatabaseCreate/user-setting & 1st migrate test
Edit
/Applications/MAMP/htdocs/laravel-app/.env
/Applications/MAMP/htdocs/laravel-app/config/database.php

commit :

Udemyの解説ではDB接続エラーとなった
解決：【Laravel】access deniedが表示されたときの対処法
https://coinbaby8.com/access_denied.html

```PHP:
phpMyAdmin
ユーザーを作る際に%ではなくlocalhostで設定。
.envファイル
database, username, passwordが間違っていないことを確認
ポート番号があっているか確認(3306または8889)
DB_HOST=127.0.0.1をlocalhostへ変更
DB_SOCKET=/Applications/MAMP/tmp/mysql/mysql.sock を.envに追加
変更後にはキャッシュ削除
laravel-app%php artisan cache:clear
Application cache cleared!
aravel-app%php artisan config:clear
Configuration cache cleared!

laravel-app%php artisan migrate
Migration table created successfully.
Migrating: 2014_10_12_000000_create_users_table
Migrated:  2014_10_12_000000_create_users_table (0.07 seconds)
Migrating: 2014_10_12_100000_create_password_resets_table
Migrated:  2014_10_12_100000_create_password_resets_table (0.06 seconds)
Migrating: 2019_08_19_000000_create_failed_jobs_table
Migrated:  2019_08_19_000000_create_failed_jobs_table (0.04 seconds)
```