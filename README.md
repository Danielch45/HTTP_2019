# HTTP_2019

Cara instalasi & penggunaan
Installasi Laravel

Install XAMPP terlebih dahulu
Link : https://www.apachefriends.org/index.html
Install composer
Link : https://getcomposer.org/download/

edit file httpd-vhosts.conf di "C:\xampp\apache\conf\extra\httpd-vhosts.conf"
masukkan line berikut
```
# VirtualHost for LARAVEL.DEV

<VirtualHost laravel.dev:80>
  DocumentRoot "C:\xampp\htdocs\laravel\public"
  ServerAdmin laravel.dev
  <Directory "C:\xampp\htdocs\laravel">
        Options Indexes FollowSymLinks
        AllowOverride All
        Require all granted
  </Directory>
</VirtualHost>
```

kemudian edit file hosts di "C:\Windows\System32\drivers\etc"
untuk mengedit file host, masukkan permission untuk modify ke users
masukkan line berikut
```
# localhost name resolution is handled within DNS itself.
#	127.0.0.1       localhost
#	::1             localhost

127.0.0.1	laravel.dev
```

setelah itu install laravel framework
buka cmd kemudian redirect ke xampp\htdocs\
ketik: composer create-project laravel/laravel laravel "5.5.*"

Installasi selesai
=====================================================================================================
Copy folder project ke folder xampp\htdocs\...
nyalakan xampp server apache dan mysql
open browser, masuk ke localhost/phpmyadmin
dalam phpmyadmin buatlah database(click New di bagian kiri atas) dengan nama himtiorg_http2019
masuk ke database himtiorg_http2019 kemudian klik import lalu masukkan file "himtiorg_http2019.sql" untuk me-retrieve database
setelah itu dia akan membuat tabel registerant

setelah itu..
open cmd dan redirect ke folder xampp\htdocs\HTTP
ketik command "php artisan serve"
setelah itu web bisa dibuka di localhost server

untuk mengedit & melihat code backend bisa di HTTP\app\Http\mainController.php
untuk mengedit & melihat code frontend bisa di HTTP\resources\views
untuk assets dimasukkan ke folder HTTP\public

untuk backend code validation dapat dibuat menggunakan php
Online Guide(PhP): https://www.w3schools.com/php7/default.asp
Online Guide(Laravel): https://laravel.com/docs/5.5
References: https://www.codementor.io/magarrent/how-to-install-laravel-5-xampp-windows-du107u9ji

Side Note: jangan malu bertanya ke PIC atau koor apabila ada masalah/perlu bantuan
