# MAC PHP PATH SETTING

```PHP
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

```PHP
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

```PHP
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

# Debugbar Setting
Laravel5.7: Laravel Debugbarを使う<br>
https://qiita.com/sutara79/items/9fd442a81001842aeba1<br>
laravel-app%composer require barryvdh/laravel-debugbar<br>

# MAMP DatabaseCreate/user-setting & 1st migrate test
Edit<br>
/Applications/MAMP/htdocs/laravel-app/.env<br>
/Applications/MAMP/htdocs/laravel-app/config/database.php<br>

commit : e5a40c8

Udemyの解説ではDB接続エラーとなった<br>
解決：【Laravel】access deniedが表示されたときの対処法<br>
https://coinbaby8.com/access_denied.html

```PHP
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
Eloquent / ORM : Object-Relation-Mapping<br>

/app/Models/Test.php<br>
namespace App\Models<br>
laravel-app%php artisan make:model Models/Test

- migrartionFile & ControllerFile<br>
laravel-app%php artisan make:model Models/Test -mc

## Migration
https://readouble.com/laravel/6.x/ja/migrations.html

/database/migrations/2021_02_20_070856_create_tests_table.php
laravel-app%php artisan make:migration create_tests_table
laravel-app%php artisan migrate

```PHP
# make:model -m
# create modelFile, class CreateContactFormsTable extends Migration
# Schema::create('contact_forms', function (Blueprint $table) {
laravel-app%php artisan make:model Models/ContactForm -m
Model created successfully.
Created Migration: 2021_02_23_230003_create_contact_forms_table
#edit migrate File & migrate
laravel-app%php artisan migrate
Migrating: 2021_02_23_230003_create_contact_forms_table
Migrated:  2021_02_23_230003_create_contact_forms_table
#check MAMP DB

#add table
#create migrationFile,  class AddTitleToContactFormsTable extends Migration
#Schema::table('contact_forms', function (Blueprint $table) {
aravel-app%php artisan make:migration add_title_to_contact_forms_table --table=contact_forms
Created Migration: 2021_02_23_231435_add_title_to_contact_forms_table

#rollback or rollback --step = n
#edit  $table->dropColumn('title');
laravel-app%php artisan migrate:rollback
Rolling back: 2021_02_23_231435_add_title_to_contact_forms_table
Rolled back:  2021_02_23_231435_add_title_to_contact_forms_table (0.04 seconds)

laravel-app%php artisan migrate:status
#check Ran? Yes or No
```
# tinker

```PHP
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
# Controller
/app/Http/Controllers/TestController.php<br>
laravel-app%php artisan make:controller TestController<br>
Controller created successfully.


## Resource Controller
https://readouble.com/laravel/6.x/ja/controllers.html<br>
Representational State Transfer<br>
APIの定義,ウェブ分散ハイパーメディアシステムのためのソフトウェアアーキテクチャスタイル<br>
(RESTful APIとは何なのか)[https://qiita.com/NagaokaKenichi/items/0647c30ef596cedf4bf2]<br>

| 動詞      | URI                  | アクション | ルート名       |
| --------- | -------------------- | ---------- | -------------- |
| GET       | /photos              | index      | photos.index   |
| GET       | /photos/create       | create     | photos.create  |
| POST      | /photos              | store      | photos.store   |
| GET       | /photos/{photo}      | show       | photos.show    |
| GET       | /photos/{photo}/edit | edit       | photos.edit    |
| PUT/PATCH | /photos/{photo}      | update     | photos.update  |
| DELETE    | /photos/{photo}      | destroy    | photos.destroy |

```PHP
laravel-app%php artisan make:controller ContactFormController --resource
Controller created successfully.
#create The action 7method is described.
./app/Http/Controllers/ContactFormController.php

# ./routes/web.php
use Illuminate\Support\Facades\Route;
```

```PHP
# ./resources/views/contact/index.blade.php
コンタクトフォームのindexです

#./app/Http/Controllers/ContactFormController.php
    public function index()
    {
        #./resources/views/contact/index.blade.php
        return view('contact.index');
    }

# ./routes/web.php
Route::get('contact/index', 'ContactFormController@index');

