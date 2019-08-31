Grapesjs AssetBundle and widgets
================================
Grapesjs AssetBundle, widgets and module

Installation
------------

The preferred way to install this extension is through [composer](http://getcomposer.org/download/).

Either run

```
php composer.phar require --prefer-dist thecodeholic/yii2-grapesjs "^v0.1.0"
```

or add

```
"thecodeholic/yii2-grapesjs": "^v0.1.0"
```

to the require section of your `composer.json` file.


Configuration
-----

Once the module is installed, you need to run migrations:

```php
php yii migrate --migrationPath=@vendor/thecodeholic/yii2-grapesjs/migrations
```

And add module in your config `modules`

```php
'modules' => [
    'grapesjs' => \thecodeholic\yii2grapesjs\Module,
    ...
]
```

Configuring AssetManager
------------------------
The package uses `Yii::$app->fs` so you need to configure `fs` component to be one of the available 
targets of `creocoder\flysystem`

Checkout its documentation if you want to specify different targets
https://github.com/creocoder/yii2-flysystem

And you need to install your desired target.

For example
```php
composer require creocoder/yii2-flysystem
```

