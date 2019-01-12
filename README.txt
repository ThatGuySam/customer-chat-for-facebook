=== Customer Chat for Facebook ===
Contributors: thatguysam
Donate link: https://www.patreon.com/SamCarltonCreative
Tags: facebook, messenger, chat, free, customer chat, facebook page,
Requires at least: 4.8
Tested up to: 5.0.3
Stable tag: 1.0.3.3
License: GPLv2 or later
License URI: http://www.gnu.org/licenses/gpl-2.0.html
Requires PHP: 5.6

Adds Facebook's Customer Chat for Messenger plugin to your site.

== Description ==

This is a plugin for Facebook's Customer Chat so you can try the Official Facebook Messenger on your own Wordpress site!

You can also open the chat via a special button with the following shortcode:
`[ccfb_toggle]`

And with custom text and class:
`[ccfb_toggle class="btn btn-default"]Chat[/ccfb_toggle]`


You can learn more about Facebook's Customer Chat plugin here:
[Customer Chat Plugin](https://developers.facebook.com/docs/messenger-platform/discovery/customer-chat-plugin/)


== Installation ==

[Simple Setup Video](https://www.youtube.com/watch?v=_8skhKEYOBs)

**Get your Facebook Page ID**

1. Get the url of your Facebook Page.
1. Go to https://findmyfbid.com and enter your Facebook Page url.
2. **Make a note of the Page ID**.

= Install & Finish Up =

1. Log in to your WordPress site.
1. Upload `customer-chat-for-facebook` to the `/wp-content/plugins/` directory
1. Install and activate the plugin.
1. In the left sidebar go to **Settings > Customer Chat for Facebook**.
1. Enter your **Facebook Page ID**.
1. Select whether you want the messenger to be minimized by default.
1. Click **Save Settings**.
1. Visit your website and check it out.
1. Let the leads pour in.

= Whitelisting Your domain =

1. Copy the url of your site
1. Go to you Facebook Page and click **Settings** on the top right.
1. In the left sidebar there should be a setting called **Messenger Platform**.
1. Click into Messenger Platform and add your website url under **Whitelisted Domains**.
1. **Save it**.**Whitelisting Your domain**

1. Copy the url of your site
1. Go to you Facebook Page and click **Settings** on the top right.
1. In the left sidebar there should be a setting called **Messenger Platform**.
1. Click into Messenger Platform and add your website url under **Whitelisted Domains**.
1. **Save it**.

= Uploading in WordPress Dashboard =

1. Navigate to the 'Add New' in the plugins dashboard
2. Navigate to the 'Upload' area
3. Select `customer-chat-for-facebook.zip` from your computer
4. Click 'Install Now'
5. Activate the plugin in the Plugin dashboard

= Using FTP =

1. Download `customer-chat-for-facebook.zip`
2. Extract the `customer-chat-for-facebook` directory to your computer
3. Upload the `customer-chat-for-facebook` directory to the `/wp-content/plugins/` directory
4. Activate the plugin in the Plugin dashboard

== Frequently Asked Questions ==

= Why isn't it using the Greeting Dialog Display I set? =

If the user at anytime closes the welcome message the plugin remembers that and keeps it closed for the user from then on.
You can preview it by opening the site in a incognito window.

= Why isn't the chat appearing? =

Make sure the url that is whitelisted is exactly like the url you are looking at.
If it has https or www then the whitelisting should be exactly the same.
For example: If you have https://google.com in your whitelist, http://google.com and https://www.google.com will still both be blocked.

= Why isn't the chat appearing even though I've whitelisted my exact url? =

Sometimes other plugins and themes that use the Facebook SDK will overwrite any Facebook related plugins to that were setup before it.
If the SDK that the "winning" plugin uses doesn't support Customer Chat then it will lock out this plugin.
It's an ongoing issue and you just have to mix and match until you get a plugin that plays well with others.
Try picking a plugin that is updated frequently or recently. That usually means the developer does a lot of work on it to make sure things like that don't happen.
As another option you can go ahead delete this plugin(it won't hurt my feelings) and add the code manually using [Facebook's Documentation](https://developers.facebook.com/docs/messenger-platform/discovery/customer-chat-plugin/#steps) and [this plugin](https://wordpress.org/plugins/custom-css-js/)

= Why isn't the chat showing up in my language? =

It’s about the order in which things load.
Most facebook plugins use the same SDK
https://connect.facebook.net/en_US/sdk/xfbml.customerchat.js
However, when you load the SDK you have the option to match the language of the site, not just english, like so:
https://connect.facebook.net/hr/sdk/xfbml.customerchat.js
Unfortunately some plugin authors forget to honor the site language.
Now both SDKs get loaded but only one is needed so whichever is loaded last is what gets used, sometimes that is a plugin that only uses the english SDK(en_US).

= Why didn't that fix my issue? =

Try taking a look at [Facebook's Official documentation](https://developers.facebook.com/docs/messenger-platform/discovery/customer-chat-plugin)

= Have more issues? =

Make sure you've you've setup the plugin exactly like [this video](https://www.youtube.com/watch?v=_8skhKEYOBs) and then [contact me. ](https://m.me/samcarltoncreative/)

== Screenshots ==

1. /assets/screenshot-1.png
2. /assets/screenshot-2.png

== Changelog ==

= 1.1.0 =
* New plugin core rebuild with fancy new feature and better development philosophies

= 1.0.3.3 =

= 1.0.3.2 =
* Added Color option
* Added Greeting options
* Added Ref option
* Added new FAQs
* Added link to Facebook Documentation
* Update to Greeting Display option since minimized is deprecated

= 1.0.3.1 =
* Fix Minimized option not working

= 1.0.3 =
* Added a new setting to show language and where to update it
* Fixed error with minimize field
* Fixed screen_icon error

= 1.0.2 =
* Simplified setup instructions
* Added Tutorial video for settings up
* Enabled localizations on messenger
* Added admin notice for settings up

= 1.0.0 =
* Initial Release

== Upgrade Notice ==

= 1.0.0 =
* We've released!
