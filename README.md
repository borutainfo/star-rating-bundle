StarRatingBundle
================

This is an improved fork of the StarRatingBundle from _blackknight467_ and _brokoskokoli_ modified for support of Symfony 7!

Sample Output
=============

![alt tag](https://s3-us-west-2.amazonaws.com/derick-misc/StarRating.png)

Installation
============

### Step 1: Download the StarRatingBundle

***Using Composer***

Install package using Composer:
```bash
composer require boruta/star-rating-bundle
```

### Step 2: Enable the bundle

Enable the bundle in your project (this can be done automatically):

```php
<?php
// config/bundles.php

return [
    // ...
    Boruta\StarRatingBundle\StarRatingBundle::class => ['all' => true],
];
```
### Step 3: Config Twig views

Add the Twig config into `config/packages/twig.yaml`:

```yaml 
twig:
    paths:
        '%kernel.project_dir%/vendor/boruta/star-rating-bundle/Resources/views': BorutaStarRatingBundle
```

### Step 4: Add the CSS

Add the CSS in your page head:

```
<link rel="stylesheet" type="text/css" href="{{ asset('bundles/starrating/css/rating.css') }}" />
```

### Step 5: Add the JS

Add the rating script to your page head:
```
<script src="{{ asset('bundles/starrating/js/rating.js') }}"></script>
```
and also JQuery if you don't use it already:
```
<script src="https//ajax.googleapis.com/ajax/libs/jquery/2.0.3/jquery.min.js"></script>
```

### Step 6: Install Font Awesome

Install Font Awesome (i.e. using [NPM](https://www.npmjs.com/package/font-awesome)).

Usage
=====

### In a Symfony Forms

```php
<?php
    // ...
    $builder->add('rating', StarRatingType::class, [
    	'label' => 'Rating'
    ]);
    // ...
```
or for a custom rating scale:
```php
<?php
    // ...
    $builder->add('rating', StarRatingType::class, [
    	//...
    	'stars' => 4,
    	//...
    ]);
    // ...
```

### Display in a Twig template using the rating filter
```
{{ someInteger|rating }}
```

or if you are not using a 5 stars scale
```
{{ someInteger|rating(4) }}
```

if you want to use the [font awesome icon sizes](http://fortawesome.github.io/Font-Awesome/examples/#larger)
```
{{ someInteger|rating(5, "fa-3x") }}
```
If you want the smallest size use "fa-norm" (in font awesome, this would be the same as not providing a size class); providing no size argument sets the font size to 25px which is somewhere in between "fa-lg" and "fa-2x".
To customize the size, feel free to override the css.

License
=======
This bundle is under the MIT license. See the complete license in the bundle: LICENSE
