<?php
namespace Intrepidity\LicensePlate;

class ItalianLicensePlate extends AbstractLicensePlate implements LicensePlateInterface
{
    protected $sideCodes = [
        1 => '/^[ABCDEFGHJKLMNPRSTVWXYZ]{2}[\d]{3}[ABCDEFGHJKLMNPRSTVWXYZ]{2}$/' // 1994 - now
    ];

    public function format()
    {
        return
            substr($this->licenseplate, 0, 2) . '-' .
            substr($this->licenseplate, 2, 3) . '-' .
            substr($this->licenseplate, 5, 2);
    }

    public function isValid()
    {
        return $this->checkPatterns($this->sideCodes, $this->licenseplate) !== false;
    }

    public function getSidecode()
    {
        return $this->checkPatterns($this->sideCodes, $this->licenseplate);
    }

    /** Country codes as per https://en.wikipedia.org/wiki/ISO_3166-1#Current_codes */
    public function getTwoLetterISO()
    {
        return 'IT';
    }

    public function getThreeLetterISO()
    {
        return 'ITA';
    }
}