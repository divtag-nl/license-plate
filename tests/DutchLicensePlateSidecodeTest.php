<?php
require_once("src/Intrepidity/LicensePlate/DutchLicensePlate.php");
use Intrepidity\LicensePlate\DutchLicensePlate;

class DutchLicensePlateSidecodeTest extends \PHPUnit\Framework\TestCase
{
    public function testGetSidecode1()
    {
        $licenseplate = new DutchLicensePlate('XX-99-99');
        $this->assertEquals($licenseplate->getSidecode(), 1);
        $this->assertTrue($licenseplate->isValid());
    }

    public function testGetSidecode2()
    {
        $licenseplate = new DutchLicensePlate('99-99-XX');
        $this->assertEquals($licenseplate->getSidecode(), 2);
        $this->assertTrue($licenseplate->isValid());
    }

    public function testGetSidecode3()
    {
        $licenseplate = new DutchLicensePlate('99-XX-99');
        $this->assertEquals($licenseplate->getSidecode(), 3);
        $this->assertTrue($licenseplate->isValid());
    }

    public function testGetSidecode4()
    {
        $licenseplate = new DutchLicensePlate('XX-99-XX');
        $this->assertEquals($licenseplate->getSidecode(), 4);
        $this->assertTrue($licenseplate->isValid());
    }

    public function testGetSidecode5()
    {
        $licenseplate = new DutchLicensePlate('XX-XX-99');
        $this->assertEquals($licenseplate->getSidecode(), 5);
        $this->assertTrue($licenseplate->isValid());
    }

    public function testGetSidecode6()
    {
        $licenseplate = new DutchLicensePlate('99-XX-XX');
        $this->assertEquals($licenseplate->getSidecode(), 6);
        $this->assertTrue($licenseplate->isValid());
    }

    public function testGetSidecode7()
    {
        $licenseplate = new DutchLicensePlate('99-XXX-9');
        $this->assertEquals($licenseplate->getSidecode(), 7);
        $this->assertTrue($licenseplate->isValid());
    }

    public function testGetSidecode8()
    {
        $licenseplate = new DutchLicensePlate('9-XXX-99');
        $this->assertEquals($licenseplate->getSidecode(), 8);
        $this->assertTrue($licenseplate->isValid());
    }

    public function testGetSidecode9()
    {
        $licenseplate = new DutchLicensePlate('XX-999-X');
        $this->assertEquals($licenseplate->getSidecode(), 9);
        $this->assertTrue($licenseplate->isValid());
    }

    public function testGetSidecode10()
    {
        $licenseplate = new DutchLicensePlate('X-999-XX');
        $this->assertEquals($licenseplate->getSidecode(), 10);
        $this->assertTrue($licenseplate->isValid());
    }

    public function testGetSidecode11()
    {
        $licenseplate = new DutchLicensePlate('XXX-99-X');
        $this->assertEquals($licenseplate->getSidecode(), 11);
        $this->assertTrue($licenseplate->isValid());
    }

    public function testGetSidecode12()
    {
        $licenseplate = new DutchLicensePlate('X-99-XXX');
        $this->assertEquals($licenseplate->getSidecode(), 12);
        $this->assertTrue($licenseplate->isValid());
    }

    public function testGetSidecode13()
    {
        $licenseplate = new DutchLicensePlate('9-XX-999');
        $this->assertEquals($licenseplate->getSidecode(), 13);
        $this->assertTrue($licenseplate->isValid());
    }

    public function testGetSidecode14()
    {
        $licenseplate = new DutchLicensePlate('999-XX-9');
        $this->assertEquals($licenseplate->getSidecode(), 14);
        $this->assertTrue($licenseplate->isValid());
    }

    public function testGetSidecodeCD()
    {
        $licenseplate = new DutchLicensePlate('CD123');
        $this->assertEquals($licenseplate->getSidecode(), 'CD');
        $this->assertTrue($licenseplate->isValid());

        $licenseplate = new DutchLicensePlate('CD1234');
        $this->assertEquals($licenseplate->getSidecode(), 'CD');
        $this->assertTrue($licenseplate->isValid());
    }

    public function testGetSidecodeCDJ()
    {
        $licenseplate = new DutchLicensePlate('CDJ123');
        $this->assertEquals($licenseplate->getSidecode(), 'CDJ');

        $licenseplate = new DutchLicensePlate('CDJ12');
        $this->assertEquals($licenseplate->getSidecode(), 'CDJ');

        $licenseplate = new DutchLicensePlate('CDJ1');
        $this->assertFalse($licenseplate->getSidecode());
    }

    public function testGetSidecodeAA()
    {
        $licenseplate = new DutchLicensePlate('AA12');
        $this->assertEquals($licenseplate->getSidecode(), 'AA');

        $licenseplate = new DutchLicensePlate('AA123');
        $this->assertEquals($licenseplate->getSidecode(), 'AA');

        $licenseplate = new DutchLicensePlate('AA1234');
        $this->assertEquals($licenseplate->getSidecode(), 1);
    }

    public function testGetSidecodeFalse()
    {
        $licenseplate = new DutchLicensePlate('12345');
        $this->assertFalse($licenseplate->getSidecode());
        $this->assertFalse($licenseplate->isValid());

        $licenseplate = new DutchLicensePlate('99-XX-9');
        $this->assertFalse($licenseplate->getSidecode());
        $this->assertFalse($licenseplate->isValid());

        $licenseplate = new DutchLicensePlate('CDC123');
        $this->assertFalse($licenseplate->getSidecode());
        $this->assertFalse($licenseplate->isValid());
    }
}