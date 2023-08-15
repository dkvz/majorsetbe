# Major Set Wordpress Theme
Another attempt at web design.

## Requirements
- Composer
- NodeJS

A local Wordpress is obviously required to test the changes. I'll explain the quickest test setup you could use someday.

**You should probably either clone the theme repository inside the wp-content/themes directory of your local Wordpress installation, or make a symlink to it there.**

## Setting it up
From the project root directory:
```
composer install
npm install
```
If you (by "you" I mostly mean "future me") get an error about `node-sass` failing to compile, there are multiple ways to solve it but for the moment I just check which `node-sass` version is supposed to work best with my node version, change it accordingly in package.json, remove node_modules and package-lock.json entirely then retry `npm install`. It should work.

Another plan is to try `npm rebuild node-sass` but that usually doesn't do it for me.

From there you can watch for asset changes to auto-recompile the theme:
```
npm run watch
```

The theme won't work unless watch or "compile:css" is ran since the output CSS files are not included in the repo.

To build the theme, you can use (at least on Mac & Linux):
```
npm run bundle
```
Which compiles and minifies the CSS (I added that part) and in case of success, creates a zip archive one level higher with the theme in it.

## To configure inside Wordpress
* Main account should be called "MajorSet".
* Global configuration: 
  * Title: Major Set
	* Slogan: The Swing Band
	* Lang has to be French and NOT Belgian French
	* Change the datetime location to Brussels
* Permalink config: pick the one with just the post title.
* Check the note about adding the events calendar plugin in _resources/doc/events_calendar_plugin
* Install the theme.
* The sidebar - It appears in the footer and has to be customized - The social links block has to be manually added (right after search is a good spot).
* Set the favicon: go to Appearance » Customize and click on the ‘Site Identity’ tab - Change the site icon at the bottom and select the file named `logo-notext_512.png` in the assets directory.
* Disallow access to xmlrpc.php at web server level - Will probably make another private note for the hosting concerns.
* Configure/create the menu - Add the "Représentations" link with either "?post_type=tribe_events" or "/events/list" as URL depending on rewriting being on or off ; Remove the "home" link ; Activate the menu to be the main menu.
* Create the "Blog" page (or "News" or whatever) and select "Blog section" as the page template. Put that page in the menu too.
* Create a category called "Annonces" and another one called "Anciennes annonces".
* From the admin dashboard: remove the top section "customize your theme" or whatever it's called bu clicking "ignore" on the top right.
* Create the contact page with a small into message, also link the social accounts in there - Requires installing wp_forms.

* **Set the production website email address to what it's supposed to be**.

## Editing the styling
The "style.css" file at the project root is supposed to be generated using npm scripts, **do not edit that file directly**. It should probably be in the gitignor (**THEY NOW ARE**). Keeping it around so the theme still works even if I forget to build the theme assets.

* Most layout modifications happened in `_content-sidebar.scss`
* We use variables for as many colors as possible - See discussion about Colors below
* The styling is mobile first with media queries added manually when relevant (todo item to move it to a helper function or something Sassy)
* 3 media queries are commonly used in the existing CSS: 37.5em, 48em, and 768px (which is 48em if html font size is 16px)

