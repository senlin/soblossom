soblossom WordPress theme
=========

###### Version 1.6.2
###### Last updated on 2015.08.13
###### Foundation version 5.5.2
###### FontAwesome version 4.4.0
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
* [Yoast SEO](http://wordpress.org/plugins/wordpress-seo/) - title tags in the head section, breadcrumb code already added
* [WPML](http://senl.in/getwpml) (aff.link) - language code is added to the body class if WPML is active (filter in `inc/soblossom.php`)

## Languages

In the languages folder you will find the `soblossom.pot` file and any translations that have been completed. To help us translate soblossom in your language, you can do as follows:

* Help translate soblossom using [Transifex](https://www.transifex.com/projects/p/soblossom/)
* Fork soblossom on Github, locally open the pot file with PO Edit, translate the file into your language and send us a Pull Request on Github

All contributions naturally receive credits here in the readme file.

2014.12.27 - Dutch added - by [Piet Bos](http://senlinonline.com)

## Font Awesome

Since v1.5.1 we are loading the Font Awesome icon font via Bower. This means that you don't need to separately enqueue it anymore which saves a call to an external source. We have added two lines to the main scss file (`scss/style.scss` line 25-26). If you don't want to use it, you can just remove the lines and even delete the fontawesome folder from the `bower_components` if you want.

Sometimes it seems that FontAwesome doesn't update when running `bower update`. If that is the case, then running `bower install --save fontawesome` might do the trick [source](https://discourse.roots.io/t/installing-font-awesome-using-bower-grunt/1907)

## Grunt

If you're new to Grunt, then we would like to suggest to start off by reading [this amazing article](http://24ways.org/2013/grunt-is-not-weird-and-hard/) by Chris Coyier.

As a quick reminder (if only for ourselves) to start a new project you will first need to install everything:

* start with installing Foundation according to [the Get Started instructions over at Zurb](http://foundation.zurb.com/docs/sass.html)
* then copy over everything from this Repo into your new project (overwrite everything except the `bower_components` and the `node_modules` folders and don't forget to remove the `.git`folder that comes with the Foundation install)
* when Foundation is installed the grunt-sass and grunt-contrib-watch tasks are already installed, so you don't have to install those anymore
* grunt-contrib-concat: `$ npm install grunt-contrib-concat --save-dev`
* grunt-contrib-uglify: `$ npm install grunt-contrib-uglify --save-dev`
* grunt-wp-i18n: `$ npm install grunt-wp-i18n --save-dev`

For LiveReload to work, you will need to [install the browser extension](http://feedback.livereload.com/knowledgebase/articles/86242-how-do-i-install-and-use-the-browser-extensions-) for the browser you use for your dev work.

Included is a sample Gruntfile.js that you can use as a start.

### Can I also use soblossom without Grunt?

Yes, of course you can! Then you can just ignore all the stuff about Grunt. At the top of the `soblossom_scripts()` function, which enqueues the styles and scripts, you can find an explanation and an alternative. You can find this function in the `inc/soblossom.php` file.
## Credits

Nowadays there are plenty of WordPress themes built on Foundation and we have looked at a few of them: [Reverie](https://github.com/milohuang/reverie) by [Zhen Huang](https://github.com/milohuang), [Required+](https://github.com/wearerequired/required-foundation) (discontinued) by [Required+](http://required.ch/who-we-are/), [WPForge](http://wpforge.themeawesome.com/) by T. Vasquez and last but not least [JointsWP](http://jointswp.com/) by [Jeremy Englert](http://twitter.com/jeremyenglert). Thanks all for your guidance, tips and inspiration!

## License

* License: GNU Version 2 or Any Later Version
* License URI: http://www.gnu.org/licenses/gpl-2.0.html

## Donations

* Donate link: [http://so-wp.com/donations](http://so-wp.com/donations)

## Connect with me through

[Github](https://github.com/senlin) 

[LinkedIn](https://www.linkedin.com/in/pietbos) 

[WordPress](https://profiles.wordpress.org/senlin/) 

[Google+](https://plus.google.com/+PietBos) 

[Website](http://senlinonline.com)

## Changelog

### 1.6.2 (date 2015.08.13)

* add alternative enqueueing of scripts/styles together with better documentation for if people want to use something other than Grunt.

### 1.6.1 (date 2015.08.08)

* revert to [semantic versioning](http://semver.org)
* update to FontAwesome 4.4.0
* remove functions related to removing parts of the Yoast SEO plugin. Instead install our own [SO Clean Up Yoast SEO](https://wordpress.org/plugins/so-clean-up-wp-seo/) plugin.

### 1.6.0 (date 2015.05.24)

* add adminbar specific styling, see scss/_adminbar.scss
* change footer copyright text (replace back to top link with sitename/link)
* add script for back to top transition
* add script that removes sometimes conflicting body class of f-topbar-fixed

### 1.5.2 (date 2015.05.04)

* update to Foundation 5.5.2

### 1.5.1 (date 2015.02.08)

* include Font Awesome icon font via Bower

### 1.5.0 (date 2015.02.05)

* switch to Grunt

### 1.4.1 (date 2015.02.02)

* update to Foundation 5.5.1
* update to FontAwesome 4.3.0
* add missing div in soblossom_featured_image() function
* adjust $content_width to 970px

### 1.4.0 (date 2015.01.11)

* address [issues #2-#18](https://github.com/senlin/soblossom/issues?q=is%3Aissue+is%3Aclosed) by [Emil Uzelac](https://github.com/emiluzelac) after his official [Theme Review](http://themereview.co/theme-reviews-as-a-service/)

### 1.3.1 (date 2014.12.27)

* complete Dutch translation

### 1.3.0 (date 2014.12.18)

* update to Foundation 5.5.0

### 1.2.2 (date 2014.1112)

* update to Foundation 5.4.7

### 1.2.1 (date 2014.1016)

* update to Foundation 5.4.6
* move comments styling to its own sheet
* fix typo on comments.php
* add selection styling

### 1.2.0 (date 2014.08.25)

* update to Foundation 5.4.0
* remove function "Remove Query strings from Static Resources" as number of caching plugins already have that builtin
* rewrite inclusion print stylesheet
* add #link to off-canvas-toggle to enable for iOS

### 1.1.0 (date 2014.08.22)

* update readme.md
* add page templates banded and workspace

### 1.0.1 (date 2014.08.20)

* more tweaking

### 1.0.0 (date 2014.08.19)

* nth overhaul, but we're getting somewhere now

### 0.3.0 (date 2014.08.10)

* complete theme overhaul; many parts reorganised

### 0.2.1 (date 2014.08.04)

* integrate latest changes from _s

### 0.2.0 (date 2014.05.26)

* massive theme overhaul with lots of additional function (as I commited too fast, you can see the changes to all files where it says "add gitignore")

### 0.1.1 (date 2014.03.15)

* changed arrows of continue reading, next/previous post/posts/pages into Font Awesome long arrows
* clean up

### 0.1.0 (date 2014.01.24)

* initial commit
