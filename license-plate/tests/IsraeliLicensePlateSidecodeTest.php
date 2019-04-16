<?php
use Intrepidity\LicensePlate\IsraeliLicensePlate;

class IsraeliLicensePlateSidecodeTest extends \PHPUnit\Framework\TestCase
{
    public function testSidecode1()
    {
        $licenseplate = new IsraeliLicensePlate('1234567');
        $this->assertEquals($licenseplate->getSidecode(), 1);
        $this->assertTrue($licenseplate->isValid());
    }

    public function testSidecodeM()
    {
        $licenseplate = new IsraeliLicensePlate('מ-12');
        $this->assertEquals($licenseplate->getSidecode(), 'M');
        $this->assertTrue($licenseplate->isValid());
    }

    public function testSidecodeTZ()
    {
        $licenseplate = new IsraeliLicensePlate('צ-1234');
        $this->assertEquals($licenseplate->getSidecode(), 'TZ');
        $this->assertTrue($licenseplate->isValid());
    }

    public function testSidecodeMTZ()
    {
        $licenseplate = new IsraeliLicensePlate('מצ-123');
        $this->assertEquals($licenseplate->getSidecode(), 'MTZ');
        $this->assertTrue($licenseplate->isValid());
    }
}