laravel-app%php artisan serve
#http://127.0.0.1:8000/contact/index
```

## Route Group
https://readouble.com/laravel/6.x/ja/routing.html






# よく使用するヘルパ
route, auth, app, bcrypt, collect, dd, env, factory, old, view<br>

https://readouble.com/laravel/6.x/ja/helpers.html

# Requirement definition 要件定義
参考：要件定義～システム設計ができる人材になれる記事<br>
https://qiita.com/Saku731/items/741fcf0f40dd989ee4f8

# Basic Design 基本設計
1)画面設計(View), 2)機能設計(Controller), 3)データ設計(model/DB)



# エントリポイント
public/index.php<br>
1.オートロード・ファイル読み込み
2.フレームワーク起動
3.アプリケーション実行
4.HTTPレスポンス送信
5.終了処理

Laravelﾜｶﾝﾈ(ﾟ⊿ﾟ)から「完全に理解した（）」までステップアップ<br>
https://qiita.com/namizatork/items/801da1d03dc322fad70c<br>


# Laravel ui / Scaffoldスカフォールド(土台,足場)
- https://readouble.com/laravel/6.x/ja/frontend.html<br>

laravel-app%composer require laravel/ui:^1.0 --dev<br>

```PHP
"require-dev": {
    "facade/ignition": "^1.4",
    "fzaninotto/faker": "^1.4",
 *  "laravel/ui": "^1.0",
    "mockery/mockery": "^1.0",
    "nunomaduro/collision": "^3.0",
    "phpunit/phpunit": "^8.0"
}

/*
#基本的なスカフォールドを生成<br>
php artisan ui bootstrap<br>
php artisan ui vue<br>
php artisan ui react<br>
#ログイン／ユーザー登録スカフォールドを生成<br>
php artisan ui bootstrap --auth<br>
php artisan ui vue --auth<br>
php artisan ui react --auth<br>
*/
```

```PHP
laravel-app%php artisan ui bootstrap --auth
Bootstrap scaffolding installed successfully.
Please run "npm install && npm run dev" to compile your fresh scaffolding.
Authentication scaffolding generated successfully.
#認証機能自動追加される
```

./Applications/MAMP/htdocs/laravel-app/app/Http/Controllers/Auth
- ForgotPasswordController.php
- LoginController.php
- RegisterController.php
- ResetPasswordController.php
- VerificationController.php

./routes/web.php
Route::get('tests/test', 'TestController@index');
Auth::routes();

./app/User.php
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

```PHP
class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
}
```

#register, login  bootstrap適用

```PHP
laravel-app%node -v
v14.15.5
laravel-app%npm -v
6.14.11
/*npm installを使い、依存パッケージをインストールし終えたら、Laravel Mixを使用して、SASSファイルを通常のCSSへコンパイルできます。npm run devコマンドはwebpack.mix.jsファイル中の指示を処理します。通常、コンパイル済みCSSはpublic/cssディレクトリへ設置されます。*/
laravel-app%npm install
create /node_modules/

./node_modules/bootstrap   %ls
LICENSE         dist            package.json
README.md       js              scss

./package.json
"devDependencies": {
      "axios": "^0.19",
      "bootstrap": "^4.0.0",
      "cross-env": "^5.1",
      "jquery": "^3.2",
      "laravel-mix": "^4.0.7",
      "lodash": "^4.17.13",
      "popper.js": "^1.12",
      "resolve-url-loader": "^2.3.1",
      "sass": "^1.15.2",
      "sass-loader": "^7.1.0"
  }


laravel-app%npm run dev
 DONE  Compiled successfully in 12087ms          15:17:41
  Asset      Size   Chunks             Chunk Names
/css/app.css   179 KiB  /js/app  [emitted]  /js/app
  /js/app.js  1.08 MiB  /js/app  [emitted]  /js/app
laravel-app%php artisan serve

./resources/sass  %cat app.scss
// Fonts
@import url('https://fonts.googleapis.com/css?family=Nunito');
// Variables
@import 'variables';
// Bootstrap
@import '~bootstrap/scss/bootstrap';

#compile
public/css/app.css


## フロントサイドのファイル変更を監視し自動コンパイルする
laravel-app%npm run watch<別ターミナルで起動維持する>
&
laravel-app%php artisan serve

 WAIT  Compiling...                               11:28:21
