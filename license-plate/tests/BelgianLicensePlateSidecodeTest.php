<?php
require_once("src/Intrepidity/LicensePlate/DutchLicensePlate.php");
use Intrepidity\LicensePlate\BelgianLicensePlate;

class BelgianLicensePlateSidecodeTest extends \PHPUnit\Framework\TestCase
{
    public function testGetSidecode1()
    {
        $licenseplate = new BelgianLicensePlate('x999x');
        $this->assertEquals($licenseplate->getSidecode(), 1);
        $this->assertTrue($licenseplate->isValid());

        $licenseplate = new BelgianLicensePlate('9999x');
        $this->assertEquals($licenseplate->getSidecode(), 1);
        $this->assertTrue($licenseplate->isValid());
    }

    public function testGetSidecode2()
    {
        $licenseplate = new BelgianLicensePlate('xxx999');
        $this->assertEquals($licenseplate->getSidecode(), 2);
        $this->assertTrue($licenseplate->isValid());
    }

    public function testGetSidecode3()
    {
        $licenseplate = new BelgianLicensePlate('999xxx');
        $this->assertEquals($licenseplate->getSidecode(), 3);
        $this->assertTrue($licenseplate->isValid());
    }

    public function testGetSidecode4()
    {
        $licenseplate = new BelgianLicensePlate('9xxx999');
        $this->assertEquals($licenseplate->getSidecode(), 4);
        $this->assertTrue($licenseplate->isValid());
    }

    public function testGetSidecode5()
    {
        $licenseplate = new BelgianLicensePlate('9999xxx');
        $this->assertEquals($licenseplate->getSidecode(), 5);
        $this->assertTrue($licenseplate->isValid());
    }
}