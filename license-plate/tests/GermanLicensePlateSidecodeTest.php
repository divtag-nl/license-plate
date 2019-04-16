<?php

use Intrepidity\LicensePlate\GermanLicensePlate;

class GermanLicensePlateSidecodeTest extends PHPUnit_Framework_TestCase
{
    public function testDistricts()
    {
        $licenseplate = new GermanLicensePlate('AANL900');
        $this->assertEquals(GermanLicensePlate::SIDE_CODE_DEFAULT, $licenseplate->getSidecode());
        $this->assertTrue($licenseplate->isValid());


        $licenseplate = new GermanLicensePlate('BBX900');
        $this->assertEquals(GermanLicensePlate::SIDE_CODE_DEFAULT, $licenseplate->getSidecode());
        $this->assertTrue($licenseplate->isValid());
    }

    public function testSidecodeE()
    {
        $licenseplate = new GermanLicensePlate('bnel269e');
        $this->assertEquals(GermanLicensePlate::SIDE_CODE_ELECTRICAL, $licenseplate->getSidecode());
        $this->assertTrue($licenseplate->isValid());

        $licenseplate = new GermanLicensePlate('sb ac 23e');
        $this->assertEquals(GermanLicensePlate::SIDE_CODE_ELECTRICAL, $licenseplate->getSidecode());
        $this->assertTrue($licenseplate->isValid());

        $licenseplate = new GermanLicensePlate('m zx 726e');
        $this->assertEquals(GermanLicensePlate::SIDE_CODE_ELECTRICAL, $licenseplate->getSidecode());
        $this->assertTrue($licenseplate->isValid());
    }

    public function testSidecodeH()
    {
        $licenseplate = new GermanLicensePlate('e ra 55h');
        $this->assertEquals(GermanLicensePlate::SIDE_CODE_HISTORICAL, $licenseplate->getSidecode());
        $this->assertTrue($licenseplate->isValid());

        $licenseplate = new GermanLicensePlate('wes q 501h');
        $this->assertEquals(GermanLicensePlate::SIDE_CODE_HISTORICAL, $licenseplate->getSidecode());
        $this->assertTrue($licenseplate->isValid());

        $licenseplate = new GermanLicensePlate('mk b 260h');
        $this->assertEquals(GermanLicensePlate::SIDE_CODE_HISTORICAL, $licenseplate->getSidecode());
        $this->assertTrue($licenseplate->isValid());
    }

    public function testSidecodeP()
    {
        $licenseplate = new GermanLicensePlate('01');
        $this->assertEquals(GermanLicensePlate::SIDE_CODE_POLITICAL_HEADS, $licenseplate->getSidecode());
        $this->assertTrue($licenseplate->isValid());

        $licenseplate = new GermanLicensePlate('11');
        $this->assertEquals(GermanLicensePlate::SIDE_CODE_POLITICAL_HEADS, $licenseplate->getSidecode());
        $this->assertTrue($licenseplate->isValid());

        $licenseplate = new GermanLicensePlate('02');
        $this->assertEquals(GermanLicensePlate::SIDE_CODE_POLITICAL_HEADS, $licenseplate->getSidecode());
        $this->assertTrue($licenseplate->isValid());

        $licenseplate = new GermanLicensePlate('03');
        $this->assertEquals(GermanLicensePlate::SIDE_CODE_POLITICAL_HEADS, $licenseplate->getSidecode());
        $this->assertTrue($licenseplate->isValid());

        $licenseplate = new GermanLicensePlate('04');
        $this->assertEquals(GermanLicensePlate::SIDE_CODE_POLITICAL_HEADS, $licenseplate->getSidecode());
        $this->assertTrue($licenseplate->isValid());
    }

    public function testSidecodeCD()
    {
        $licenseplate = new GermanLicensePlate('04422');
        $this->assertEquals(GermanLicensePlate::SIDE_CODE_CORPS_DIPLOMATIC, $licenseplate->getSidecode());
        $this->assertTrue($licenseplate->isValid());

        $licenseplate = new GermanLicensePlate('01337');
        $this->assertEquals(GermanLicensePlate::SIDE_CODE_CORPS_DIPLOMATIC, $licenseplate->getSidecode());
        $this->assertTrue($licenseplate->isValid());

        $licenseplate = new GermanLicensePlate('0133713');
        $this->assertEquals(GermanLicensePlate::SIDE_CODE_CORPS_DIPLOMATIC, $licenseplate->getSidecode());
        $this->assertTrue($licenseplate->isValid());
    }

