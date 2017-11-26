SocialCounters
=========================

If you ever needed to display social media like counters on your website, but you need to format it as 
1K intead of 1000 or 1M instead of 1000000 or something like 1.2M+ instead of 1234567, this is what you need.


Installation
------------

```
composer require emersonbroga/social-counters:dev-master
```

Then:
```
require 'vendor/autoload.php';


use  \EmersonBroga\SocialCounters;

$socialCounters = new SocialCounters();
echo $socialCounters->format(1234567); // 1.2M+

```

Customize
---------

If you need different suffixes, you can customize it.


```
require 'vendor/autoload.php';


use  \EmersonBroga\SocialCounters;

$socialCounters = new SocialCounters();
$socialCounters->thousandSuffix = 'G';
echo $socialCounters->format(1234); // 1.2G+

```

The available suffixes are:

```
$socialCounters->$thousandSuffix = 'K';
$socialCounters->$millionSuffix = 'M';
$socialCounters->$billionSuffix = 'B';
$socialCounters->$trillionSuffix = 'T';

```


2017 - Emerson Carvalho.

Thanks ♥ 🐘
