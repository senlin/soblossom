SOBLOSSOM
=========

###### Last updated on 2014.8.17
###### Author: [Piet Bos](https://github.com/senlin)

SOBLOSSOM is a starter framework that is based on [Foundation](http://foundation.zurb.com) (5.3.3 at time of writing) on the frontend and [Underscores.me](http://underscores.me) on the backend. 

Early August 2014 I have completely reorganised SOBLOSSOM and actually looked quite close at how [JointsWP](http://jointswp.com/) (another awesome Foundation 5 WordPress theme) does things under the hood. Therefore no specific accreditation for every line I copied, but a more general accredition: Thanks [Jeremy](http://twitter.com/jeremyenglert)!

To add your own functions and filters to the theme and at the same time to ensure portability if you ever want to switch themes, I have included an empty `functionality.php` file that you will find in the `soblossom/inc/` folder. Of course you can also get rid of that file and start hacking away in the `inc/soblossom.php` file or any of the other files that add functionality to the theme.

### Featured Images

All Featured Images, for example those on a Single Post, come with the builtin Foundation lightbox effect (called clearing thumbs). Also builtin is Foundation Interchange. The main advantage of this is that the image shown (AND loaded) is different per device: thumbs for small devices, medium sized images for tablets and laptops and the large image for everything wider than 1280px. You can customise the code by adding your own image sizes and call those instead.


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

### 140817

* start from scratch
