# Using the Events Calendar plugin

The plugin creates a custom post type that has all the required info we could dream of.

It also creates a specific view to see the upcoming events and search for them too.

Main issue: It's not localized or not very well localized.

## Configuring
After the plugin installation, go to plugin settings in the admin.

**IMPORTANT: You have to hit "Save changes" at the bottom of the page before switching to another settings tab.**

* General Settings
  * Activate Bloc Editor for Events: Check this.
  * Default currency symbol: €
  * Time zone mode: Use the site-wide time zone everywhere
* Display
  * Compact Date Format: set the right format, e.g. 15/01/2020

### Installing the fr translations
At the time of writing, you can get a community translation from this page: https://translate.wordpress.org/projects/wp-plugins/the-events-calendar/stable/

Click the language then find the small "Export" form at the bottom. It should read "Export all current as Portable Object Message Catalog (.po/.pot).

Hit "Export" to save the .po file, then move it to your Wordpress installation under wp-content/languages/plugins.

Except it **won't work unless you change the language site setting to be French (France) and not the Belgian variant.**

Tried copying and editing the file to match the lang string fr_BE but could not make it work.

## Styling
In the "Display" settings for the plugin there's an option to only include minimal CSS, we should probably do that.

## TODO
- [ ] Try to make the Google Maps view work (might need an API key) - Actual map might not work at all but the link should.
- [ ] The editor is not translated? Also Gutenberg seems to display the date in a really strange way.

