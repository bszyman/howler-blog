#  Howler Microblog

> Your very own microblog.

## About This Project

[HowlerBlog](https://howlerblow.com) is a free, open-source
microblogging web application, built to run on any standard
~LAMP server.

The only main dependency is Laravel and associated friends,
and should therefore be highly portable.

## Features

### Microblogging

Run your own Twitter-like microblog!

(Support for image media and quoting forthcoming.)

### Bookmarking

Share a collection of cool/interesting bookmarks to
your friends. Or, keep them to yourself using the
privacy setting - your choice!

### Following

Display a list of all of your new Howler friends, or not!

### Support for Feeds - RSS, Atom and JSON

Built-in support for generating an RSS or ATOM feed of your
microblog posts. Also included is a JSON endpoint, helpful
for doing integrations into your existing web properties.

## Deploying

Similar to classic PHP apps like PHPMyAdmin, Piwigo or WordPress,
you simply need to upload the files, and set a few settings in
a configuration file.

So, steps to deploy...

1) Upload files to your webhost using SFTP or WebDav.
2) Configure the app_settings.ini file found in the /common directory.
3) Upload the blank/empty starter database (howler.sql) into your database server.

## Requirements

* Windows/MacOS/FreeBSD/Linux
* Apache
* PHP
* MySQL or MariaDB

Note: This will probably work on earlier versions of PHP,
but was built against PHP 8.1.

## Pre-Made Packages

Not a developer and just want to get this up and running?

Download one of our pre-made zip files made available in the
[Releases](https://github.com/bszyman/howler-blog/releases) section,
unarchive, upload and then configure.

## Building

If you plan on extending or improving Howler Blog.

* [Laravel](https://laravel.com/) - PHP web framework.
* [Psalm](https://psalm.dev/) - Static analysis tool from Vimeo.
* [OpenGraph](https://github.com/scottmac/opengraph) - Helper class for scraping OG info.

To restore dependencies:

```bash 
% cd /path/to/howler_directory
% composer install
```

### Guidance

This web application was built using standard Laravel practices
and should be easy for most developers to extend, even if not
previously familiar with Laravel.

## License

This project is licensed under MIT.

## Maintainers

* [Ben Szymanski](https://bszyman.com)
