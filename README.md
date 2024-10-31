<h2>Generar la llave para el funcionamiento de laravel</h2>
php artisan key:generate

<h2>Instalar la carpeta de vendor</h2>
```bash 
composer install
```

<h2>Instalar el paquete para socialite</h2>
```bash
composer require laravel/socialite
```

<h2>Variables utilizadas</h2>
<lu>
    <li>GOOGLE_OAUTH_ID</li>
    <li>GOOGLE_OAUTH_KEY</li>
    <li>GOOGLE_REDIRECT_URL="http://localhost:8000/google-callback"</li>
</lu>

<h2>Agregar los permisos</h2>
```bash
composer require spatie/laravel-permission
```
