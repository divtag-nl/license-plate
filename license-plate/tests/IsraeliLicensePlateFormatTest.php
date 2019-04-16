<?php
use Intrepidity\LicensePlate\IsraeliLicensePlate;

class IsraeliLicensePlateFormatTest extends \PHPUnit\Framework\TestCase
{
    public function testFormat()
    {
        $licenseplate = new IsraeliLicensePlate('2952165');
        $this->assertTrue($licenseplate->isValid());
        $this->assertEquals($licenseplate->format(), '29-521-65');

        $licenseplate = new IsraeliLicensePlate('123456');
        $this->assertFalse($licenseplate->isValid());
        $this->assertFalse($licenseplate->format());

        $licenseplate = new IsraeliLicensePlate('123456a');
        $this->assertFalse($licenseplate->isValid());
        $this->assertFalse($licenseplate->format());

        $licenseplate = new IsraeliLicensePlate('מ1234');
        $this->assertTrue($licenseplate->isValid());
        $this->assertEquals($licenseplate->format(), 'מ-1234');

        $licenseplate = new IsraeliLicensePlate('צ1234');
        $this->assertTrue($licenseplate->isValid());
        $this->assertEquals($licenseplate->format(), 'צ-1234');

        $licenseplate = new IsraeliLicensePlate('מצ1234');
        $this->assertTrue($licenseplate->isValid());
        $this->assertEquals($licenseplate->format(), 'מצ-1234');
    }
}