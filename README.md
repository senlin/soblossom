soblossom WordPress theme
=========

###### Last updated on 2014.8.19
###### Author: [Piet Bos](https://github.com/senlin)

soblossom is a WordPress starter framework that is based on [Foundation](http://foundation.zurb.com) (5.3.3 at time of writing) on the frontend and [Underscores sass](http://underscores.me) on the backend. 

We first started developing soblossom in 2013 under a few different names (with Foundation 3 and 4). Then when Foundation 5 was released, instead of updating the lot, we started over and in August 2014 we went through another of those quite extreme makeovers/reorganisations...

## Built in Features

### Navigation

The default mobile navigation is with the off canvas. We have kept the navigation as flexible as possible though, so you can also choose the "conventional" topbar navigation (where the menu slides down) or any variation you might think of.

soblossom also comes with a footer navigation menu and a social media menu which comes with an iconfont walker (`inc/walkers/iconfont-walker.php`) that has the [FontAwesome](https://fontawesome.io/) font-icon-set integrated.

### Featured Images

All Featured Images, for example those on a Single Post, come with the builtin [Foundation Clearing Thumbs]((http://foundation.zurb.com/docs/components/clearing.html)) (lightbox effect). Also builtin is [Foundation Interchange](http://foundation.zurb.com/docs/components/interchange.html). The main advantage of this is that the image shown (AND loaded) is different per device: thumbs for small devices, medium sized images for tablets and laptops and the large image for everything wider than 1280px. You can customise the code by adding your own image sizes and call those instead. The function that deals with this is the `soblossom_featured_image()` function on lines 278-313 of `inc/soblossom.php`.

### Gallery Shortcode

For the soblossom theme we have completely overhauled the default WordPress Gallery shortcode. You won't find any inline styling either. We have replaced the functionality with [Foundation Blockgrid](http://foundation.zurb.com/docs/components/block_grid.html) **and** clearing lightbox so you won't need an additional plugin for that either.
By default the blockgrid shows `small-block-grid-2 medium-block-grid-3 large-block-grid-4`, which means that on small devices (up to 640px wide) it shows 2 thumbs; on medium devices (640-1024px wide) it shows 3 thumbs and on large devices (anything over 1024px) it will show 4 thumbs. Clicking on a thumb will show the Foundation Clearing effect.
If you want to adjust anything, you can do so in `inc/classes/gallery.php` and the `scss/_gallery.scss` files.

### Other Foundation Features

Foundation comes packed with features and although we have not actively implemented all of them, they are all readily available to you. You can ready all about them via the [Foundation Documentation](http://foundation.zurb.com/docs/).

### Functions

We have tried to keep most of the functions together. The main `functions.php` file in the theme root is where we do all the inclusions of other files as well as registering the 3 navigation menus and the 2 widget areas.
Then there is the `inc/soblossom.php` file, the core functions file and without it the blossom cannot bloom :)
The rest of the functions files you can find in the `inc/functions` folder. There are the `dashboard-functions.php` for functions and filters that have to do with the admin or backend of the site, there are sample `cmb.php` and `cpt.php` files for Custom Meta Boxes and Custom Post Types resp. and you will also find the `functionality.php` file in the `inc/functions` folder. 
The purpose of this file is to add your own functions and filters to the theme and at the same time to ensure portability if you ever want to switch themes. Of course you can also get rid of that file and start hacking away in the `inc/soblossom.php` file or any of the other files that add functionality to the theme.

### Plugins

The soblossom theme comes optimised for the following plugins:

* [Gravity Forms](http://senl.in/gRaVitY) (aff.link) - turn off the CSS output of the plugin to fully enjoy the Foundation Forms styling
* [Meta Box](http://wordpress.org/plugins/meta-box/) - the `inc/functions/cmb.php` file has been generated with the [demo code](github.com/rilwis/meta-box/blob/master/demo/demo.php) of this plugin.
* [WordPress SEO](http://wordpress.org/plugins/wordpress-seo/) - title tags in the head section, breadcrumb code already added, admin columns removed via filter in `inc/functions/dashboard-functions.php`
* [WPML](http://senl.in/WPMLorg) (aff.link) - language code is added to the body class if WPML is active (filter in `inc/soblossom.php`)

## Credits

Nowadays there are plenty of WordPress themes built on Foundation and we have looked at a few of them: [Reverie](https://github.com/milohuang/reverie) by [Zhen Huang](https://github.com/milohuang), [WPForge](http://wpforge.themeawesome.com/) by [Thomas Vasquez](https://twitter.com/tsquez) and last but not least [JointsWP](http://jointswp.com/) by [Jeremy Englert](http://twitter.com/jeremyenglert). Thanks all for your guidance, tips and inspiration!

## License

* License: GNU Version 2 or Any Later Version
* License URI: http://www.gnu.org/licenses/gpl-2.0.html

## Donations

* Donate link: http://so-wp.com/donations

## Connect with me through

[Github](https://github.com/senlin) 

[Google+](http://plus.google.com/+PietBos) 

[WordPress](http://profiles.wordpress.org/senlin/) 

[Website](http://senlinonline.com)

## Changelog

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