98% after emitting SizeLimitsPlugin
 DONE  Compiled successfully in 1897ms            11:28:23
  Asset     Size   Chunks             Chunk Names
/css/app.css  179 KiB  /js/app  [emitted]  /js/app
 + 1 hidden asset


## Japanese localization
./resources/lang/en
auth.php        passwords.php
pagination.php  validation.php

https://github.com/minoryorg/laravel-resources-lang-ja
DownLoad ZIP & open
mv ja/  ./resources/lang
- 'attributes' can be defined and messages can be changed as desired

./config/app.php
 // 'locale' => 'en',
    'locale' => 'ja',

- 'attributes' can be defined and messages can be changed as desired
./resources/lang/ja/validation.php
    'attributes' => [
        'password' =>  'パスワード' //追記
    ],
```
# Routing check

```PHP
#File output
laravel-app%php artisan route:list > route.txt

laravel-app%php artisan route:list
```

# DB挿入

```PHP
# ./routes/web.php
Route::get('create', 'ContactFormController@create')->name('contact.create');

# ./app/Http/Controllers/ContactFormController.php
public function create()
{
    #./resources/views/contact/create.blade.php
    return view('contact.create');
}

public function store(Request $request)
{
    // インスタンス化
    $contact = new ContactForm;
    //Requestオブジェクトから取得する
    $contact->your_name = $request->input('your_name');
    $contact->title = $request->input('title');
    $contact->email = $request->input('email');
    $contact->url = $request->input('url');
    $contact->gender = $request->input('gender');
    $contact->age = $request->input('age');
    $contact->contact = $request->input('contact');
    // デバッグ
    // dd($your_name,$title,$email,$url,$gender,$age,$contact);
    // dd($contact);

    $contact->save(); #check MAMP phpMyAdmin

    return redirect('contact/index');
}
```

# DB取得

```PHP
# ./routes/web.php
Route::post('store', 'ContactFormController@store')->name('contact.store');

# ./app/Http/Controllers/ContactFormController.php
public function index()
{
    //Eloquent ORMapper  オブジェクト全て取得
    $contacts = ContactForm::all();
    //QueryBuilder
    // 取得テーブル
    $contacts = DB::table('contact_forms')
        // 取得カラム
        ->select('id', 'your_name', 'title', 'email', 'url', 'gender', 'age', 'contact', 'created_at')
        // 降順
        ->orderBy('created_at', 'desc')
        // 取得
        ->get();
    // dd($contacts);

    #./resources/views/contact/index.blade.php
    # compact('contacts')：$contactをビュー側に返す
    return view('contact.index', compact('contacts'));
}

# ./resources/views/contact/index.blade.php
<table class="table">
  <thead>
      <tr>
          <th scope="col">ID:</th>
          <th scope="col">氏名:</th>
          <th scope="col">件名:</th>
          <th scope="col">email:</th>
          <th scope="col">登録日時:</th>
      </tr>
  </thead>
  <tbody>
      @foreach($contacts as $contact)
      <tr>
          <th>{{ $contact->id}}</th>
          <td>{{ $contact->your_name}}</td>
          <td>{{ $contact->title}}</td>
          <td>{{ $contact->email}}</td>
          <td>{{ $contact->created_at}}</td>
          @endforeach
      </tr>
  </tbody>
