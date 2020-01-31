# Laravel Algolia

![laravel-algolia](https://user-images.githubusercontent.com/499192/27283300-e580180a-54f3-11e7-94bb-288c6df2834a.png)

> An [Algolia](https://www.algolia.com/) bridge for Laravel.

```php
// Search.
$algolia->search('marty mcfly');

// List indexes.
$algolia->listIndices();

// Want to use the facade?
Algolia::isAlive();
```

[![Build Status](https://badgen.net/travis/vinkla/laravel-algolia/master)](https://travis-ci.org/vinkla/laravel-algolia)
[![Coverage Status](https://badgen.net/codecov/c/github/vinkla/laravel-algolia)](https://codecov.io/github/vinkla/laravel-algolia)
[![Total Downloads](https://badgen.net/packagist/dt/vinkla/algolia)](https://packagist.org/packages/vinkla/algolia)
[![Latest Version](https://badgen.net/github/release/vinkla/algolia)](https://github.com/vinkla/algolia/releases)
[![License](https://badgen.net/packagist/license/vinkla/algolia)](https://packagist.org/packages/vinkla/algolia)

## Installation
Require this package, with [Composer](https://getcomposer.org/), in the root directory of your project.

```bash
$ composer require vinkla/algolia
```

## Configuration

Laravel Algolia requires connection configuration. To get started, you'll need to publish all vendor assets:

```bash
$ php artisan vendor:publish
```

This will create a `config/algolia.php` file in your app that you can modify to set your configuration. Also, make sure you check for changes to the original config file in this package between releases.

#### Default Connection Name

This option `default` is where you may specify which of the connections below you wish to use as your default connection for all work. Of course, you may use many connections at once using the manager class. The default value for this setting is `main`.

#### Algolia Connections

This option `connections` is where each of the connections are setup for your application. Example configuration has been included, but you may add as many connections as you would like.

## Usage

Here you can see an example of you may use this package. Out of the box, the default adapter is `main`. After you enter your authentication details in the config file, it will just work:

```php
// You can alias this in config/app.php.
use Vinkla\Algolia\Facades\Algolia;

// We're done here - how easy was that, it just works!
Algolia::initIndex('contacts');

// This example is simple and there are far more methods available.
Algolia::getLogs();
```

The manager will behave like it is a `Algolia\AlgoliaSearch\SearchClient` class. If you want to call specific connections, you can do that with the connection method:

```php
use Vinkla\Algolia\Facades\Algolia;

// Writing this...
Algolia::connection('main')->initIndex('contacts');

// ...is identical to writing this
Algolia::initIndex('contacts');

// and is also identical to writing this.
Algolia::connection()->initIndex('contacts');

// This is because the main connection is configured to be the default.
Algolia::getDefaultConnection(); // This will return main.

// We can change the default connection.
Algolia::setDefaultConnection('alternative'); // The default is now alternative.
```

If you prefer to use dependency injection over facades, then you can inject the manager:

```php
use Vinkla\Algolia\AlgoliaManager;

class Foo
{
    protected $algolia;

    public function __construct(AlgoliaManager $algolia)
    {
        $this->algolia = $algolia;
    }

    public function bar()
	{
        $this->algolia->initIndex('friends');
    }
}

App::make('Foo')->bar();
```

For more information on how to use the `Algolia\AlgoliaSearch\SearchClient` class, check out the docs at [`algolia/algoliasearch-client-php`](https://github.com/algolia/algoliasearch-client-php).

## License

[MIT](LICENSE) © [Vincent Klaiber](https://doubledip.se)
