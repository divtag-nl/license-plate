<?php
namespace Intrepidity\LicensePlate;

class SpanishLicensePlate extends AbstractLicensePlate implements LicensePlateInterface
{
    protected $regionCodes = [
        'A', 'AB', 'AL', 'ALB', 'AOE', 'AV',
        'B', 'BA', 'BI', 'BU',
        'C', 'CA', 'CAC', 'CAS', 'CC', 'CE', 'CO', 'CR', 'CS', 'CU',
        'FP',
        'GC', 'GE', 'GI', 'GR', 'GU',
        'H', 'HU',
        'I', 'IB', 'IF',
        'J',
        'L', 'LE', 'LO', 'LR', 'LU',
        'M', 'MA', 'ME', 'ML', 'MU',
        'NA',
        'O', 'OR', 'OU',
        'P', 'PA', 'PM', 'PO',
        'RM',
        'S', 'SA', 'SE', 'SEG', 'SG', 'SH', 'SO', 'SS',
        'T', 'TE', 'TEG', 'TER', 'TF', 'TG', 'TO',
        'V', 'VA', 'VI',
        'Z', 'ZA',
    ];

    protected $specialCodes = [
        'CME', 'DGP', 'CNP', 'E', 'EA', 'ET', 'FN', 'GSH', 'PGC', 'MF', 'MMA', 'MOP', 'PME', 'PMM'
    ];

    protected $colorCodes = [
        'C', 'E', 'H', 'P', 'R', 'S', 'T', 'V'
    ];

    protected $sideCodes = [];

    public function __construct($licensePlate)
    {
        parent::__construct(strtoupper($licensePlate));

        $oldPrefixRegex = "(" . implode("|", $this->regionCodes) . "|" . implode("|", $this->specialCodes) . ")";
        $newPrefixRegex = "(" . implode("|", $this->colorCodes) . ")?";

        $this->sideCodes = [
            1 => "/^{$oldPrefixRegex}([\d]{1,6})$/",              // 1900 - 1971
            2 => "/^{$oldPrefixRegex}([\d]{4})([a-zA-Z]{1,2})$/",   // 1971 - 2000
            3 => "/^{$newPrefixRegex}([\d]{4})([a-zA-Z]{3})$/"      // 2000 - current
        ];
    }

    public function getSidecode()
    {
        return $this->checkPatterns($this->sideCodes, $this->licenseplate);
    }

    public function format()
    {
        $sideCode = $this->getSidecode();

        $parts = [];
        preg_match($this->sideCodes[$sideCode], $this->licenseplate, $parts);

        switch ($sideCode) {
            case 1:
                return $parts[1] . '-' . $parts[2];
                break;

            case 2:
                return $parts[1] . '-' . $parts[2] . '-'. $parts[3];
                break;

            case 3:
                if ($parts[1] !== '') {
                    return $parts[1] . '-' . $parts[2] . '-' . $parts[3];
                }

                return $parts[2] . '-' . $parts[3];

                break;
        }
    }

    public function isValid()
    {
        return $this->getSidecode() !== false;
    }

    public function getTwoLetterISO()
    {
        return 'ES';
    }

    public function getThreeLetterISO()
    {
        return 'ESP';
    }
}