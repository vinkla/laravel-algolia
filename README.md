Laravel Algolia
===============

![image](https://raw.githubusercontent.com/vinkla/vinkla.github.io/master/images/laravel-algolia.png)

Laravel [Algolia](https://www.algolia.com/) is a [Algolia](https://www.algolia.com/) bridge for Laravel 5 using the [official Algolia Search API package](https://github.com/algolia/algoliasearch-client-php).

[![Build Status](https://img.shields.io/travis/vinkla/algolia/master.svg?style=flat)](https://travis-ci.org/vinkla/algolia)
[![StyleCI](https://styleci.io/repos/32227759/shield?style=flat)](https://styleci.io/repos/32227759)
[![Latest Stable Version](http://img.shields.io/packagist/v/vinkla/algolia.svg?style=flat)](https://packagist.org/packages/vinkla/algolia)
[![License](https://img.shields.io/packagist/l/vinkla/algolia.svg?style=flat)](https://packagist.org/packages/vinkla/algolia)

## Installation
Require this package, with [Composer](https://getcomposer.org/), in the root directory of your project.

```bash
composer require vinkla/algolia:~1.0
```

Add the service provider to ```config/app.php``` in the `providers` array.

```php
'Vinkla\Algolia\AlgoliaServiceProvider'
```

If you want you can use the [facade](http://laravel.com/docs/facades). Add the reference in ```config/app.php``` to your aliases array.

```php
'Algolia' => 'Vinkla\Algolia\Facades\Algolia'
```

## Configuration

More documentation coming soon…
