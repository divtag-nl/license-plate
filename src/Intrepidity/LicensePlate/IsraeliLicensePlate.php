<?php
namespace Intrepidity\LicensePlate;

class IsraeliLicensePlate extends AbstractLicensePlate implements LicensePlateInterface
{
    public function getSidecode()
    {
        $licenseplate = str_replace('-', '', $this->licenseplate);

        $sidecodes = array();
        $sidecodes['MTZ'] = '/^מצ[\d]{1,5}$/'; // Military police license plate
        $sidecodes['M'] = '/^מ[\d]{1,7}$/'; // Police license plate
        $sidecodes['TZ'] = '/^צ[\d]{1,7}$/'; // Military license plate
        $sidecodes[1] = '/^[\d]{7}$/'; // Basic license plate

        return $this->checkPatterns($sidecodes, $licenseplate);
    }

    /**
     * Tests if the license plate is valid
     * The license plate is valid if the string contains 7 numeric characters (and dashes)
     *
     * @return bool
     */
    public function isValid()
    {
        return $this->getSidecode() != false;
    }

    /**
     * Format the license plate
     *
     * Example: will output 12-345-67 for input of 1234567
     *
     * @return string Formatted license plate
     */
    public function format()
    {
        $licenseplate = strtoupper(str_replace(array('-', '.'), '', $this->licenseplate));

        if(false === $this->isValid())
        {
            return false;
        }

        switch($this->getSidecode())
        {
            case 1:
                return substr($licenseplate, 0, 2) . '-' . substr($licenseplate, 2, 3) . '-' . substr($licenseplate, 5, 2);
                break;

            case 'M':
                return 'מ-' . mb_substr($licenseplate, 1);
                break;

            case 'TZ':
                return 'צ-' . mb_substr($licenseplate, 1);
                break;

            case 'MTZ':
                return 'מצ-'.mb_substr($licenseplate, 2);
                break;

            default:
                return $licenseplate; // Formatting for special license plates not yet implemented
                break;
        }
    }

    public function getTwoLetterISO()
    {
        return 'IL';
    }

    public function getThreeLetterISO()
    {
        return 'ISR';
    }
}