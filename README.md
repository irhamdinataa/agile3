# PackingApp

## requirement
1. 8.1 php version 
2. mysql

## Installation

1. Clone repository ini
2. install dependencies dengan `composer install`
3. copy file **.env.example** dan rename jadi **.env**
    - "sesuaikan konfigurasi database"
    - pada bagian bawah ini sesuaikan dengan **app password** google akun anda, kalau belum ada buat dulu disini > https://myaccount.google.com/apppasswords

    MAIL_MAILER=smtp<br>
    MAIL_HOST=smtp.gmail.com<br>
    MAIL_PORT=587<br>
    MAIL_USERNAME=youremail<br>
    MAIL_PASSWORD=yourapppassword<br>
    MAIL_ENCRYPTION=tls<br>
    MAIL_FROM_ADDRESS=youremail<br>
    MAIL_FROM_NAME="${APP_NAME}"<br>

4. generate application key dengan `php artisan key:generate`
5. running database dengan `php artisan migrate:fresh --seed`
6. untuk akses file lampiran yang ada di storage `php artisan storage:link`
7. pastikan database server dan web server berjalan, kemudian start aplikasi dengan `php artisan serve`

## default account
email : admin1@gmail.com
password : admin1

email : produksi1@gmail.com
password : produksi1

email : pengadaan1@gmail.com
password : pengadaan1