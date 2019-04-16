<?php
namespace Intrepidity\LicensePlate;

class BelgianLicensePlate extends AbstractLicensePlate implements LicensePlateInterface
{
    /**
     * Get the sidecode (series) of the numberplate
     *
     * More info: http://nl.wikipedia.org/wiki/Belgisch_kenteken#Vorm (Dutch)
     *
     * @return bool|int
     */
    public function getSidecode()
    {
        $licenseplate = strtoupper(str_replace(array('.', '-'), '', $this->licenseplate));
        $sidecodes = array();
        $sidecodes[1] = '/^[a-zA-Z0-9]{1}[\d]{3}[a-zA-Z]{1}$/'; // 4 X.999.X and 9.999.X (1971-1973)
        $sidecodes[2] = '/^[a-zA-Z]{3}[\d]{3}$/';       // 5 XXX-999 (1973-2008)
        $sidecodes[3] = '/^[\d]{3}[a-zA-Z]{3}$/';       // 6 999-XXX (2008-2010)
        $sidecodes[4] = '/^[\d]{1}[a-zA-Z]{3}[\d]{3}$/';// 7 9-XXX-999 (2010-current)
        $sidecodes[5] = '/^[\d]{4}[a-zA-Z]{3}$/';       // 8 9-999-XXX (2010-current)

        return $this->checkPatterns($sidecodes, $licenseplate);
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

    /**
     * Format the license plate
     *
     * Example: will output 196-BTD for input of 196btd
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

        $licenseplate = strtoupper(str_replace(array('-', '.'), '', $this->licenseplate));

        switch($sidecode)
        {
            case 1:
                return substr($licenseplate, 0, 1) . "." . substr($licenseplate, 1, 3) . "." . substr($licenseplate, 4, 1);

            case 2:
            case 3:
                return substr($licenseplate, 0, 3) . "-" . substr($licenseplate, 3, 3);

            case 4:
            case 5:
                return substr($licenseplate, 0, 1) . "-" . substr($licenseplate, 1, 3) . "-" . substr($licenseplate, 4, 3);
        }
    }

    public function getTwoLetterISO()
    {
        return 'BE';
    }

    public function getThreeLetterISO()
    {
        return 'BEL';
    }
}