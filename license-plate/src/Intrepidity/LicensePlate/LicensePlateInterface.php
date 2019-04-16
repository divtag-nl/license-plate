<?php
namespace Intrepidity\LicensePlate;

interface LicensePlateInterface
{
    public function format();
    public function isValid();
    /** Country codes as per https://en.wikipedia.org/wiki/ISO_3166-1#Current_codes */
    public function getTwoLetterISO();
    public function getThreeLetterISO();
}