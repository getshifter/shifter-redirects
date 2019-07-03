=== Plugin Name ===
Contributors: emaildano
Donate link: https://en.digitalcube.jp
Tags: static, wordpress, redirects
Requires at least: 3.0.1
Tested up to: 5.2.1
Stable tag: 4.3
License: GPLv2 or later
License URI: http://www.gnu.org/licenses/gpl-2.0.html

A redirects plugin for static WordPress sites.

== Description ==

Redirect top level domains such as `example.com` to `www.example.com` for static sites in a serverless hosting environment.

== Installation ==

1. Start by downloading and installing this plugin.
2. Navigate to the settings page. WordPress Dashboard / Settings / Shifter Redirects
3. Add your Source and Destination
4. Check enabled
5. Source: What URL to redirect from.
6. Destination: What URL to redirect to.

== Frequently Asked Questions ==

= Why do I need another redirect plugin? =
You don't, with a few exceptions. Most (maybe all) current redirect plugins for WordPress use PHP and a server like NGINX or Apache to handle redirects. For static sites you'll need a different solution. This plugin is designed to work with the popular Redirections plugin or as a standalone for some features.

= What does it do? =
It is designed as a helper plugin to work alongside Redirections. Support for regex/wildcard redirects is coming soon. For now, it supports TLD redirects such as www to non-www and vice versa.

= But my DNS provider offers TLD redirects, do I need this?= 
Maybe? We built this two reaons. First, users with DNS providers who don't offer domain redirects and second, users who need support for regex/wildcard redirects.

== Screenshots ==

1. Shifter Redirects settings.

== Changelog ==

= 1.0.0 =
* First release
* Support for TLD redirects.