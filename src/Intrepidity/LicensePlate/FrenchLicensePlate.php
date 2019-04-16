<?php
namespace Intrepidity\LicensePlate;

/**
 * French license plate formatted and utilities
 *
 * Class FrenchLicensePlate
 * @package Intrepidity\LicensePlate
 */
class FrenchLicensePlate extends AbstractLicensePlate implements LicensePlateInterface
{


    /**
     * Get the sidecode of the license plate
     *
     * More info: http://nl.wikipedia.org/wiki/Nederlands_kenteken#Alle_sidecodes (in Dutch)
     *
     * @return bool|int|string
     */
    public function getSidecode()
    {
        $licenseplate = strtoupper(str_replace('-', '', $this->licenseplate));
        $sidecodes = array();

        // Special sidecodes
        $sidecodes['CIV'] =  '/^[\d]{2,3}[DRNEdrne]{1}[\d]{4}[a-zA-Z]{1}$/';  // Civilian government cars 1976-2009: 99D-9999X
        $sidecodes['MIL'] = '/^[\d]{8}$/';                                     // Military: 99999999

        // Normal sidecodes
        $sidecodes[1] =     '/^[\d]{2,4}[a-zA-Z]{2,3}[\d]{2,3}$/';    // 1 9999-XX-99; 1976-2009
        $sidecodes[2] =     '/^[a-zA-Z]{2}[\d]{3}[a-zA-Z]{2}$/';    // 2 XX-999-XX; 2009-now

        return $this->checkPatterns($sidecodes, $licenseplate);
    }

    /**
     * Format the license plate
     *
     * Example: will output 08-TT-NP for input of 08ttnp
     *
     * @param int $sidecode Optional input of sidecode. Automatically determined if omitted
     * @return string Formatted license plate
     */
    public function format($sidecode = 0)
    {
        if($sidecode === 0)
        {
            $sidecode = $this->getSidecode();
        }

        if(false === $sidecode)
        {
            return false;
        }

        $licenseplate = strtoupper(str_replace('-', '', $this->licenseplate));

        switch($sidecode)
        {
            case 'MIL':
                return $this->licenseplate;
                break;

            case 'CIV':
                preg_match('/^([\d]{2,3}[DRNEdrne]{1})([\d]{4}[a-zA-Z]{1})$/', $licenseplate, $parts);
                return $parts[1] . '-' . $parts[2];
                break;

            case 1:
                preg_match('/^([\d]{2,4})([a-zA-Z]{2,3})([\d]{2,3})$/', $licenseplate, $parts);
                return $parts[1] . '-' . $parts[2] . '-' . $parts[3];

            case 2:
                return substr($licenseplate, 0, 2) . '-' . substr($licenseplate, 2, 3) . '-' . substr($licenseplate, 5, 2);
        }

        return $licenseplate;
    }

    /**
     * Tests if the license plate is valid
     * The license plate is valid if the sidecode can be determined
     *
     * @return bool
     */
    public function isValid()
    {
        return $this->getSidecode() != false;
    }

    public function getTwoLetterISO()
    {
        return 'FR';
    }

    public function getThreeLetterISO()
    {
        return 'FRA';
    }
}
