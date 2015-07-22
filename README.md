## Rules Parser and Evaluator for PHP 5.4

[![Build Status](https://scrutinizer-ci.com/g/nicoSWD/php-rules-parser/badges/build.png?b=master)](https://scrutinizer-ci.com/g/nicoSWD/php-rules-parser/build-status/master) [![Code Coverage](https://scrutinizer-ci.com/g/nicoSWD/php-rules-parser/badges/coverage.png?b=master)](https://scrutinizer-ci.com/g/nicoSWD/php-rules-parser/?branch=master) [![Scrutinizer Code Quality](https://img.shields.io/scrutinizer/g/nicoswd/php-rules-parser.svg?b=master)](https://scrutinizer-ci.com/g/nicoSWD/php-rules-parser/?branch=master)

You're looking at a PHP library to parse and evaluate text based rules. This project was born out of the necessity to evaluate hundreds of rules that were originally written and evaluated in JavaScript, and now needed to be evaluated on the server side, using PHP.

This library has initially been used to change and configure the behavior of certain "Workflows" (without changing actual code) in an intranet application, but it may serve a purpose elsewhere.


Find me on Twitter: @[nicoSWD](https://twitter.com/nicoSWD)

## Install

Via Composer

``` bash
$ composer require "nicoswd/php-rules-parser": "0.3.*"
```

Via git
``` bash
$ git clone git@github.com:nicoSWD/php-rules-parser.git
```


## Usage

```php
$ruleStr = 'foo == "abc" && (bar == 123 || bar == 321)';

$variables = [
    'foo' => 'abc',
    'bar' => 321
];

$rule = new Rule($ruleStr, $variables);

var_dump($rule->isTrue()); // bool(true)
```

It supports JavaScript syntax, as well as a custom syntax for easier usage.

```php
$ruleStr = 'foo is "abc" and (bar is 123 or bar is 321)';
```

Comments are supported as well.

```php
$ruleStr = '
    /**
     * This is a test rule with comments
     */

    // This is true
    2 < 3 and (
        # this is false, because foo does not equal 4
        foo is 4
        # but bar is greater than 6
        or bar > 6
    )';

$variables = [
    'foo' => 5,
    'bar' => 7
];

$rule = new Rules\Rule($ruleStr, $variables);

var_dump($rule->isTrue()); // bool(true)
```

## Security

If you discover any security related issues, please email security@nic0.me instead of using the issue tracker.

## Testing

``` bash
$ phpunit
```

## Contributing
Pull requests are very welcome! If they include tests, even better. This project follows PSR-2 coding standards, please make sure your pull requestst do too.

## License

[![License](https://img.shields.io/packagist/l/nicoSWD/putio.svg)](https://packagist.org/packages/nicoswd/php-rule-parser)