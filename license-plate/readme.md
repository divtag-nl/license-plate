License plate validator and formatter
=====================================

[![Build Status](https://secure.travis-ci.org/Intrepidity/LicensePlate.svg)](http://travis-ci.org/Intrepidity/LicensePlate)

This library can be used to validate and format license plate numbers.
Countries currently supported:

* Belgium (1971-now)
* France (1976-now)
* German (unknown-now)
* Israel (unknown date-now)
* Netherlands (1951-now)
* Spain (1900-now)
* United Kingdom (1903-now)

Other countries will be added in the future

How to install
==============

Add the following to your composer.json:

``` json
{
    "require": {
        "intrepidity/license-plate": "^1.0.0"
    }
}
```

How to use
==========

Call the constructor of the license plate class of your choice with the user input as the first parameter:

``` php
<?php
$licenseplate = new \Intrepidity\LicensePlate\DutchLicensePlate('08ttnp');
if($licenseplate->isValid())
{
    echo $licenseplate->format(); // Outputs 08-TT-NP in this case
}
```

Since the license plate classes for each country implement the LicensePlateInterface, they expose isValid() and format() methods.
Country-specific methods may also be available. Please check the code of the specific class to get the complete picture.

Please note that this library does not check if a license plate actually exists, nor does it exclude combinations that aren't allowed.
