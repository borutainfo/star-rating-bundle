StarRatingBundle
================

This is a fork of the `blackknight467` and `brokoskokoli` StarRatingBundle and support Symfony 6 and 7!


Sample Output
=============

![alt tag](https://s3-us-west-2.amazonaws.com/derick-misc/StarRating.png)

Installation
============

### Step 1: Download the StarRatingBundle

***Using Composer***

Add the following to the "require" section of your `composer.json` file:

```
    "boruta/star-rating-bundle": "1.*"
```

### Step 2: Enable the bundle

Enable the bundle in the kernel:

```php
<?php
// app/appKernel.php

public function registerBundles()
{
    $bundles = array(
        // ...
        new Boruta\StarRatingBundle\StarRatingBundle(),
    );
}
```

Add the config for TWIG:

```yaml 
twig:
    paths:
        '%kernel.project_dir%/vendor/boruta/star-rating-bundle/Resources/views': BrokoskokoliStarRatingBundle
```

### Step 3: Add the css

Add the css in your page head

```
  <link rel="stylesheet" type="text/css" href="{{ asset('bundles/starrating/css/rating.css') }}" />
```
or
```
	{% stylesheets
      'bundles/starrating/css/rating.css'
      filter="cssrewrite" %}
      <link href="{{ asset_url }}" rel="stylesheet" type="text/css" />
    {% endstylesheets %}
```

### Step 4: Add the js

Add the javascript to your page head
```
    <!-- make sure that jquery is included --!>
    <script src="//ajax.googleapis.com/ajax/libs/jquery/2.0.3/jquery.min.js"></script>
    <script src="{{ asset('bundles/starrating/js/rating.js') }}"></script>
```
or
```
    <!-- make sure that jquery is included --!>
    <script src="//ajax.googleapis.com/ajax/libs/jquery/2.0.3/jquery.min.js"></script>
	{% javascripts
      '@StarRatingBundle/Resources/public/js/rating.js' %}
      <script src="{{ asset_url }}"></script>
    {% endjavascripts %}
```

Usage
=====

### In a Form

```php
<?php
    // ...
    $builder->add('rating', RatingType::class, [
    	'label' => 'Rating'
    ]);
    // ...
```
or for a custom rating scale:
```php
<?php
    // ...
    $builder->add('rating', RatingType::class, [
    	//...
    	'stars' => 4,
    	//...
    ]);
    // ...
```

### Display in a twig template using the rating filter
```
    // ...
    {{ someInteger|rating }}
    // ...
```

or if you are not using a 5 star scale
```
{{ someInteger|rating(4) }}
```

if you want to use the [font awesome icon sizes](http://fortawesome.github.io/Font-Awesome/examples/#larger)
```
{{ someInteger|rating(5, "fa-3x") }}
```
If you want the smallest size use "fa-norm" (in font awesome, this would be the same as not providing an size class); providing no size argument sets the font size to 25px which is somewhere in between "fa-lg" and "fa-2x".
To customize the size, feel free to override the css.

License
=======
This bundle is under the MIT license. See the complete license in the bundle:
    LICENSE
