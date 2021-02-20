# MAC PHP PATH SETTING

```
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

```
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

# GIT

```
laravel-app%git init
Initialized empty Git repository in /Applications/MAMP/htdocs/laravel-app/.git/


```
