# yii2-seo-page

## Installation

### Install Using Composer

The preferred way to install this extension is through [composer](http://getcomposer.org/download/).

Either run

```
$ php composer.phar require humanized/yii2-seopage "*"
```

or add

```
"humanized/yii2-seopage": "*"
```

to the ```require``` section of your `composer.json` file.


### Run Migrations 

```bash
$ php yii migrate/up --migrationPath=@vendor/humanized/yii2-seo-page/migrations
```


### Edit Configuration File

Add following lines to the configuration file:

```php
'modules' => [
    'page' => [
        'class' => 'humanized\seopage\Module',
    ],
],
```

Adding these lines allows access to the various interfaces provided by the module. 
Here, the chosen module-name is seopage, as such the various routes will be available at page/controller-id/action-id, though any module-name can be chosen.
