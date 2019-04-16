<?php
use Intrepidity\LicensePlate\FrenchLicensePlate;

class FrenchLicensePlateSidecodeTest extends \PHPUnit\Framework\TestCase
{
    public function testSidecodeMil()
    {
        $licenseplate = new FrenchLicensePlate('12345678');
        $this->assertEquals($licenseplate->getSidecode(), 'MIL');
        $this->assertTrue($licenseplate->isValid());
    }

    public function testSidecodeCiv()
    {
        $licenseplate = new FrenchLicensePlate('99D-1234X');
        $this->assertEquals($licenseplate->getSidecode(), 'CIV');
        $this->assertTrue($licenseplate->isValid());
    }

    public function testSidecode1()
    {
        $licenseplate = new FrenchLicensePlate('1234-AB-12');
        $this->assertEquals($licenseplate->getSidecode(), 1);
        $this->assertTrue($licenseplate->isValid());

        $licenseplate = new FrenchLicensePlate('12-ABC-972');
        $this->assertEquals($licenseplate->getSidecode(), 1);
        $this->assertTrue($licenseplate->isValid());
    }

    public function testSidecode2()
    {
        $licenseplate = new FrenchLicensePlate('AB-123-AB');
        $this->assertEquals($licenseplate->getSidecode(), 2);
        $this->assertTrue($licenseplate->isValid());
    }
}