# MySlideShow
A Simple WordPress plugin which provides you with simple shortcode to help you display a slide show anywhere on your site.
The plugin was developed during the WordPress training program provided by [rtCamp](https://rtcamp.com/). Requirements for the plugin 
were provided by rtCamp which can be found [here](https://github.com/rtCamp/hiring-assignments/tree/master/WordPress-Engineer#challenge-2a-wordpress-slideshow-plugin).

- [For Developers](https://github.com/Tan-007/myslideshow#for-developers)
- [For Users](https://github.com/Tan-007/myslideshow#for-users)

## For developers: 
### Here are the main directories/files:
- `admin`: contains all the admin side functionality files
  - `assets`: contains images
  - `css`: contains admin side styles
  - `js`: contains admin side scripts
  - `partials`: contains helper functions that render content(mostly contains html and less php) on admin side
  - `class-myslideshow-admin.php`(file): contains the core admin side functionality class which has all the custom functions
- `includes`: contains loader class file and activator and deactivator class files
  - `class-myslideshow.php`(file): contains the class which contains for all the hooks and filters. also loads all dependencies
- `languages`: contains pot template for localization
- `public`: contains all user side functionality files
  - `css`: user side styles
  - `js`: user side scripts
  - `partials`: contains helper functions that render content(mostly contains html and less php) on user side
- `myslideshow.php`(file): main file from where the execution starts

There are no third party plugins/libraries used and working demo can be found [here](link to demo)
## Screenshot(s):
![image-1](https://i.imgur.com/Gq4p6Yl.jpg)

## For users:
### Activation: 
This plugin is not available on WordPress marketplace hence you will have to manually upload this plugin to your website's directory.
1. Click on `Clone or download` button at top right in this directory to download a zip file of this entire directory on your computer.
2. From your FTP client or your cpanel go to your WordPress website's root directory and navigate to the `plugins` folder at `wp-content`>`plugins`
3. Create a new folder named `myslideshow` inside `plugins` folder and copy all content of the zip file that you downloaded from github
4. Log in to your WordPress admin panel and navigate to `plugins`
5. There should be a new plugin available named MySlideShow. Click on active to activate it. 

### Using the plugin:
1. The plugin comes with a shortcode that allows you to display a fully responsive image slide show anywhere on your website
2. All you have to do is use the shortcode `[slideshow]`
3. Before using the shortcode, add images that you want to display on the website in `slideshow settings` available in your admin panel
4. The shortcode will be usable in comments, excerpts and post content based on your current theme's support
