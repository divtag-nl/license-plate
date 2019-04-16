<?php
use Intrepidity\LicensePlate\UKLicensePlate;

class UKLicensePlateFormatTest extends \PHPUnit\Framework\TestCase
{
    public function testFormat()
    {
        $licenseplate = new UKLicensePlate('bd51qmc');
        $this->assertTrue($licenseplate->isValid());
        $this->assertEquals($licenseplate->format(), 'BD51 QMC');

        $licenseplate = new UKLicensePlate('bbd1234');
        $this->assertTrue($licenseplate->isValid());
        $this->assertEquals($licenseplate->format(), 'BBD 1234');

        $licenseplate = new UKLicensePlate('bbd1234a');
        $this->assertTrue($licenseplate->isValid());
        $this->assertEquals($licenseplate->format(), 'BBD 1234A');

        $licenseplate = new UKLicensePlate('bd1234');
        $this->assertTrue($licenseplate->isValid());
        $this->assertEquals($licenseplate->format(), 'BD 1234');

        $licenseplate = new UKLicensePlate('1ia');
        $this->assertTrue($licenseplate->isValid());
        $this->assertEquals($licenseplate->format(), '1 IA');

        $licenseplate = new UKLicensePlate('9999ia');
        $this->assertTrue($licenseplate->isValid());
        $this->assertEquals($licenseplate->format(), '9999 IA');

        $licenseplate = new UKLicensePlate('aaa999');
        $this->assertTrue($licenseplate->isValid());
        $this->assertEquals($licenseplate->format(), 'AAA 999');

        $licenseplate = new UKLicensePlate('aaa9');
        $this->assertTrue($licenseplate->isValid());
        $this->assertEquals($licenseplate->format(), 'AAA 9');

        $licenseplate = new UKLicensePlate('999xxx');
        $this->assertTrue($licenseplate->isValid());
        $this->assertEquals($licenseplate->format(), '999 XXX');

        $licenseplate = new UKLicensePlate('1000a');
        $this->assertTrue($licenseplate->isValid());
        $this->assertEquals($licenseplate->format(), '1000 A');

        $licenseplate = new UKLicensePlate('a11aaa');
        $this->assertTrue($licenseplate->isValid());
        $this->assertEquals($licenseplate->format(), 'A11 AAA');

        $licenseplate = new UKLicensePlate('y999yyy');
        $this->assertTrue($licenseplate->isValid());
        $this->assertEquals($licenseplate->format(), 'Y999 YYY');
    }
}