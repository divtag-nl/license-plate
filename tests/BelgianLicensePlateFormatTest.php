<?php
use Intrepidity\LicensePlate\BelgianLicensePlate;

class BelgianLicensePlateFormatTest extends \PHPUnit\Framework\TestCase
{
    public function testFormat()
    {
        $licenseplate = new BelgianLicensePlate('x999x');
        $this->assertEquals($licenseplate->format(), 'X.999.X');

        $licenseplate = new BelgianLicensePlate('9999x');
        $this->assertEquals($licenseplate->format(), '9.999.X');

        $licenseplate = new BelgianLicensePlate('999XXX');
        $this->assertEquals($licenseplate->format(), '999-XXX');

        $licenseplate = new BelgianLicensePlate('xxx999');
        $this->assertEquals($licenseplate->format(), 'XXX-999');

        $licenseplate = new BelgianLicensePlate('9999xxx');
        $this->assertEquals($licenseplate->format(), '9-999-XXX');

        $licenseplate = new BelgianLicensePlate('9xxx999');
        $this->assertEquals($licenseplate->format(), '9-XXX-999');

        $licenseplate = new BelgianLicensePlate('9x-x.x-9.9-9');
        $this->assertEquals($licenseplate->format(), '9-XXX-999');

        $licenseplate = new BelgianLicensePlate('thisisnotalicenseplate');
        $this->assertFalse($licenseplate->format());
    }
}