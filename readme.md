# Auto Amazon Links Example Templates

This package runs as a WordPress plugin and includes a few example templates for Auto Amazon Links, a WordPress plugin that generates Amazon links, to help developers start building their own templates.

## Getting started
### To build your own template

1. Clone this repository to your working directory.
2. Rename the root directory, `amazon-auto-links-example-tempaltes`, to something you like such as `auto-amazon-links-your-templates`.
3. Modify the plugin header comment in the plugin main file, `amazon-auto-links-example-templates.php`
```php
/**
 *	Plugin Name: Auto Amazon Links - Example Templates
 *	Description: Example Auto Amazon Links templates.
 *	Author:      Michael Uno (miunosoft)
 *	Version:     2.0.0
 */
```
to your desired one. It should look like
```php
/**
 *	Plugin Name: Auto Amazon Links - Your Templates
 *	Description: Does something your want.
 *	Author:      Your Name
 *	Version:     1.0.0
 */
```
5. Rename the main plugin file name, `amazon-auto-links-example-templates.php`, to something you like such as `auto-amazon-links-your-templates.php`.
6. Rename the namespace defined in PHP files by replacing `AutoAmazonLinks\Templates\Examples` with something you like such as `AutoAmazonLinks\Templates\YourTemplates`.
7. Rename the existing templates directories such as, `lightslider`, `minimal` to your desired names such as `your-slider`, `your-simplicity` or something.
8. Start modifying `style.css` in the template directory.
9. After finishing modifying the stylesheet, take a screenshot of your template and replace `screenshot.jpg` with yours.

### To load resource files
In `functions.php`, use the `wp_enqueue_scripts` and `enqueue_embed_scripts` action hooks to call your functions that enqueue resources.

See how the `lightslider` template loads JavaScript scripts with the `ResourceLoader` class.

### To define a default Item Format unit option
In `functions.php`, use the `aal_filter_template_default_item_format_{template id}` filter hooks to call your functions that enqueue resources.
See how the `lighslider` template defines the default Item Format unit option with the `OutputFormats` class.

## Notes
### Be careful not to infringe the Amazon Associates policy
According to the [Amazon Associates policy](https://affiliate-program.amazon.com/help/operating/policies/), you should keep the proportions of product thumbnails while resizing them is okay. 
> (a) You will not add to, delete from, or otherwise alter any Program Content in any way, including by adding additional information, except that you may resize Program Content consisting of a graphic image in a manner that maintains the original proportions of the image or truncate Program Content consisting of text in a manner that does not materially alter the meaning of the text or cause the text to become factually incorrect, or misleading.

Truncating text that does not lead to misleading its original meaning seems to be allowed. When you are uncertain, [ask](https://affiliate-program.amazon.com/home/contact/) them to be safe.

## Submitting your template plugin on wordpress.org plugin directory 
1. Prepare your plugin [`readme.txt`](https://developer.wordpress.org/plugins/wordpress-org/how-your-readme-txt-works/)
2. Create a zip file of your plugin files. You can use the export script (tool/export/export.sh)
3. Have an account on wordpress.org by [singing up](https://login.wordpress.org/register?locale=en_US) if you don't have one yet.
4. After logging in, submit a request on wordpress.org from [this page](https://wordpress.org/plugins/developers/add/).

## License
GPL 2 or later