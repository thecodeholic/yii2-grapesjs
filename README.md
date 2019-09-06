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
    'grapesjs' => [
        'class' => \thecodeholic\yii2grapesjs\Module::class,
        // custom placeholder variables which will be added into richtext
        // default is empty array
        'grapesJsVariables' => [
            '{first_name}' => 'First Name',
            '{last_name}' => 'Last Name',
            '{age}' => 'Age',
        ]
    ],
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

Using the widget in your own controller
---------------------------------------
If you do not want to use the module and integrate in your controller, you should add `JsonParser` in request parser's.

```php
'request' => [
    'parsers' => [
        'application/json' => 'yii\web\JsonParser',
    ]
]
```

Display the widget in your view file.

```php
<?php echo \thecodeholic\yii2grapesjs\widgets\GrapesjsWidget::widget([
    'clientOptions' => [
        'storageManager' => [
            'id' => '',
            'type' => 'remote',
            'stepsBeforeSave' => 1,
            'urlStore' => "save?id=$model->id",
            'urlLoad' => "get?id=$model->id",
        ],
        'assetManager' => [
            'upload' => "upload"
        ],
        'deviceManager' => [
            'defaultDevice' => 'Resolution 2',
            'devices' => [
                [
                    'name' => 'Resolution 1',
                    'width' => '850px',
                    'widthMedia' => '992px'
                ],
                [
                    'name' => 'Resolution 2',
                    'width' => '750px',
                ],
                [
                    'name' => 'Resolution 3',
                    'width' => '650px'
                ],
                [
                    'name' => 'Resolution 4',
                    'width' => '450px',
                ],
                [
                    'name' => 'Resolution 5',
                    'width' => '375px',
                ]
            ]
        ]
    ],
    // custom placeholder variables which will be added into richtext
    // default is empty array
    'variables' => [
        '{first_name}' => 'First Name',
        '{last_name}' => 'Last Name',
        '{age}' => 'Age',
    ]
]) ?>
```

Add the following actions to your controller.

```php
public function actions()
{
    return array_merge(parent::actions(), [
        'get' => [
            'class' => \thecodeholic\yii2grapesjs\actions\GetAction::class,
            // If includeFields is presented `excludeFields` are not considered
            // 'includeFields' => ['css', 'html'],
            // Exclude assets column from returned fields of the Content model
            'excludeFields' => ['assets']
        ],
        'save' => \thecodeholic\yii2grapesjs\actions\SaveAction::class,
        'upload' => \thecodeholic\yii2grapesjs\actions\UploadAction::class
    ]);
}
```