## TODO
- [x] Show some message in case there aren't any upcoming concerts (with a CTA to something?)
- [x] Style the mobile menu button and remove the margins for li elements unless we're on larger screen - add a padding (which we'll need to remove on large screens).
- [x] Add sidebar in the footer
- [x] Header height somehow changes on every page -> I need some sort of flex 1 equivalent on the main area
- [x] Need to completely style the event list and calendar pages (monthly and daily view) - Calendar had a hover style that has a bottom border
- [x] Need to style the day view for event list
- [x] Home page hero doesn't work at all on Chrome. -> Had to use flex-end instead of just end for the align-items
- [x] Pagination doesn't really work on the blog page, seems like the same posts appear on both pages
- [x] Try using a picture as background + a blend mode for pages and maybe event pages
- [x] Style individual post pages + the comment form (does it affect the standard page template too?) + article image
- [x] Remove the "web site" field from the comments form
- [x] Style individual blog posts in the Blog page and check that it also affects the "archive.php" pages
- [x] Add a permalink icon ton post-card.php (next to the title) so that people can link a specific post even without the "read more" link
- [x] Test the heading sizes in articles for mobile - Might be too big - Heading too big on search page for mobile
- [x] Style content-search like post-card - Leave the excerpt - Remove thumbnail for events only
- [x] How I structured posts with thumbnails in content.php should be applied to other relevant php files
- [x] Style the comments themselves and also try comment threads to see how these look and don't forget the inline response form
- [ ] Style image legends - Currently appear as normal big text, should probably also use grayed color
- [ ] Link the Instagram account: https://www.instagram.com/major_set
- [ ] Remember to explain to authors they really need to put a "Read more" ruler in any long post
- [ ] In event cards, the descriptions does not show carriage returns - But that may be due to it being an excerpt? I'll have to tell authors to fill in the excerpt field
- [ ] Is there a Wordpress cronjob? 
- [x] See discussion section about a11y - Some images and the scroll-down button could use screen reader text
- [ ] Limit the max amount of upcoming events on the front page and add a link to the calendar page if there's more
- [x] Style the tables
- [x] Completely delete the "featured-post" branch.
- [x] Can video elements be made responsive? Are they by default? -> I think so lol
- [x] Links inside of blockquote should have another color
- [x] Test if the blog page also shows unpublished articles, it might do because of the custom query
- [x] Create a copy of the scroll down button inside the CTA, hide it on mobile and tablet (show the pos. absolute one - hide it on desktop)
- [x] Ceate a "breaking news" section that only show the latest blog post with a specific custom field - Or look if there's already something like "show on home page"
- [ ] Check discussion section about the block editor and theme config, there's probably more we can do
- [x] I need to think where to link the Facebook and YouTube, kinda forgot about that
- [x] The menu has links on top now? -> Creating a menu changed the header dom
- [x] Style the blue info message "This event is passed"
- [x] I need a different style for .tribe-events-schedule when there are no thumbnails for the event and screen is large
- [ ] I need to try a navigation menu with nested menus since I commented most of the preexisting navigation styles
- [x] Site logo should probably be smaller on mobile and also should link to homepage -> I'll keep it large for now
- [x] There's apparently things we need to translate in the pot file thingy - I also added at least one template (event-card.php) that might need some pot... Stuff - I Don't know -> See discussion section
- [x] Try to get the pagination to show (by adding tons of posts?) to see what style it gets -> Added pagination manually on the "blog.php" page
- [x] Style the "Edit" link on pages and posts when logged in
- [ ] It's possible to pin a post to top of the blog, whereas it'll appear on top of the list - But there are no other indications - Maybe check how Twentytwenty does it
- [ ] The error message when you try submitting an empty comment isn't styled at all. Is that normal?
- [x] On the blog page (blog posts lists) the permalink icon is shown in a really weird place when on large screen and the post title is very long
- [x] Alignement options don't work on audio elements in the Gutenberg editor
- [ ] Find fonts to use -> Need to test if Ubuntu font shows on other browsers
- [x] Change the favicon -> Documented how to do it inside Wordpress above
- [ ] Check what we get as OpenGraph metadata for pages with or without thumbnails, posts and events
- [x] Add something to make it easier to declare the common media queries -> Added mixins
- [ ] Do we need the infinite scrolling or "shopping cart" CSS and JS?
- [ ] The linter will probably yell at us - Change code style to 2 spaces at the very least - Try fixing the SCSS lint errors
- [x] Flex or grid the search widget to get consistent heihts on the input and button
- [ ] Add my own lightbox effect using JS
- [x] Did I minify the JPG backgrounds? - Add more of them
- [x] Try the text sizes in Gutenberg
- [ ] Style .wpforms-confirmation-container to be like the info-box or something I'm already using
- [ ] There is a theme checker for Wordpress - Should probably use it at some point
- [ ] Test the npm scripts on Windows
- [ ] Re-check all the wp-blocks that are available, many of them could use more styling
- [x] For the Gutenberg colors, we need to create the classes like `has-accent-2-color` for all of the _ms_colors.scss
- [x] Test changing background colors for blocks in Gutenberg using theme colors; Also try setting a custom color both for foreground and background
- [ ] Test all the alignement options in the Gutenberg editor - I'm not sure they work for text at all times
- [x] Minify the CSS in the prod build (is it already (don't think so)?) -> Added the minify to the "bundle" npm script
- [ ] Use Webpack instead of node-sass alone so that we can also minify the JS, use imports etc.

## Resources and links
* Doc for Event Calendar custom functions (use the search thingy): https://docs.theeventscalendar.com

## Discussion

### Colors
We're going dark on clear.

- #112f41 - Dark blue - Primary color
- #f2b134 - Accent/border yellow
- #068587 - Titles - Teal
- #ed553b - Subtitles/attract/outline - Reddish salmon
- #e9f6f3 or white or gradient to white - Backgrounds - Light turquoise
- #778582 - Grayed color/dark backgrounds - Darker turquoise - Could be computed with SASS I guess

We now need to match these to the corresponding SASS variables. Pretty sure it's in `sass/abstracts/variables`.

I decided to create and import a new scss files for my own color definitions, called it "_ms_colors.scss".

### Using assets from inside the theme directory
Easiest way I found is to do something like this:
```php
<img src="<?php bloginfo('template_url'); ?>/assets/logo-text.png" />
```
Would be better to have some kind of helper function that creates the correct template asset URL.

### Wysiwyg editor has no styles
It's normal and discussed in this issue: https://github.com/Automattic/_s/issues/1019

Basically, we have to hack some stuff together to produce a file called "editor-style.css" in the `inc` subdirectory.

I'm going to create a scss file dedicated to this purpose which should import the:
* "abstract"
* "base"
* "components"
* "generic"
* "utilities"
And I should check the order because it matters.

Since "base" also has body styling, I'll first try copying the site style.css as editor-style.css.

Actually editor-style.css is no longer used as is by the new editor (called Gutenberg or something) - But that last comments seems to elude to a way to make it work with the new editor:
https://github.com/Automattic/_s/issues/1248#issuecomment-640647913

Someone over here has hacked the editor styling and documents the extra needed classes: https://florianbrinkmann.com/en/editor-styles-gutenberg-4544/

Another reference for some classes that I need to add (for instance for the screen max width):
https://rudrastyh.com/gutenberg/css.html

#### My solution
In the end I created a new scss file called "editor-styles.scss" that compiles to "editor-styles.css" at the root.

Then I register it in functions.php - See this code at the end of the `major_set_be_setup()` function:
```php
/**
 * Attempting to add styling to the Guntenberg editor.
 */
add_theme_support( 'editor-styles' );
add_editor_style( 'editor-styles.css' );
```

### Removing all the sidebars
You're supposed to just remove all the sidebar widgets for that.

I'm just going to somehow add it to the footer.

### The admin bar at the top is ruining the layout
I'm using selective styles for when the admin bar is present.

It adds a class to body when it is.

Styles like that one work (provided specificity has precedence):
```css
body.admin-bar .main-navigation {
	top: 150px;
}
```

For size references, the top bar appears to be 32px tall on larger screens, and 46px tall on mobile.

I'm going to create a variable in `_structure.scss` called `$size__admin-bar-small` and `$size__admin-bar-large` to hold the values.

### Translating the existing strings
I first had to create an up to date .pot file using `composer make-pot`.

It searches through what I assume is ALL your files, and generates a .pot file in /languages.

Copy that file into `fr_FR.po` and `fr_BE.po` (yes, the extension has to be .po).

Now we need to run some obscure process to compile they key values into something binary. Don't ask me why.

People seem to use some utility called POEdit for this, but the following command could also work:
```
msgcat fr_FR.po | msgfmt -o fr_FR.mo -
```

The mo files get picked up immediately by Wordpress. In my case it's working as expected.

### Picture backgrounds
I have some sort of prototype of what I could do using background blend modes and gradients in _resources/assets.

The easiest would be to work with body classes and assign a random one to specific pages only. By which I mean to say:
- Not the homepage
- Not the "lists" pages (blog, archive, all the event calendar pages (except may be the event details?))

There is a hook which can add classes to body in `template-functions.php` -> That's where we need to add the logic.

To add a custom background, check out `_body.scss` and add a .bgX class with the right background and blend mode (minimize the image!).

Then increment the amount of custom backgrounds, which is a constant in `template-functions.php`:
```php
// The amount of custom backgrounds configured
// in _body.scss (used to pick one at random):
define('BG_COUNT', 4);
```

### Working with the block editor
The block editor AKA Gutenberg is not supported by Underscore. Something I wish I had known before going with Underscore.

Anyway, here are a few resources on things to configure in the theme to get more block support (including what I understand to be responsives images - though we may just have these already out of the box):

* https://kinsta.com/fr/blog/theme-twenty-twenty
* https://kinsta.com/blog/twenty-nineteen-theme
* https://developer.wordpress.org/block-editor/developers/themes/theme-support/#block-font-sizes

The last one explains how to set the allowed fonts sizes but more importantly there's the same thing for colors, and we have theme colors so that would be nice to implement.

### Image-only links and a11y
The common way to make image-only links accessible is to do something like that:
```
<a href="theblablasite.com"><img src="logo_or_whatever.png" alt="Relevant info here"><span class="assitive-text">Relevant info here...</span></a>

.assistive-text { height: 1px; width: 1px; position: absolute; overflow: hidden; top: -10px; }
```
The assistive text cannot be hidden using be removing it from the DOM or using the hidden attribute or CSS prop "visibility".

There is a class in _accessibility.scss (screen-reader-text) for that very purpose, here in what I could have used for the footer but ended up replacing with a custom widget:
```php
<div class="social-icons">
	<a href="https://www.facebook.com/majorset" rel="noopener noreferrer" title="Visitez notre page Facebook!">
		<img class="icon" src="<?php bloginfo('template_url'); ?>/assets/facebook.svg" alt="Notre page Facebook">
		<span class="screen-reader-text">Visitez notre page Facebook!</span>
	</a>
	<a href="https://www.youtube.com/channel/UCkF2fp-EuKz1rnB9hL2HbjA" rel="noopener noreferrer" title="Visitez notre chaîne YouTube!">
		<img class="icon" src="<?php bloginfo('template_url'); ?>/assets/youtube.svg" alt="Notre chaîne YouTube">
		<span class="screen-reader-text">Visitez notre chaîne YouTube!</span>
	</a>
</div>
```

The current social media links code is in `functions.php`, look for a class called `ms_social_icons_widget`.

### Social links
* Youtube: https://www.youtube.com/channel/UCkF2fp-EuKz1rnB9hL2HbjA
* Facebook: https://www.facebook.com/majorset

## Original README for the underscore base template

_s
===

Hi. I'm a starter theme called `_s`, or `underscores`, if you like. I'm a theme meant for hacking so don't use me as a Parent Theme. Instead try turning me into the next, most awesome, WordPress theme out there. That's what I'm here for.

My ultra-minimal CSS might make me look like theme tartare but that means less stuff to get in your way when you're designing your awesome theme. Here are some of the other more interesting things you'll find here:

* A modern workflow with a pre-made command-line interface to turn your project into a more pleasant experience.
* A just right amount of lean, well-commented, modern, HTML5 templates.
* A custom header implementation in `inc/custom-header.php`. Just add the code snippet found in the comments of `inc/custom-header.php` to your `header.php` template.
* Custom template tags in `inc/template-tags.php` that keep your templates clean and neat and prevent code duplication.
* Some small tweaks in `inc/template-functions.php` that can improve your theming experience.
* A script at `js/navigation.js` that makes your menu a toggled dropdown on small screens (like your phone), ready for CSS artistry. It's enqueued in `functions.php`.
* 2 sample layouts in `sass/layouts/` made using CSS Grid for a sidebar on either side of your content. Just uncomment the layout of your choice in `sass/style.scss`.
Note: `.no-sidebar` styles are automatically loaded.
* Smartly organized starter CSS in `style.css` that will help you to quickly get your design off the ground.
* Full support for `WooCommerce plugin` integration with hooks in `inc/woocommerce.php`, styling override woocommerce.css with product gallery features (zoom, swipe, lightbox) enabled.
* Licensed under GPLv2 or later. :) Use it to make something cool.

Installation
---------------

### Requirements

`_s` requires the following dependencies:

- [Node.js](https://nodejs.org/)
- [Composer](https://getcomposer.org/)

### Quick Start

Clone or download this repository, change its name to something else (like, say, `megatherium-is-awesome`), and then you'll need to do a six-step find and replace on the name in all the templates.

1. Search for `'_s'` (inside single quotations) to capture the text domain and replace with: `'megatherium-is-awesome'`.
2. Search for `_s_` to capture all the functions names and replace with: `megatherium_is_awesome_`.
3. Search for `Text Domain: _s` in `style.css` and replace with: `Text Domain: megatherium-is-awesome`.
4. Search for <code>&nbsp;_s</code> (with a space before it) to capture DocBlocks and replace with: <code>&nbsp;Megatherium_is_Awesome</code>.
5. Search for `_s-` to capture prefixed handles and replace with: `megatherium-is-awesome-`.
6. Search for `_S_` (in uppercase) to capture constants and replace with: `MEGATHERIUM_IS_AWESOME_`.

Then, update the stylesheet header in `style.css`, the links in `footer.php` with your own information and rename `_s.pot` from `languages` folder to use the theme's slug. Next, update or delete this readme.

### Setup

To start using all the tools that come with `_s`  you need to install the necessary Node.js and Composer dependencies :

```sh
$ composer install
$ npm install
```

### Available CLI commands

`_s` comes packed with CLI commands tailored for WordPress theme development :

- `composer lint:wpcs` : checks all PHP files against [PHP Coding Standards](https://developer.wordpress.org/coding-standards/wordpress-coding-standards/php/).
- `composer lint:php` : checks all PHP files for syntax errors.
- `composer make-pot` : generates a .pot file in the `languages/` directory.
- `npm run compile:css` : compiles SASS files to css.
- `npm run compile:rtl` : generates an RTL stylesheet.
- `npm run watch` : watches all SASS files and recompiles them to css when they change.
- `npm run lint:scss` : checks all SASS files against [CSS Coding Standards](https://developer.wordpress.org/coding-standards/wordpress-coding-standards/css/).
- `npm run lint:js` : checks all JavaScript files against [JavaScript Coding Standards](https://developer.wordpress.org/coding-standards/wordpress-coding-standards/javascript/).
- `npm run bundle` : generates a .zip archive for distribution, excluding development and system files.

Now you're ready to go! The next step is easy to say, but harder to do: make an awesome WordPress theme. :)

Good luck!