    public function testSidecodeAF()
    {
        $licenseplate = new GermanLicensePlate('ADVD1234');
        $this->assertEquals(GermanLicensePlate::SIDE_CODE_AMERICAN_FORCES, $licenseplate->getSidecode());
        $this->assertTrue($licenseplate->isValid());

        $licenseplate = new GermanLicensePlate('AFG123');
        $this->assertEquals(GermanLicensePlate::SIDE_CODE_AMERICAN_FORCES, $licenseplate->getSidecode());
        $this->assertTrue($licenseplate->isValid());

        $licenseplate = new GermanLicensePlate('HKA1');
        $this->assertEquals(GermanLicensePlate::SIDE_CODE_AMERICAN_FORCES, $licenseplate->getSidecode());
        $this->assertTrue($licenseplate->isValid());

        $licenseplate = new GermanLicensePlate('IFAG238');
        $this->assertEquals(GermanLicensePlate::SIDE_CODE_AMERICAN_FORCES, $licenseplate->getSidecode());
        $this->assertTrue($licenseplate->isValid());
    }

    public function testSidecodeAG()
    {
        $licenseplate = new GermanLicensePlate('AGIR1337');
        $this->assertEquals(GermanLicensePlate::SIDE_CODE_SPECIAL_TRANSPORT, $licenseplate->getSidecode());
        $this->assertTrue($licenseplate->isValid());

        $licenseplate = new GermanLicensePlate('AGA9');
        $this->assertEquals(GermanLicensePlate::SIDE_CODE_SPECIAL_TRANSPORT, $licenseplate->getSidecode());
        $this->assertTrue($licenseplate->isValid());
    }

    public function testSidecodeBG()
    {
        $licenseplate = new GermanLicensePlate('BG137');
        $this->assertEquals(GermanLicensePlate::SIDE_CODE_FEDERAL_POLICE, $licenseplate->getSidecode());
        $this->assertTrue($licenseplate->isValid());

        $licenseplate = new GermanLicensePlate('BP133701');
        $this->assertEquals(GermanLicensePlate::SIDE_CODE_FEDERAL_POLICE, $licenseplate->getSidecode());
        $this->assertTrue($licenseplate->isValid());
    }

    public function testSidecodeTHW()
    {
        $licenseplate = new GermanLicensePlate('THW80832');
        $this->assertEquals(GermanLicensePlate::SIDE_CODE_TECHNICAL_RELIEF, $licenseplate->getSidecode());
        $this->assertTrue($licenseplate->isValid());

        $licenseplate = new GermanLicensePlate('THW8207');
        $this->assertEquals(GermanLicensePlate::SIDE_CODE_TECHNICAL_RELIEF, $licenseplate->getSidecode());
        $this->assertTrue($licenseplate->isValid());
    }

    public function testSidecodeY()
    {
        $licenseplate = new GermanLicensePlate('Y127508');
        $this->assertEquals(GermanLicensePlate::SIDE_CODE_ARMY, $licenseplate->getSidecode());
        $this->assertTrue($licenseplate->isValid());

        $licenseplate = new GermanLicensePlate('Y401664');
        $this->assertEquals(GermanLicensePlate::SIDE_CODE_ARMY, $licenseplate->getSidecode());
        $this->assertTrue($licenseplate->isValid());

        $licenseplate = new GermanLicensePlate('Y85129');
        $this->assertEquals(GermanLicensePlate::SIDE_CODE_ARMY, $licenseplate->getSidecode());
        $this->assertTrue($licenseplate->isValid());
    }

    public function testSidecodeX()
    {
        $licenseplate = new GermanLicensePlate('X1234');
        $this->assertEquals(GermanLicensePlate::SIDE_CODE_NATO, $licenseplate->getSidecode());
        $this->assertTrue($licenseplate->isValid());
    }
}