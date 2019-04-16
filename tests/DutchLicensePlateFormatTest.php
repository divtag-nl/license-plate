<?php
use Intrepidity\LicensePlate\DutchLicensePlate;

class DutchLicensePlateFormatTest extends \PHPUnit\Framework\TestCase
{
    public function testFormat()
    {
        $licenseplate = new DutchLicensePlate('10aaa1');
        $this->assertEquals($licenseplate->format(), '10-AAA-1');

        $licenseplate = new DutchLicensePlate('10AAA1');
        $this->assertEquals($licenseplate->format(), '10-AAA-1');

        $licenseplate = new DutchLicensePlate('10-AAA-1');
        $this->assertEquals($licenseplate->format(), '10-AAA-1');

        $licenseplate = new DutchLicensePlate('10-AAA1');
        $this->assertEquals($licenseplate->format(), '10-AAA-1');

        $licenseplate = new DutchLicensePlate('1-0-a-a-a-1');
        $this->assertEquals($licenseplate->format(), '10-AAA-1');

        $licenseplate = new DutchLicensePlate('9abc99');
        $this->assertEquals($licenseplate->format(), '9-ABC-99');

        $licenseplate = new DutchLicensePlate('999xx9');
        $this->assertEquals($licenseplate->format(), '999-XX-9');

        $licenseplate = new DutchLicensePlate('9xx999');
        $this->assertEquals($licenseplate->format(), '9-XX-999');

        $licenseplate = new DutchLicensePlate('45fjvb');
        $this->assertEquals($licenseplate->format(), '45-FJ-VB');

        $licenseplate = new DutchLicensePlate('thisisnotalicenseplate');
        $this->assertFalse($licenseplate->format());

        $licenseplate = new DutchLicensePlate('08ttnp');
        $this->assertEquals($licenseplate->format(7), '08-TTN-P', 'Test format using specific sidecode');

        $licenseplate = new DutchLicensePlate('aa123');
        $this->assertEquals($licenseplate->format(), 'AA-123');

        $licenseplate = new DutchLicensePlate('cd123');
        $this->assertEquals($licenseplate->format(), 'CD-123');

        $licenseplate = new DutchLicensePlate('cdj123');
        $this->assertEquals($licenseplate->format(), 'CDJ-123');
    }
}