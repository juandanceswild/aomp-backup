=== Feature Me - CTA Widget ===
Contributors: iandbanks
Donate Link: http://www.phase-change.org/donate/
Tags: feature, widget, featured-post, featured-page, feature-me, feature-widget,cta, call to action, featured post, feature me, call to action widget, feature me cta widget, feature me cta widget
Requires at least: 3.7
Tested up to: 3.9
Stable tag: 1.1.3
License: GPLv2 or later
License URI: http://www.gnu.org/licenses/gpl-2.0.html

A simple widget that allows you to feature any page or post on your website.

== Description ==
Feature Me CTA Widget is a simple widget that allows you to turn any page or post on your website into a call to action (cta).It pulls the pages and posts from the WordPress database and allows a user to choose one to display an excerpt and featured image in a widget area. Use this widget to feature prominent articles, or promote actions on the website.

IT’S EASY TO USE. If your theme uses widgets, you can use Feature Me. Just select the post or page you want to feature in any widget area, customize some preferences and save. Done.

IT SAVES TIME. Forget about endless sticky posts. With Feature Me, you won't waste your time swapping out sticky
posts to display your posts and pages in a prominent location. When you use Feature Me,
you there is no need to code a featured page on your website ever again.

== Screenshots ==
1. Feature Me widget Admin
2. Feature Me Post/Page as a sidebar CTA

== Installation ==
1. Upload `feature-me.zip` using the WordPress plugin uploader
1. Activate the plugin through the 'Plugins' menu in WordPress

== Frequently Asked Questions ==
= Can I upload a custom image for my featured post? =
Not at this time. This widget pulls images from the page/post featured image.

= No photo shows up even when "Featured Image" is turned on =
Make sure that your theme supports featured images. If it doesn't, add the following code to your themes
functions
.php file:

`add_theme_support( 'post-thumbnails' );`

If your theme DOES support featured images, check to make sure that the post or page you have chosen has a featured
image attached to it.

= Can I customize the CSS of the Feature Me widget? =
Yes. The widget uses a css class "feature-me" from which you can target all other elements of the widget and change
the look via css.

You can also use your enter in your own css classes in the "Custom CSS Class" field.

= My website uses a CSS framework. Can Feature Me work with different frameworks? =
Yes. You can utilize the "Custom CSS Class" field and enter in framework specific classes. For example if you are
using the 960.gs by Nathan Smith, you could enter in "grid_4" or similar. If you use bootstrap,
you could enter "span4" etc.

= Can I just display the image and link and not any text? =
Yes. Select the custom body option and leave it blank.

= How can I change the CTA button color? =
To change the button color navigate to the featureme.css stylesheet:
1. Go to the plugins > editor.
2. Choose 'Feature Me - CTA Widget' from the plugin dropdown menu and click "select"
3. Click 'feature-me/featureme.css' on the right side

The button is defined in 3 areas: .feature-me a.fmBtn, .feature-me a.fmBtn:hover, .feature-me a.fmBtn:visited

Enter your own values or use http://css3buttongenerator.com to generate a button. Replace featureme.css values with
the values you generated.

**WARNING** If you mess up the values here, you might need to completely re-install
feature-me to get it back. I HIGHLY RECOMMEND copying the styles to your computer before tweaking anything.


== Upgrade Notice ==

= 1.1.3 =
Fixes javascript pathway

= 1.1.2 =
Fixes an issue where javascript would break and freeze entire widget section

= 1.1.1 =
3.9 Bug fix

= 1.1.0 =
Bug fixes, optimization and TONS more options!
You may need to re-save pre-existing Feature Me widgets.

= 1.0.0 =
First version of the plugin.


== Changelog ==

= 1.1.3 =
* Bug Fix: Fixes javascript pathway

= 1.1.2 =
* Bug Fix: Fixes an issue where javascript would break and freeze entire widget section

= 1.1.1 =
* Bug Fix: Fixed an issue where a PHP error would display on the Widget Admin page

= 1.1.0 =
* "Feature Me" is now "Feature Me - CTA Widget".
* Bug Fix: Fixed an issue where default radio buttons weren't selected when widget is created.
* Bug Fix: Fixed an issue where the widget title in the admin menu displayed incorrect title. The correct title will now display on the widget title admin
* Bug Fix: Fixes an issue where the message "Select a Featured Page or Post to display" would display when leaving the custom body field empty.
* New Feature: Option to hide Title text
* New Feature: Option to hide Body text
* New Feature: Option to hide CTA Link title
* New Feature: Option to link Title heading
* New Feature: CTA Link is now a CSS3 button

= 1.0.0 =
* Select a post or page to feature via select menu
* Uses post title or a custom title
* Uses post excerpt or custom body text
* Make use of a post/page feature image
* Customize the "read more" link title
* "Read more" text can link to post/page or to a custom url
* Allows use of custom classes - write one or more class names for css customization