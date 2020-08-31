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

From there you can watch for asset changes to auto-recompile the theme:
```
npm run watch
```

## To configure inside Wordpress
* The sidebar - It appears in the footer and most probably has to be changed.
* Change site title (in browser title bars).
* Disallow access to xmlrpc.php at web server level - Will probably make another private note for the hosting concerns.

TODO: Still discussing how to handle saving and showing upcoming and past concerts - More notes in _resources/doc.

## Editing the styling
The "style.css" file at the project root is supposed to be generated using npm scripts, **do not edit that file directly**. It should probably be in the gitignore. Keeping it around so the theme still works even if I forget to build the theme assets.

* Most layout modifications happened in `_content-sidebar.scss`
* We use variables for as many colors as possible - See discussion about Colors below
* The styling is mobile first with media queries added manually when relevant (todo item to move it to a helper function or something Sassy)
* 3 media queries are commonly used in the existing CSS: 37.5em, 48em, and 768px (which is 48em if html font size is 16px)

## TODO
- [x] Style the mobile menu button and remove the margins for li elements unless we're on larger screen - add a padding (which we'll need to remove on large screens).
- [x] Add sidebar in the footer
- [x] Header height somehow changes on every page -> I need some sort of flex 1 equivalent on the main area
- [ ] I need to try a navigation menu with nested menus since I commented most of the preexisting navigation styles
- [ ] Can we use the "IMAGES DE MISE EN AVANT" for blog posts? I assume they're given to the post template
- [ ] Site logo should probably be smaller on mobile and also should link to homepage
- [ ] There's apparently things we need to translate in the pot file thingy
- [ ] Is there a symbol library included?
- [ ] Style the "Edit" link on pages and posts when logged in, maybe put it on top? We could probably just remove it since it's on the top UI when logged in.
- [ ] Find fonts to use
- [ ] Change the favicon
- [ ] Check what we get as OpenGraph metadata
- [x] Add something to make it easier to declare the common media queries -> Added mixins
- [ ] Do we need the infinite scrolling or "shopping cart" CSS and JS?
- [ ] The linter will probably yell at us - Change code style to 2 spaces at the very least
- [x] Flex or grid the search widget to get consistent heihts on the input and button
- [ ] There is a theme checker for Wordpress - Should probably use it at some point
- [ ] Test the npm scripts on Windows
- [ ] A **WHOLE BUNCH** of wp-block* styles need to be implemented, could probably steal them from one of the official themes
- [ ] I've seen somewhere that you're supposed to tell Gutenberg the color palette it can show to users
- [ ] Test all the alignement options in the editor and pretty much everything that can be altered with buttons including text styles
- [ ] Minify the CSS in the prod build (is it already?)
- [ ] Use Webpack instead of node-sass alone so that we can also minify the JS, use imports etc.

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
