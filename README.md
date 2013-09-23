ZendSlug
============================
Version 1.0

Installation
------------
For the installation uses composer [composer](http://getcomposer.org "composer - package manager").

```sh
php composer.phar require  zendslug/zendslug:dev-master
```

Post Installation
------------
Configuration:
- Add the module of `config/application.config.php` under the array `modules`, insert `ZendSlug`
- Create a file named `slug.global.php` under `config/autoload/`. 
- Add the following lines to the file you just created and chouse your separator:

```php
<?php
return array(
    'zendslug' => array(
        'separator' => '-'
    )
);
```

Example
=====================================

Set your separator:
------------
```php
$this->ZendSlug()->create(array(
    'separator' => '_', //optional
    'title' => 'this is my slug'
));
```
```html
this_is_my_slug
```

Default separator (get from slug.global.php):
------------
```php
$this->ZendSlug()->create(array(
    'title' => 'this is my slug'
));
```
```html
this-is-my-slug
```
