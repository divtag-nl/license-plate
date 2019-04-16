<?php
use Intrepidity\LicensePlate\UKLicensePlate;

class UKLicensePlateSidecodeTest extends \PHPUnit\Framework\TestCase
{
    public function testSidecodeJer()
    {
        $licenseplate = new UKLicensePlate('J123456');
        $this->assertEquals($licenseplate->getSidecode(), 'JER');
        $this->assertTrue($licenseplate->isValid());
    }

    public function testSidecodeGue()
    {
        $licenseplate = new UKLicensePlate('12346');
        $this->assertEquals($licenseplate->getSidecode(), 'GUE');
        $this->assertTrue($licenseplate->isValid());
    }

    public function testSidecodeAld()
    {
        $licenseplate = new UKLicensePlate('AY1234');
        $this->assertEquals($licenseplate->getSidecode(), 'ALD');
        $this->assertTrue($licenseplate->isValid());
    }

    public function testSidecode1()
    {
        $licenseplate = new UKLicensePlate('BD1234');
        $this->assertEquals($licenseplate->getSidecode(), 1);
        $this->assertTrue($licenseplate->isValid());

        $licenseplate = new UKLicensePlate('AK12GMCC');
        $this->assertFalse($licenseplate->getSidecode());
        $this->assertFalse($licenseplate->isValid());
    }

    public function testSidecode2()
    {
        $licenseplate = new UKLicensePlate('AAA999');
        $this->assertEquals($licenseplate->getSidecode(), 2);
        $this->assertTrue($licenseplate->isValid());

        $licenseplate = new UKLicensePlate('AAA9');
        $this->assertEquals($licenseplate->getSidecode(), 2);
        $this->assertTrue($licenseplate->isValid());

        $licenseplate = new UKLicensePlate('1000 E');
        $this->assertEquals($licenseplate->getSidecode(), 2);
        $this->assertTrue($licenseplate->isValid());

        $licenseplate = new UKLicensePlate('1 AAA');
        $this->assertEquals($licenseplate->getSidecode(), 2);
        $this->assertTrue($licenseplate->isValid());
    }

    public function testSidecode3()
    {
        $licenseplate = new UKLicensePlate('BD1234A');
        $this->assertEquals($licenseplate->getSidecode(), 3);
        $this->assertTrue($licenseplate->isValid());
    }

    public function testSidecode4()
    {
        $licenseplate = new UKLicensePlate('a21aaa');
        $this->assertEquals($licenseplate->getSidecode(),4);
        $this->assertTrue($licenseplate->isValid());

        $licenseplate = new UKLicensePlate('y999yyy');
        $this->assertEquals($licenseplate->getSidecode(),4);
        $this->assertTrue($licenseplate->isValid());
    }

    public function testSidecode5()
    {
        $licenseplate = new UKLicensePlate('BD51GMQ');
        $this->assertEquals($licenseplate->getSidecode(), 5);
        $this->assertTrue($licenseplate->isValid());

        $licenseplate = new UKLicensePlate('AK12GMCC');
        $this->assertFalse($licenseplate->getSidecode());
        $this->assertFalse($licenseplate->isValid());
    }
}