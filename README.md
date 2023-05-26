<h1>Landing Pages Web</h1>

<h2>Petunjuk Instalasi</p>
<ul>
    <li>Silahkan download projek yang ada di dalam repository</li>
    <li>Instal dependensi laravel melalui composer dengan : <code>composer install</code></li>
    <li>Instal dependensi javascript melalui npm dengan : <code>npm install</code></li>
    <li>Pindahkan file asset.rar menuju folder storage/app/public kemudian ekstract. <em>Hal ini akan mengekstrak gambar yang diperlukan pada tampilan landing page.</li>
    <li>Lakukan link antara folder storage dengan folder public dengan : <code>php artisan storage:link</code>. dengan begitu folder storage terhubung dengan folder public.</li>
    <li>Hubungkan project dengan database</li>
    <ul>
        <li>Buka file .env</li>
        Jika file env tidak ada, gunakan <code>.env.example</code> hapus bagian <code>.example</code>
        <li>hubungkan dengan database yang anda gunakan</li>
        <li>Tambahkan <code>FILESYSTEM_DRIVER=public</code> pada file .env untuk mengatur storage yang digunakan</li>
        <li>Ganti juga code : <code>APP_NAME=Laravel</code>. Ganti <strong>Laravel</strong> dengan nama aplikasi yang anda mau.
    </ul>
    <li>Lakukan migrasi dengan : <code>php artisan migrate</code> atau <code>php artisan migrate:fresh</code></li>
    <li>Lakukan seeder untuk mengisi database dengan : <code>php artisan db:seed</code></li>
    <li>Aplikasi landing page anda siap digunakan</li>
</ul>
