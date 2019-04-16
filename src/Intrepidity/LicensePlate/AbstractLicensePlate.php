<?php
namespace Intrepidity\LicensePlate;

/**
 * Abstract base class for license plate classes
 *
 * Class AbstractLicensePlate
 * @package Intrepidity\LicensePlate
 */
abstract class AbstractLicensePlate
{
    /**
     * @var string License plate
     */
    protected $licenseplate;

    public function __construct($licenseplate)
    {
        $this->licenseplate = str_replace(' ', '', $licenseplate);
    }

    /**
     * Check an array of regex patterns against the license plate string and give back the matching key if any
     *
     * @param array $patterns Array of regex patterns
     * @param string $licenseplate License plate string
     * @return bool|int|string Key for matching regex in the array, or false if none matches.
     */
    protected function checkPatterns(array $patterns, $licenseplate)
    {
        foreach($patterns as $key => $pattern)
        {
            if(preg_match($pattern, $licenseplate))
            {
                return $key;
            }
        }

        return false;
    }
}