SOBLOSSOM
=========

###### Last updated on 2014.8.10
###### Author: [Piet Bos](https://github.com/senlin)

SOBLOSSOM is a starter framework that is based on [Foundation](http://foundation.zurb.com) (5.3.3 at time of writing) on the frontend and [Underscores.me](http://underscores.me) on the backend. 

Early August 2014 I have completely reorganised SOBLOSSOM and actually looked quite close at how [JointsWP](http://jointswp.com/) (another awesome Foundation 5 WordPress theme) does things under the hood. Therefore no specific accreditation for every line I copied, but a more general accredition: Thanks [Jeremy](http://twitter.com/jeremyenglert)!

To add your own functions and filters to the theme and at the same time to ensure portability if you ever want to switch themes, I have included an empty `functionality.php` file that you will find in the `soblossom/inc/` folder. Of course you can also get rid of that file and start hacking away in the `inc/soblossom.php` file or any of the other files that add functionality to the theme.

### Featured Images

All Featured Images, for example those on a Single Post, come with the builtin Foundation lightbox effect (called clearing thumbs). Also builtin is Foundation Interchange. The main advantage of this is that the image shown (AND loaded) is different per device: thumbs for small devices, medium sized images for tablets and laptops and the large image for everything wider than 1280px. You can customise the code by adding your own image sizes and call those instead.

### Gallery Shortcode

For the soblossom theme we have completely overhauled the default WordPress Gallery shortcode. You won't find any inline styling either. We have replaced the functionality with [Foundation Blockgrid](http://foundation.zurb.com/docs/components/block_grid.html) **and** clearing lightbox so you won't need an additional plugin for that either.
By default the blockgrid shows `small-block-grid-2 medium-block-grid-3 large-block-grid-4`, which means that on small devices (up to 640px wide) it shows 2 thumbs; on medium devices (640-1024px wide) it shows 3 thumbs and on large devices (anything over 1024px) it will show 4 thumbs. Clicking on a thumb will show the [Foundation Clearing](http://foundation.zurb.com/docs/components/clearing.html) effect.
If you want to adjust anything, you can do so in `inc/classes/gallery.php` and the `scss/_gallery.scss` files.

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
