<img align="right" width="90" height="90"
     src="https://avatars1.githubusercontent.com/u/38340689"
     title="WP Rig logo by Morten Rand-Hendriksen">
# WP Rig: WordPress Theme Boilerplate
[![Build Status](https://travis-ci.com/wprig/wprig.svg?branch=master)](https://travis-ci.com/wprig/wprig)
[![License: GPL](https://img.shields.io/aur/license/yaourt.svg)](https://www.gnu.org/licenses/gpl-3.0.en.html)
![WP Rig version 2.0.0](https://img.shields.io/badge/version-2.0.0-blue.svg)

## Your Performance-Focused Development Rig
A progressive theme development rig for WordPress, WP Rig is built to promote the latest best practices for progressive web content and optimization. Building a theme from WP Rig means adopting this approach and the core principles it is built on:
- Accessibility
- [Lazy-loading of images ](https://developers.google.com/web/fundamentals/performance/lazy-loading-guidance/images-and-video/)
- Mobile-first
- Progressive enhancement
- [Resilient Web Design](https://resilientwebdesign.com/)
- Progressive Web App enabled
- AMP-ready

## Office Hours
WP Rig office hours take place every other Thursday from 5:30 - 6:30 p.m. UTC, starting January 10, 2019.

Join WP Rig core maintainers to chat about the project, work alongside other devs, discuss ideas, address bugs, and more.

- [View the WP Rig Google Calendar](https://calendar.google.com/calendar/embed?src=wprigio%40gmail.com&ctz=America%2FChicago) to see dates and find info to join the discussion
- [Subscribe to the WP Rig Google Calendar](https://calendar.google.com/calendar?cid=d3ByaWdpb0BnbWFpbC5jb20) to stay informed.

## Installation
WP Rig has been tested on Linux, Mac, and Windows.

### Requirements
WP Rig requires the following dependencies. Full installation instructions are provided at their respective websites.

- [PHP](http://php.net/) 7.0
- [npm](https://www.npmjs.com/)
- [Composer](https://getcomposer.org/) (installed globally)

### How to install WP Rig:
1. Clone or download this repository to the themes folder of a WordPress site on your development environment.
    - DO NOT change the name of the theme directory from the default `wprig`.
2. Configure theme settings, including the theme slug and name, in `./config/themeConfig.js`.
3. In command line, run `npm install` to install necessary node and Composer dependencies.
4. In command line, run `npm run dev` to process source files, build the development theme, and watch files for subsequent changes.
	- `npm run build` can be used to process the source files and build the development theme without watching files afterwards.
5. In WordPress admin, activate the WP Rig development theme.

## How to build WP Rig for production:
1. Follow the steps above to install WP Rig.
2. Run `npm run bundle` from inside the `wp-rig` development theme.
3. A new, production ready theme will be generated in `wp-content/themes`.
4. The production theme can be activated or uploaded to a production environment.

### Wiki: Recommended code editor extensions
To take full advantage of the features in WP Rig, visit the [Recommended code editor extensions Wiki page](https://github.com/wprig/wprig/wiki/Recommended-code-editor-extensions).

## Working with WP Rig
WP Rig can be used in any development environment. It does not require any specific platform or server setup. It also does not have an opinion about what local or virtual server solution the developer uses.

Before first run, visit the [BrowserSync wiki page](https://github.com/wprig/wprig/wiki/BrowserSync).

### Available Processes

#### `dev watch` process
`npm run dev` will run the default development task that processes source files. While this process is running, source files will be watched for changes and the BrowserSync server will run. This process is optimized for speed so you can iterate quickly.

#### `dev build` process
`npm run build` processes source files one-time. It does not watch for changes nor start the BrowserSync server.

#### `translate` process
`npm run translate` generates a `.pot` file for the theme to enable translation. The translation file will be stored in `./languages/`.

#### `production bundle` process
`npm run bundle` generates a production ready theme as a new theme directory and, optionally, a `.zip` archive. This builds all source files, optimizes the built files for production, does a string replacement and runs translations. Non-essential files from the `wp-rig` development theme are not copied to the production theme.
To bundle the theme without creating a zip archive, change the `export:compress` setting in `./config/themeConfig.js`:

```javascript
export: {
	compress: false
}
```

### Gulp process
WP Rig uses a [Gulp 4](https://gulpjs.com/) build process to generate and optimize the code for the theme. All development is done in the `wp-rig` development theme. Feel free to edit any `.php` files. Asset files (CSS, JavaScript and images) are processed by gulp. You should only edit the source asset files in the following locations:
- CSS: `assets/css/src`
- JavaScript: `assets/js/src`
- images: `assets/images/src`

For more information about the Gulp processes, what processes are available, and how to run them individually, visit the [Gulp Wiki page](https://github.com/wprig/wprig/wiki/Gulp).


### Browser Support
As WP Rig processes CSS and JavaScript it will support the browsers listed in `.browserslistrc`. Note that WP Rig will **not** add polyfills for missing browser support. WP Rig **will** add CSS prefixes and transpile JavaScript.

## Advanced Features
WP Rig gives the developer an out of the box environment with support for modern technologies including ES2015, CSS grid, CSS custom properties (variables), and existing tools like Sass without making any configurations. Just write code and WP Rig handles the heavy lifting for you.

Configuring the behavior of WP Rig is done by editing `./config/themeConfig.js`. Here the developer can set the theme name and theme author name (for translation files), and local server settings for BrowserSync. Additionally, compression of JavaScript and CSS files can be turned off for debugging purposes.

WP Rig ships with advanced features including:
- Lazy-loading images
- Built-in support for the [official AMP plugin](https://wordpress.org/plugins/amp/)
- Progressive loading of CSS
- Modern CSS, custom properties (variables), autoprefixing, etc
- Modern layouts through CSS grid, flex, and float

For more information about the advanced features in WP Rig and how to use them, visit the [Advanced Features Wiki page](https://github.com/wprig/wprig/wiki/Advanced-Features-(and-how-to-use-them)).

## License
WP Rig is released under [GNU General Public License v3.0](https://github.com/wprig/wprig/blob/master/LICENSE).