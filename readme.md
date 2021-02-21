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

# Laravel project Create

```PHP:
# /Applications/MAMP/htdocs/laravel-app

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

commit : e5a40c8

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

# Model
Eloquent / ORM : Object-Relation-Mapping

/app/Models/Test.php
namespace App\Models
laravel-app%php artisan make:model Models/Test

- migrartionFile & ControllerFile
laravel-app%php artisan make:model Models/Test -mc

## Migration
https://readouble.com/laravel/6.x/ja/migrations.html

/database/migrations/2021_02_20_070856_create_tests_table.php
laravel-app%php artisan make:migration create_tests_table
laravel-app%php artisan migrate


# tinker

```PHP:
laravel-app%php artisan tinker 
Psy Shell v0.9.12 (PHP 7.3.24-(to be removed in future macOS) — cli) by Justin Hileman
>>> $test = new App\Models\Test;
=> App\Models\Test {#3211}
>>> $test->text = "aaa";
=> "aaa"
>>> $test->save();
=> true
>>> $test2 = new App\Models\Test;
=> App\Models\Test {#3212}
>>> $test2->text = "tinkerで入力したよ";
=> "tinkerで入力したよ"
>>> $test2->save();
=> true
>>> App\Models\Test::all();
=> Illuminate\Database\Eloquent\Collection {#4145
     all: [
       App\Models\Test {#4146
         id: 1,
         text: "aaa",
         created_at: "2021-02-21 02:26:07",
         updated_at: "2021-02-21 02:26:07",
       },
       App\Models\Test {#4147
         id: 2,
         text: "tinkerで入力したよ",
         created_at: "2021-02-21 02:33:00",
         updated_at: "2021-02-21 02:33:00",
       },
     ],
   }
>>>
```




# Requirement definition 要件定義
参考：要件定義～システム設計ができる人材になれる記事
https://qiita.com/Saku731/items/741fcf0f40dd989ee4f8

# Basic Design 基本設計
　1)画面設計(View), 2)機能設計(Controller), 3)データ設計(model/DB)


# php artisan list
Laravel Framework 6.20.16
Usage:
  command [options] [arguments]
Options:
  -h, --help            Display this help message
  -q, --quiet           Do not output any message
  -V, --version         Display this application version
      --ansi            Force ANSI output
      --no-ansi         Disable ANSI output
  -n, --no-interaction  Do not ask any interactive question
      --env[=ENV]       The environment the command should run under
  -v|vv|vvv, --verbose  Increase the verbosity of messages: 1 for normal output, 2 for more verbose output and 3 for debug

Available commands:
  clear-compiled       Remove the compiled class file
  down                 Put the application into maintenance mode
  env                  Display the current framework environment
  help                 Displays help for a command
  inspire              Display an inspiring quote
  list                 Lists commands
  migrate              Run the database migrations
  optimize             Cache the framework bootstrap files
  preset               Swap the front-end scaffolding for the application
  serve                Serve the application on the PHP development server
  tinker               Interact with your application
  up                   Bring the application out of maintenance mode
 auth
  auth:clear-resets    Flush expired password reset tokens
 cache
  cache:clear          Flush the application cache
  cache:forget         Remove an item from the cache
  cache:table          Create a migration for the cache database table
 config
  config:cache         Create a cache file for faster configuration loading
  config:clear         Remove the configuration cache file
 db
  db:seed              Seed the database with records
  db:wipe              Drop all tables, views, and types
 event
  event:cache          Discover and cache the application's events and listeners
  event:clear          Clear all cached events and listeners
  event:generate       Generate the missing events and listeners based on registration
  event:list           List the application's events and listeners
 key
  key:generate         Set the application key
 make
  make:channel         Create a new channel class
  make:command         Create a new Artisan command
  make:controller      Create a new controller class
  make:event           Create a new event class
  make:exception       Create a new custom exception class
  make:factory         Create a new model factory
  make:job             Create a new job class
  make:listener        Create a new event listener class
  make:mail            Create a new email class
  make:middleware      Create a new middleware class
  make:migration       Create a new migration file
  make:model           Create a new Eloquent model class
  make:notification    Create a new notification class
  make:observer        Create a new observer class
  make:policy          Create a new policy class
  make:provider        Create a new service provider class
  make:request         Create a new form request class
  make:resource        Create a new resource
  make:rule            Create a new validation rule
  make:seeder          Create a new seeder class
  make:test            Create a new test class
 migrate
  migrate:fresh        Drop all tables and re-run all migrations
  migrate:install      Create the migration repository
  migrate:refresh      Reset and re-run all migrations
  migrate:reset        Rollback all database migrations
  migrate:rollback     Rollback the last database migration
  migrate:status       Show the status of each migration
 notifications
  notifications:table  Create a migration for the notifications table
 optimize
  optimize:clear       Remove the cached bootstrap files
 package
  package:discover     Rebuild the cached package manifest
 queue
  queue:failed         List all of the failed queue jobs
  queue:failed-table   Create a migration for the failed queue jobs database table
  queue:flush          Flush all of the failed queue jobs
  queue:forget         Delete a failed queue job
  queue:listen         Listen to a given queue
  queue:restart        Restart queue worker daemons after their current job
  queue:retry          Retry a failed queue job
  queue:table          Create a migration for the queue jobs database table
  queue:work           Start processing jobs on the queue as a daemon
 route
  route:cache          Create a route cache file for faster route registration
  route:clear          Remove the route cache file
  route:list           List all registered routes
 schedule
  schedule:run         Run the scheduled commands
 session
  session:table        Create a migration for the session database table
 storage
  storage:link         Create a symbolic link from "public/storage" to "storage/app/public"
 vendor
  vendor:publish       Publish any publishable assets from vendor packages
 view
  view:cache           Compile all of the application's Blade templates
  view:clear           Clear all compiled view files



