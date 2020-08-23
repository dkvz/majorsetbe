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

## Editing the styling
The "style.css" file at the project root is supposed to be generated using npm scripts, **do not edit that file directly**. It should probably be in the gitignore. Keeping it around so the theme still works even if I forget to build the theme assets.

* Most layout modifications happened in `_content-sidebar.scss`
* We use variables for as many colors as possible - See discussion about Colors below
* The styling is mobile first with media queries added manually when relevant (todo item to move it to a helper function or something Sassy)
* 3 media queries are commonly used in the existing CSS: 37.5em, 48em, and 768px (which is 48em if html font size is 16px)

## TODO
- [ ] Is there a symbol library included?
- [ ] Add something to make it easier to declare the common media queries

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
