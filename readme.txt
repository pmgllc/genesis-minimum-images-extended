=== Genesis Minimum Image Extended ===
Contributors: peterdog, fatmedia, Nick_theGeek, kraftbj
Donate link: https://www.paypal.com/cgi-bin/webscr?cmd=_s-xclick&hosted_button_id=TJUUYJPMN6SGQ
Tags: genesis, minimum
Requires at least: 3.3
Tested up to: 3.5
Stable tag: 0.1.2

Allows for changing the "banner" image in Minimum 2.0 posts to not be the featured image.

== Description ==

Allows for changing the "banner" image in Minimum 2.0 posts to not be the featured image. There are times you won't want the banner image for a post to be the featured image due to aspect ratios or simply wanting them to be different images for the blog index, homepage thumbnails, Facebook, Pinterest, etc.

This is intended for the child theme Minimum 2.0 for the Genesis framework. We plan on expanding the child themes and functionality as it evolves and StudioPress releases more themes that use featured images to enhance the design but where developers and users may want extended options.

== Installation ==

1. Upload contents of the directory to /wp-content/plugins/ (or use the automatic installer)
1. Activate the plugin through the 'Plugins' menu in WordPress
1. In any post or page, upload an image in the new Minimum Image metabox.
1. Verify it works!

== Frequently Asked Questions ==

= Does this work with child themes other than Minimum 2.0? =

Not yet, but we're working on code for that.

= What, exactly does it do, again? =

Let's say you've made a beautiful "banner" image for a post that measures 1600x200px and made it the post's featured image so it appears below the header. Then you go to your homepage or blog index page and see a sliver of an image that is, say, 300x38px. That's because the banner image is the featured image and the featured images are used elsewhere. With an extreme aspect ratio like that, it messes up thumbnails.

== Screenshots ==

1. This screen shot description corresponds to screenshot-1.(png|jpg|jpeg|gif). Note that the screenshot is taken from
the /assets directory or the directory that contains the stable readme.txt (tags or trunk). Screenshots in the /assets 
directory take precedence. For example, `/assets/screenshot-1.png` would win over `/tags/4.3/screenshot-1.png` 
(or jpg, jpeg, gif).

== Changelog ==

= 0.1.2 =
* added FAQ
* added screenshots
* added Donate button

= 0.1.1 =
* fixed typos in documentation and readme.txt
* used appropriate escaping functions in output.php
* fixed depreciated function for theme check version plugin.php

= 0.1.0 =
* Initial release.

== Upgrade Notice ==

= 0.1.0 =
Initial stable release. Please update from alpha now.
