![GitHub contributors](https://img.shields.io/github/contributors/anwas/anwas-wp-plugin-boilerplate) ![GitHub last commit](https://img.shields.io/github/last-commit/anwas/anwas-wp-plugin-boilerplate) ![GitHub closed pull requests](https://img.shields.io/github/issues-pr-closed/anwas/anwas-wp-plugin-boilerplate)

# Anwas WordPress Plugin Boilerplate

This is a Fork of the original [WordPress Plugin Boilerplate](https://github.com/DevinVinson/WordPress-Plugin-Boilerplate).
The goal is still a standardized, organized, object-oriented foundation for building high-quality WordPress Plugins.

## Features

* The Boilerplate is based on the [Plugin API](http://codex.wordpress.org/Plugin_API), [Coding Standards](https://developer.wordpress.org/coding-standards/wordpress-coding-standards/), and [Documentation Standards](https://developer.wordpress.org/coding-standards/inline-documentation-standards/).
* The plugin is 100% [WPCS (WordPress Code Sniffer)](https://github.com/WordPress/WordPress-Coding-Standards) Compliant.
* All classes, functions, and variables are documented so that you know what you need to change.
* The Boilerplate uses a strict file organization scheme that corresponds both to the WordPress Plugin Repository structure, and that makes it easy to organize the files that compose the plugin.
* The project includes a `.pot` file as a starting point for internationalization.

## How to Create a Plugin

The Anwas WordPress Plugin Boilerplate (everything *inside and inclusive* the folder `plugin-name` of this repo) can be installed directly into your plugins folder "as-is". 

You will want to rename it and the classes and methods inside of it to fit your needs. 
Some comments inside the Boilerplate may need to be rewritten as well, and adapted to your code/use case.

For example, if your plugin is named 'example-me' then:

* rename files from `plugin-name` to `example-me`
* change `plugin_name` to `example_me`
* change `plugin-name` to `example-me`
* change `Plugin_Name` to `Example_Me`
* change `PLUGIN_NAME_` to `EXAMPLE_ME_`

It's safe to activate the plugin at this point. 
Because the Boilerplate has no real functionality there will be no menu items, meta boxes, or custom post types added until you write the code, of course.

# What About Contributing?

Submit your idea to the [Discussions](https://github.com/anwas/anwas-wp-plugin-boilerplate/discussions) for the community to approve.

Additionally to the Discussions Post, if you have working code to implement your Idea, please add a PR **to the develop branch**.

Note that in special cases (security, quality, yada yada) we may or may not merge the code and may or may not add or remove features discussed at our own will, independent from the amoung of thumbsup.

The Anwas WordPress Plugin Boilerplate follows PHP, WP Coding standards.

## Documentation, FAQs, and More

If you’re interested in writing any documentation or creating tutorials please let's discuss in the [Discussions section](https://github.com/anwas/anwas-wp-plugin-boilerplate/discussions) of this Repo.


# Credits

The WordPress Plugin Boilerplate was started in 2011 by [Tom McFarlin](http://twitter.com/tommcfarlin/) and has since included a number of great contributions. In March of 2015 the project was handed over by Tom to Devin Vinson.

From 2021-07-17 (July 17th 2021) onwards , the **Anwas** WordPress Plugin Boilerplate is maintained by [Anwas](https://github.com/anwas).
