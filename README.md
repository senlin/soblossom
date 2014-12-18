soblossom WordPress theme
=========

###### Last updated on 2014.12.18
###### Foundation version 5.5.0
###### [DEMO SITE](http://so-wp.com/themes/soblossom/)
###### Author: [Piet Bos](https://github.com/senlin)

soblossom is a WordPress starter theme that is based on [Foundation](http://foundation.zurb.com) on the frontend and [Underscores sass](http://underscores.me) on the backend. 

We first started developing soblossom in 2013 under a few different names (with Foundation 3 and 4). Then when Foundation 5 was released, instead of updating the lot, we started over and in August 2014 we went through another of those quite extreme makeovers/reorganisations...

## Built in Features

### Navigation

The default mobile navigation is with the off canvas. We have kept the navigation as flexible as possible though, so you can also choose the "conventional" topbar navigation (where the menu slides down) or any variation you might think of.

soblossom also comes with a footer navigation menu and a social media menu which comes with an iconfont walker (`inc/walkers/iconfont-walker.php`) that has the [FontAwesome](https://fontawesome.io/) font-icon-set integrated.

### Featured Images

All Featured Images, for example those on a Single Post, come with the builtin [Foundation Interchange](http://foundation.zurb.com/docs/components/interchange.html). The main advantage of this is that the image shown (AND loaded) is different per device: medium sized for small devices, tablets and laptops and the large image for everything wider than 1280px. You can customise the code by adding your own image sizes and call those instead. The function that deals with this is the `soblossom_featured_image()` function on lines 278-313 of `inc/soblossom.php`.

### Gallery Shortcode

For the soblossom theme we have completely overhauled the default WordPress Gallery shortcode. You won't find any inline styling either. We have replaced the functionality with [Foundation Blockgrid](http://foundation.zurb.com/docs/components/block_grid.html) **and** [Foundation Clearing Thumbs](http://foundation.zurb.com/docs/components/clearing.html), which shows the images with a cool lightbox effect, so you won't need an additional plugin for that either.
By default the blockgrid shows `small-block-grid-2 medium-block-grid-3 large-block-grid-4`, which means that on small devices (up to 640px wide) it shows 2 thumbs; on medium devices (640-1024px wide) it shows 3 thumbs and on large devices (anything over 1024px) it will show 4 thumbs. Clicking on a thumb will show the Foundation Clearing effect.
If you want to adjust anything, you can do so in `inc/classes/gallery.php` and the `scss/_gallery.scss` files.
Showing your galleries this way means that whatever you choose as amount of columns in the WordPress interface will have no effect on the frontend. That is the "price you pay" for awesomeness. Of course you can remove the function and let WordPress do it its own way too.

### Other Foundation Features

Foundation comes packed with features and although we have not actively implemented all of them, they are all readily available to you. You can ready all about them via the [Foundation Documentation](http://foundation.zurb.com/docs/). Check out the [demo](http://so-wp.com/themes/soblossom) where we show a few more things that are possible.

### Functions

We have tried to keep most of the functions together. The main `functions.php` file in the theme root is where we do all the inclusions of other files as well as registering the 3 navigation menus and the 2 widget areas.
Then there is the `inc/soblossom.php` file, the core functions file and without it the blossom cannot bloom :)
The rest of the functions files you can find in the `inc/functions` folder. There are the `dashboard-functions.php` for functions and filters that have to do with the admin or backend of the site, there are sample `cmb.php` and `cpt.php` files for Custom Meta Boxes and Custom Post Types resp. and you will also find the `functionality.php` file in the `inc/functions` folder. 
The purpose of this file is to add your own functions and filters to the theme and at the same time to ensure portability if you ever want to switch themes. Of course you can also get rid of that file and start hacking away in the `inc/soblossom.php` file or any of the other files that add functionality to the theme.

### Page Templates

Apart from the default ones, soblossom comes with 4 additional page templates. One is the full width template. Two are based on [Foundation templates](http://foundation.zurb.com/templates.html), Banded and Workspace. There is also a sample template which you can use to build a new template from/on.

The [homepage of the demo site](http://so-wp.com/themes/soblossom/) uses the banded template, so you can have a look and decide whether you can use that on your own site(s) too.

In the `templates` folder you can find these 4 page templates.

### Plugins

The soblossom theme comes optimised for the following plugins:

* [Formidable Pro](http://senl.in/FormidablePro) (aff.link) - turn off the CSS output of the plugin to fully enjoy the Foundation Forms styling
* [Gravity Forms](http://senl.in/gRaVitY) (aff.link) - turn off the CSS output of the plugin to fully enjoy the Foundation Forms styling
* [Meta Box](http://wordpress.org/plugins/meta-box/) - the `inc/functions/cmb.php` file has been generated with the [demo code](github.com/rilwis/meta-box/blob/master/demo/demo.php) of this plugin.
* [WordPress SEO](http://wordpress.org/plugins/wordpress-seo/) - title tags in the head section, breadcrumb code already added, admin columns removed via filter in `inc/functions/dashboard-functions.php`
* [WPML](http://senl.in/getwpml) (aff.link) - language code is added to the body class if WPML is active (filter in `inc/soblossom.php`)

## Credits

Nowadays there are plenty of WordPress themes built on Foundation and we have looked at a few of them: [Reverie](https://github.com/milohuang/reverie) by [Zhen Huang](https://github.com/milohuang), [WPForge](http://wpforge.themeawesome.com/) by [Thomas Vasquez](https://twitter.com/tsquez) and last but not least [JointsWP](http://jointswp.com/) by [Jeremy Englert](http://twitter.com/jeremyenglert). Thanks all for your guidance, tips and inspiration!

## License

* License: GNU Version 2 or Any Later Version
* License URI: http://www.gnu.org/licenses/gpl-2.0.html

## Donations

* Donate link: [http://so-wp.com/donations](http://so-wp.com/donations)

## Connect with me through

[Github](https://github.com/senlin) 

[Google+](http://plus.google.com/+PietBos) 

[WordPress](http://profiles.wordpress.org/senlin/) 

[Website](http://senlinonline.com)

## Changelog

### 141112

* update to Foundation 5.4.7

### 141016

* update to Foundation 5.4.6
* move comments styling to its own sheet
* fix typo on comments.php
* add selection styling

### 140825

* update to Foundation 5.4.0
* remove function "Remove Query strings from Static Resources" as number of caching plugins already have that builtin
* rewrite inclusion print stylesheet
* add #link to off-canvas-toggle to enable for iOS

### 140822

* update readme.md
* add page templates banded and workspace

### 140820

* more tweaking

### 140819

* nth overhaul, but we're getting somewhere now

### 140810

* complete theme overhaul; many parts reorganised

### 140804

* integrate latest changes from _s

### 140526

* massive theme overhaul with lots of additional function (as I commited too fast, you can see the changes to all files where it says "add gitignore")

### 140315

* changed arrows of continue reading, next/previous post/posts/pages into Font Awesome long arrows
* clean up

### 2014.1.24

* initial commit