</table>
```


# Multi login
【Laravel】マルチログイン(ユーザーと管理者など)機能を設定してみた【体験談】<br>
https://coinbaby8.com/laravel-multi-login.html<br>


# php artisan list
## Laravel Framework 6.20.16
### Usage:
-  command [options] [arguments]
### Options:
-  -h, --help            &ensp; #Display this help message
-  -q, --quiet           &ensp; #Do not output any message
-  -V, --version         &ensp; #Display this application version
-      --ansi            &ensp; #Force ANSI output
-      --no-ansi         &ensp; #Disable ANSI output
###  -n, --no-interaction  Do not ask any interactive question
-      --env[=ENV]       &ensp; #The environment the command should run under
-  -v|vv|vvv, --verbose  &ensp; #Increase the verbosity of messages: 1 for normal output, 2 for more verbose output and 3 for debug

## Available commands:
-  clear-compiled       &ensp; #Remove the compiled class file
-  down                 &ensp; #Put the application into maintenance mode
-  env                  &ensp; #Display the current framework environment
-  help                 &ensp; #Displays help for a command
-  inspire              &ensp; #Display an inspiring quote
-  list                 &ensp; #Lists commands
-  migrate              &ensp; #Run the database migrations
-  optimize             &ensp; #Cache the framework bootstrap files
-  preset               &ensp; #Swap the front-end scaffolding for the application
-  serve                &ensp; #Serve the application on the PHP development server
-  tinker               &ensp; #Interact with your application
-  up                   &ensp; #Bring the application out of maintenance mode
### auth
-  auth:clear-resets    &ensp; #Flush expired password reset tokens
- cache
-  cache:clear          &ensp; #Flush the application cache
-  cache:forget         &ensp; #Remove an item from the cache
-  cache:table          &ensp; #Create a migration for the cache database table
- config
-  config:cache         &ensp; #Create a cache file for faster configuration loading
-  config:clear         &ensp; #Remove the configuration cache file
### db
-  db:seed              &ensp; #Seed the database with records
-  db:wipe              &ensp; #Drop all tables, views, and types
- event
-  event:cache          &ensp; #Discover and cache the application's events and listeners
-  event:clear          &ensp; #Clear all cached events and listeners
-  event:generate       &ensp; #Generate the missing events and listeners based on registration
-  event:list           &ensp; #List the application's events and listeners
### key
-  key:generate         &ensp; #Set the application key
### make
-  make:channel         &ensp; #Create a new channel class
-  make:command         &ensp; #Create a new Artisan command
-  make:controller      &ensp; #Create a new controller class
-  make:event           &ensp; #Create a new event class
-  make:exception       &ensp; #Create a new custom exception class
-  make:factory         &ensp; #Create a new model factory
-  make:job             &ensp; #Create a new job class
-  make:listener        &ensp; #Create a new event listener class
-  make:mail            &ensp; #Create a new email class
-  make:middleware      &ensp; #Create a new middleware class
-  make:migration       &ensp; #Create a new migration file
-  make:model           &ensp; #Create a new Eloquent model class
-  make:notification    &ensp; #Create a new notification class
-  make:observer        &ensp; #Create a new observer class
-  make:policy          &ensp; #Create a new policy class
-  make:provider        &ensp; #Create a new service provider class
-  make:request         &ensp; #Create a new form request class
-  make:resource        &ensp; #Create a new resource
-  make:rule            &ensp; #Create a new validation rule
-  make:seeder          &ensp; #Create a new seeder class
-  make:test            &ensp; #Create a new test class
### migrate
-  migrate:fresh        &ensp; #Drop all tables and re-run all migrations
-  migrate:install      &ensp; #Create the migration repository
-  migrate:refresh      &ensp; #Reset and re-run all migrations
-  migrate:reset        &ensp; #Rollback all database migrations
-  migrate:rollback     &ensp; #Rollback the last database migration
-  migrate:status       &ensp; #Show the status of each migration
### notifications
 - notifications:table  &ensp; #Create a migration for the notifications table
### optimize
-  optimize:clear       &ensp; #Remove the cached bootstrap files
### package
-  package:discover     &ensp; #Rebuild the cached package manifest
### queue
-  queue:failed         &ensp; #List all of the failed queue jobs
-  queue:failed-table   &ensp; #Create a migration for the failed queue jobs database table
-  queue:flush          &ensp; #Flush all of the failed queue jobs
-  queue:forget         &ensp; #Delete a failed queue job
-  queue:listen         &ensp; #Listen to a given queue
-  queue:restart        &ensp; #Restart queue worker daemons after their current job
-  queue:retry          &ensp; #Retry a failed queue job
-  queue:table          &ensp; #Create a migration for the queue jobs database table
-  queue:work           &ensp; #Start processing jobs on the queue as a daemon
### route
-  route:cache          &ensp; #Create a route cache file for faster route registration
-  route:clear          &ensp; #Remove the route cache file
-  route:list           &ensp; #List all registered routes
### schedule
-  schedule:run         &ensp; #Run the scheduled commands
### session
-  session:table        &ensp; #Create a migration for the session database table
### storage
-  storage:link         &ensp; #Create a symbolic link from "public/storage" to "storage/app/public"
### vendor
-  vendor:publish       &ensp; #Publish any publishable assets from vendor packages
### view
-  view:cache           &ensp; #Compile all of the application's Blade templates
-  view:clear           &ensp; #Clear all compiled view files

# Facade
vendor/laravel/framework/src/Illuminate/Support/Facades<br>
use Illuminate\Support\Facades\***;<br>
| ファサード           | クラス                                          | サービスコンテナ結合 | 
| -------------------- | ----------------------------------------------- | -------------------- | 
| App                  | Illuminate\Foundation\Application               | app                  | 
| Artisan              | Illuminate\Contracts\Console\Kernel             | artisan              | 
| Auth                 | Illuminate\Auth\AuthManager                     | auth                 | 
| Auth (Instance)      | Illuminate\Contracts\Auth\Guard                 | auth.driver          | 
| Blade                | Illuminate\View\Compilers\BladeCompiler         | blade.compiler       | 
| Broadcast            | Illuminate\Contracts\Broadcasting\Factory       |                      | 
| Broadcast (Instance) | Illuminate\Contracts\Broadcasting\Broadcaster   |                      | 
| Bus                  | Illuminate\Contracts\Bus\Dispatcher             |                      | 
| Cache                | Illuminate\Cache\CacheManager                   | cache                | 
| Cache (Instance)     | Illuminate\Cache\Repository                     | cache.store          | 
| Config               | Illuminate\Config\Repository                    | config               | 
| Cookie               | Illuminate\Cookie\CookieJar                     | cookie               | 
| Crypt                | Illuminate\Encryption\Encrypter                 | encrypter            | 
| DB                   | Illuminate\Database\DatabaseManager             | db                   | 
| DB (Instance)        | Illuminate\Database\Connection                  | db.connection        | 
| Event                | Illuminate\Events\Dispatcher                    | events               | 
| File                 | Illuminate\Filesystem\Filesystem                | files                | 
| Gate                 | Illuminate\Contracts\Auth\Access\Gate           |                      | 
| Hash                 | Illuminate\Contracts\Hashing\Hasher             | hash                 | 
| Lang                 | Illuminate\Translation\Translator               | translator           | 
| Log                  | Illuminate\Log\LogManager                       | log                  | 
| Mail                 | Illuminate\Mail\Mailer                          | mailer               | 
| Notification         | Illuminate\Notifications\ChannelManager         |                      | 
| Password             | Illuminate\Auth\Passwords\PasswordBrokerManager | auth.password        | 
| Password (Instance)  | Illuminate\Auth\Passwords\PasswordBroker        | auth.password.broker | 
| Queue                | Illuminate\Queue\QueueManager                   | queue                | 
| Queue (Instance)     | Illuminate\Contracts\Queue\Queue                | queue.connection     | 
| Queue (Base Class)   | Illuminate\Queue\Queue                          |                      | 
| Redirect             | Illuminate\Routing\Redirector                   | redirect             | 
| Redis                | Illuminate\Redis\RedisManager                   | redis                | 
| Redis (Instance)     | Illuminate\Redis\Connections\Connection         | redis.connection     | 
| Request              | Illuminate\Http\Request                         | request              | 
| Response             | Illuminate\Contracts\Routing\ResponseFactory    |                      | 
| Response (Instance)  | Illuminate\Http\Response                        |                      | 
| Route                | Illuminate\Routing\Router                       | router               | 
| Schema               | Illuminate\Database\Schema\Builder              |                      | 
| Session              | Illuminate\Session\SessionManager               | session              | 
| Session (Instance)   | Illuminate\Session\Store                        | session.store        | 
| Storage              | Illuminate\Filesystem\FilesystemManager         | filesystem           | 
| Storage (Instance)   | Illuminate\Contracts\Filesystem\Filesystem      | filesystem.disk      | 
| URL                  | Illuminate\Routing\UrlGenerator                 | url                  | 
| Validator            | Illuminate\Validation\Factory                   | validator            | 
| Validator (Instance) | Illuminate\Validation\Validator                 |                      | 
| View                 | Illuminate\View\Factory                         | view                 | 
| View (Instance)      | Illuminate\View\View                            |                      | 
