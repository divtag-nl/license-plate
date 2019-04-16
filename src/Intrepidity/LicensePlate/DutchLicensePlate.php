<?php
namespace Intrepidity\LicensePlate;

/**
 * Dutch license plate formatted and utilities
 *
 * Class DutchLicensePlate
 * @package Intrepidity\LicensePlate
 */
class DutchLicensePlate extends AbstractLicensePlate implements LicensePlateInterface
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
        $sidecodes['CD'] =  '/^CD[\d]{2,4}$/';                      // Corps diplomatique license plates
        $sidecodes['CDJ'] = '/^CDJ[\d]{2,3}$/';                     // Judges of the international courts of justice
        $sidecodes['AA'] =  '/^AA[\d]{2,3}$/';                      // Members of the royal family

        // Normal sidecodes
        $sidecodes[1] =     '/^[a-zA-Z]{2}[\d]{2}[\d]{2}$/';        // 1 XX-99-99
        $sidecodes[2] =     '/^[\d]{2}[\d]{2}[a-zA-Z]{2}$/';        // 2 99-99-XX
        $sidecodes[3] =     '/^[\d]{2}[a-zA-Z]{2}[\d]{2}$/';        // 3 99-XX-99
        $sidecodes[4] =     '/^[a-zA-Z]{2}[\d]{2}[a-zA-Z]{2}$/';    // 4 XX-99-XX
        $sidecodes[5] =     '/^[a-zA-Z]{2}[a-zA-Z]{2}[\d]{2}$/';    // 5 XX-XX-99
        $sidecodes[6] =     '/^[\d]{2}[a-zA-Z]{2}[a-zA-Z]{2}$/';    // 6 99-XX-XX
        $sidecodes[7] =     '/^[\d]{2}[a-zA-Z]{3}[\d]{1}$/';        // 7 99-XXX-9
        $sidecodes[8] =     '/^[\d]{1}[a-zA-Z]{3}[\d]{2}$/';        // 8 9-XXX-99
        $sidecodes[9] =     '/^[a-zA-Z]{2}[\d]{3}[a-zA-Z]{1}$/';    // 9 XX-999-X
        $sidecodes[10] =    '/^[a-zA-Z]{1}[\d]{3}[a-zA-Z]{2}$/';    // 10 X-999-XX
        $sidecodes[11] =    '/^[a-zA-Z]{3}[\d]{2}[a-zA-Z]{1}$/';    // 11 XXX-99-X
        $sidecodes[12] =    '/^[a-zA-Z]{1}[\d]{2}[a-zA-Z]{3}$/';    // 12 X-99-XXX
        $sidecodes[13] =    '/^[\d]{1}[a-zA-Z]{2}[\d]{3}$/';        // 13 9-XX-999
        $sidecodes[14] =    '/^[\d]{3}[a-zA-Z]{2}[\d]{1}$/';        // 14 999-XX-9

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
            case 'CD':
                if(strlen($licenseplate) < 6)
                {
                    return 'CD-' . substr($licenseplate, 2);
                }
                else
                {
                    return 'CD-' . substr($licenseplate, 2, 2) . "-" . substr($licenseplate, 4, 2);
                }

            case 'CDJ':
                return 'CDJ-' . substr($licenseplate, 3);

            case 'AA':
                return 'AA-' . substr($licenseplate, 2);

            case 7:
            case 9:
                // XX-XXX-X
                return substr($licenseplate, 0, 2) . '-' . substr($licenseplate, 2, 3) .'-' . substr($licenseplate, 5, 1);

            case 8:
            case 10:
                // X-XXX-XX
                return substr($licenseplate, 0, 1) . '-' . substr($licenseplate, 1, 3) . '-' . substr($licenseplate, 4, 2);

            case 11:
            case 14:
                // XXX-XX-X
                return substr($licenseplate, 0, 3) . '-' . substr($licenseplate, 3, 2) . '-' . substr($licenseplate, 5, 1);

            case 12:
            case 13:
                // X-XX-XXX
                return substr($licenseplate, 0, 1) . '-' . substr($licenseplate, 1, 2) . '-' . substr($licenseplate, 3, 3);

            default:
                // Sidecodes 1-6: XX-XX-XX
                return substr($licenseplate, 0, 2) . '-' . substr($licenseplate, 2, 2) . '-' . substr($licenseplate, 4, 2);
        }
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
        return 'NL';
    }

    public function getThreeLetterISO()
    {
        return 'NLD';
    }
}
