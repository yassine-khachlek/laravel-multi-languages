# Laravel Multi Languages

Easily add languages routes to your application.

### Installation

Install wia composer:

```
composer require yk/laravel-multi-languages
```

Add the service provider to the file config/app.php:


```php
Yk\LaravelMultiLanguages\LaravelMultiLanguagesServiceProvider::class,
```

Publishing the package config, assets and views:

```
php artisan vendor:publish --provider="Yk\LaravelMultiLanguages\LaravelMultiLanguagesServiceProvider"
```

### How it work:

#### Languages configuration

After installing the package, you can configure languages in the published configuration file in config/vendor/yk/laravel-multi-languages/languages.php.

#### Multi languages routes configuration

By default, the middleware create multi languages routes for those registered in routes/web.php.

To add other routes, just add relative routes file path to the app directory in config/vendor/yk/laravel-multi-languages/routes.php.

#### Widget

To use the provided language switcher in your blade views:

```php
@include('Yk\LaravelMultiLanguages::widgets.language-switcher')
```

## License

### GPLv2

Copyright (c) 2016 Yassine Khachlek <yassine.khachlek@gmail.com>

This program is free software; you can redistribute it and/or
modify it under the terms of the GNU General Public License
as published by the Free Software Foundation; either version 2
of the License, or (at your option) any later version.

This program is distributed in the hope that it will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
GNU General Public License for more details.

You should have received a copy of the GNU General Public License
along with this program; if not, write to the Free Software
Foundation, Inc., 51 Franklin Street, Fifth Floor, Boston, MA  02110-1301, USA.