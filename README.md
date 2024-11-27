# Blade Lucide Icons

<a href="https://github.com/duongtdvn/blade-lucide-icons/actions?query=workflow%3ATests">
    <img src="https://github.com/duongtdvn/blade-lucide-icons/workflows/Tests/badge.svg" alt="Tests">
</a>
<a href="https://github.com/duongtdvn/blade-lucide-icons/actions/workflows/coding-standards.yml">
    <img src="https://github.com/duongtdvn/blade-lucide-icons/actions/workflows/coding-standards.yml/badge.svg" alt="Coding Standards" />
</a>
<a href="https://packagist.org/packages/duongtdvn/blade-lucide-icons">
    <img src="https://img.shields.io/packagist/v/duongtdvn/blade-lucide-icons" alt="Latest Stable Version">
</a>
<a href="https://packagist.org/packages/duongtdvn/blade-lucide-icons">
    <img src="https://img.shields.io/packagist/dt/duongtdvn/blade-lucide-icons" alt="Total Downloads">
</a>

A package to easily make use of [Lucide icons](https://github.com/lucide-icons/lucide) in your Laravel Blade views.

For a full list of available icons see [the SVG directory](resources/svg) or preview them
at [lucide.dev](https://lucide.dev/icons/).

## Requirements

- PHP 8.2 or higher
- Laravel 11.0 or higher

## Installation

```bash
composer require duongtdvn/blade-lucide-icons
```

## Blade Icons

Blade Lucide Icons uses Blade Icons under the hood. Please refer
to [the Blade Icons readme](https://github.com/blade-ui-kit/blade-icons) for additional functionality. We also recommend
to [enable icon caching](https://github.com/blade-ui-kit/blade-icons#caching) with this library.

## Configuration

Blade Lucide Icons also offers the ability to use features from Blade Icons like default classes, default attributes,
etc.
If you'd like to configure these, publish the `blade-lucide-icons.php` config file:

```bash
php artisan vendor:publish --tag=blade-lucide-icons-config
```

## Usage

Icons can be used as self-closing Blade components which will be compiled to SVG icons:

```blade
<x-lucide-activity />
```

You can also pass classes to your icon components:

```blade
<x-lucide-activity class="w-6 h-6 text-gray-500" />
```

And even use inline styles:

```blade
<x-lucide-activity style="color: #555" />
```

### Raw SVG Icons

If you want to use the raw SVG icons as assets, you can publish them using:

```bash
php artisan vendor:publish --tag=blade-lucide-icons --force
```

Then use them in your views like:

```blade
<img src="{{ asset('vendor/blade-lucide-icons/activity.svg') }}" width="10" height="10"/>
```

## Changelog

Check out the [CHANGELOG](CHANGELOG.md) in this repository for all the recent changes.

## Maintainers

Blade Heroicons is developed and maintained by Duong Truong.

## License

Blade Heroicons is open-sourced software licensed under [the MIT license](LICENSE.md).
