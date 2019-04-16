<?php
use Intrepidity\LicensePlate\FrenchLicensePlate;

class FrenchLicensePlateFormatTest extends \PHPUnit\Framework\TestCase
{
    public function testFormat()
    {
        $licenseplate = new FrenchLicensePlate('12345678');
        $this->assertTrue($licenseplate->isValid());
        $this->assertEquals($licenseplate->format(), '12345678');

        $licenseplate = new FrenchLicensePlate('99d1234x');
        $this->assertTrue($licenseplate->isValid());
        $this->assertEquals($licenseplate->format(), '99D-1234X');

        $licenseplate = new FrenchLicensePlate('999d1234x');
        $this->assertTrue($licenseplate->isValid());
        $this->assertEquals($licenseplate->format(), '999D-1234X');

        $licenseplate = new FrenchLicensePlate('99xx99');
        $this->assertTrue($licenseplate->isValid());
        $this->assertEquals($licenseplate->format(), '99-XX-99');

        $licenseplate = new FrenchLicensePlate('999xx99');
        $this->assertTrue($licenseplate->isValid());
        $this->assertEquals($licenseplate->format(), '999-XX-99');

        $licenseplate = new FrenchLicensePlate('9999xx99');
        $this->assertTrue($licenseplate->isValid());
        $this->assertEquals($licenseplate->format(), '9999-XX-99');

        $licenseplate = new FrenchLicensePlate('999xxx99');
        $this->assertTrue($licenseplate->isValid());
        $this->assertEquals($licenseplate->format(), '999-XXX-99');

        $licenseplate = new FrenchLicensePlate('999xxx999');
        $this->assertTrue($licenseplate->isValid());
        $this->assertEquals($licenseplate->format(), '999-XXX-999');

        $licenseplate = new FrenchLicensePlate('xx999xx');
        $this->assertTrue($licenseplate->isValid());
        $this->assertEquals($licenseplate->format(), 'XX-999-XX');
    }
}