![CoverArtArchive](https://raw.githubusercontent.com/metabrainz/metabrainz-logos/master/logos/Cover%20Art%20Archive/PNG/CoverArtArchive_logo_mini.png)

# [CoverArtArchive](https://coverartarchive.org/) API Wrapper

CoverArtArchive is a joint project between the [Internet Archive](https://archive.org/) and [MusicBrainz](https://musicbrainz.org/). Goal of this project is to make cover art images available to everyone.

Using this api wrapper, you can retrieve cover art images using the [release MBID](https://musicbrainz.org/doc/MusicBrainz_Identifier) of MusicBrainz.

Recommended to use together with [stephan-strate/php-music-brainz-api](https://github.com/stephan-strate/php-music-brainz-api).

Inspired by [php-github-api](https://github.com/KnpLabs/php-github-api) and [php-tmdb](https://github.com/php-tmdb/api).

## Installation

Using composer:
```
$ composer require stephan-strate/php-cover-art-archive-api php-http/guzzle6-adapter
```

Why `php-http/guzzle6-adapter`? This library is decoupled from any http client using [HTTPlug](http://httplug.io/).

## Usage

First you want to create the client:
```php
$client = new \CoverArtArchive\Client();
```

Using this client, you can retrieve all other objects/apis.

### Repository



### Api

The api implementation returns the raw json response of the endpoint. You might want to use the repository implementation instead to get the parsed objects.

```php
$release = $client->release();
```

## Contributing

## Help & Donate

I am very curious about projects that use my libraries. Please drop me a short message about what you use the library for. You can find my contact information on my profile (LinkedIn, E-mail).

If this project saved you time and money or you just appreciate what I am doing, please consider sponsoring me 😊