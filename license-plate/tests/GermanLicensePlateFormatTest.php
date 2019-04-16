<?php
use Intrepidity\LicensePlate\GermanLicensePlate;

class GermanLicensePlateFormatTest extends \PHPUnit\Framework\TestCase
{
    public function testDefaultFormat()
    {
        //test magical license plate formatting #1
        $licenseplate = new GermanLicensePlate('aaaa900');
        $this->assertEquals('AA AA 900', $licenseplate->format(GermanLicensePlate::SIDE_CODE_DEFAULT));

        //test magical license plate formatting #2 (priority to smallest district)
        $licenseplate = new GermanLicensePlate('aaa900');
        $this->assertEquals('A AA 900', $licenseplate->format(GermanLicensePlate::SIDE_CODE_DEFAULT));

        //test respecting given format with space
        $licenseplate = new GermanLicensePlate('aa n900');
        $this->assertEquals('AA N 900', $licenseplate->format(GermanLicensePlate::SIDE_CODE_DEFAULT));

        //test respecting given format with dash
        $licenseplate = new GermanLicensePlate('aa-n900');
        $this->assertEquals('AA N 900', $licenseplate->format(GermanLicensePlate::SIDE_CODE_DEFAULT));

        //test not respecting given format with dash but incorrect format
        $licenseplate = new GermanLicensePlate('aan 900');
        $this->assertEquals('A AN 900', $licenseplate->format(GermanLicensePlate::SIDE_CODE_DEFAULT));

        $licenseplate = new GermanLicensePlate('a an900');
        $this->assertEquals('A AN 900', $licenseplate->format(GermanLicensePlate::SIDE_CODE_DEFAULT));

        $licenseplate = new GermanLicensePlate('a-an900');
        $this->assertEquals('A AN 900', $licenseplate->format(GermanLicensePlate::SIDE_CODE_DEFAULT));

        $licenseplate = new GermanLicensePlate('a aaa900');
        $this->assertEquals('AA AA 900', $licenseplate->format(GermanLicensePlate::SIDE_CODE_DEFAULT));

        //test 3 letter district, just to be sure
        $licenseplate = new GermanLicensePlate('noh a900');
        $this->assertEquals('NOH A 900', $licenseplate->format(GermanLicensePlate::SIDE_CODE_DEFAULT));

        //test 3 letter district with magical formatting, picks the smallest which in this case is still NOH
        $licenseplate = new GermanLicensePlate('noha900');
        $this->assertEquals('NOH A 900', $licenseplate->format(GermanLicensePlate::SIDE_CODE_DEFAULT));

    }

    public function testElectricFormat()
    {
        $licenseplate = new GermanLicensePlate('bnel269e');
        $this->assertEquals('BN EL 269E', $licenseplate->format(GermanLicensePlate::SIDE_CODE_ELECTRICAL));

        $licenseplate = new GermanLicensePlate('bnel269E');
        $this->assertEquals('BN EL 269E', $licenseplate->format(GermanLicensePlate::SIDE_CODE_ELECTRICAL));

        $licenseplate = new GermanLicensePlate('BNEL269E');
        $this->assertEquals('BN EL 269E', $licenseplate->format(GermanLicensePlate::SIDE_CODE_ELECTRICAL));

        $licenseplate = new GermanLicensePlate('sb ac 23e');
        $this->assertEquals('SB AC 23E', $licenseplate->format(GermanLicensePlate::SIDE_CODE_ELECTRICAL));

        $licenseplate = new GermanLicensePlate('m zx 726e');
        $this->assertEquals('M ZX 726E', $licenseplate->format(GermanLicensePlate::SIDE_CODE_ELECTRICAL));

        $licenseplate = new GermanLicensePlate('b ge 6900e');
        $this->assertEquals('B GE 6900E', $licenseplate->format(GermanLicensePlate::SIDE_CODE_ELECTRICAL));

        $licenseplate = new GermanLicensePlate('li fi 21e');
        $this->assertEquals('LI FI 21E', $licenseplate->format(GermanLicensePlate::SIDE_CODE_ELECTRICAL));
    }

    public function testHistoricalFormat()
    {
        $licenseplate = new GermanLicensePlate('e ra 55h');
        $this->assertEquals('E RA 55H', $licenseplate->format(GermanLicensePlate::SIDE_CODE_HISTORICAL));

        $licenseplate = new GermanLicensePlate('e ra 55H');
        $this->assertEquals('E RA 55H', $licenseplate->format(GermanLicensePlate::SIDE_CODE_HISTORICAL));

        $licenseplate = new GermanLicensePlate('wes q 501h');
        $this->assertEquals('WES Q 501H', $licenseplate->format(GermanLicensePlate::SIDE_CODE_HISTORICAL));

        $licenseplate = new GermanLicensePlate('re mb 848h');
        $this->assertEquals('RE MB 848H', $licenseplate->format(GermanLicensePlate::SIDE_CODE_HISTORICAL));

        $licenseplate = new GermanLicensePlate('me nb 7h');
        $this->assertEquals('ME NB 7H', $licenseplate->format(GermanLicensePlate::SIDE_CODE_HISTORICAL));

        //test random WITH giving uppercase and correct format
        $licenseplate = new GermanLicensePlate('ME NB 7H');
        $this->assertEquals('ME NB 7H', $licenseplate->format(GermanLicensePlate::SIDE_CODE_HISTORICAL));

        //test random WITH giving uppercase and correct format, just with dashes instead of spaces
        $licenseplate = new GermanLicensePlate('ME-NB-7H');
        $this->assertEquals('ME NB 7H', $licenseplate->format(GermanLicensePlate::SIDE_CODE_HISTORICAL));

        $licenseplate = new GermanLicensePlate('mk b 260h');
        $this->assertEquals('MK B 260H', $licenseplate->format(GermanLicensePlate::SIDE_CODE_HISTORICAL));
    }

    public function testPoliticalHeadsFormat()
    {
        $licenseplate = new GermanLicensePlate('0-1');
        $this->assertEquals('0-1', $licenseplate->format(GermanLicensePlate::SIDE_CODE_POLITICAL_HEADS));

        $licenseplate = new GermanLicensePlate('0 1');
        $this->assertEquals('0-1', $licenseplate->format(GermanLicensePlate::SIDE_CODE_POLITICAL_HEADS));

        $licenseplate = new GermanLicensePlate('01');
        $this->assertEquals('0-1', $licenseplate->format(GermanLicensePlate::SIDE_CODE_POLITICAL_HEADS));

        $licenseplate = new GermanLicensePlate('02');
        $this->assertEquals('0-2', $licenseplate->format(GermanLicensePlate::SIDE_CODE_POLITICAL_HEADS));

        $licenseplate = new GermanLicensePlate('03');
        $this->assertEquals('0-3', $licenseplate->format(GermanLicensePlate::SIDE_CODE_POLITICAL_HEADS));

        $licenseplate = new GermanLicensePlate('04');
        $this->assertEquals('0-4', $licenseplate->format(GermanLicensePlate::SIDE_CODE_POLITICAL_HEADS));

        $licenseplate = new GermanLicensePlate('11');
        $this->assertEquals('1-1', $licenseplate->format(GermanLicensePlate::SIDE_CODE_POLITICAL_HEADS));
    }

    public function testCorpsDiplomaticFormat()
    {
        $licenseplate = new GermanLicensePlate('04422');
        $this->assertEquals('0-44-22', $licenseplate->format(GermanLicensePlate::SIDE_CODE_CORPS_DIPLOMATIC));

        $licenseplate = new GermanLicensePlate('0 100 100');
        $this->assertEquals('0-100-100', $licenseplate->format(GermanLicensePlate::SIDE_CODE_CORPS_DIPLOMATIC));

        $licenseplate = new GermanLicensePlate('0-17-112');
        $this->assertEquals('0-17-112', $licenseplate->format(GermanLicensePlate::SIDE_CODE_CORPS_DIPLOMATIC));

        $licenseplate = new GermanLicensePlate('0 17 112');
        $this->assertEquals('0-17-112', $licenseplate->format(GermanLicensePlate::SIDE_CODE_CORPS_DIPLOMATIC));

        $licenseplate = new GermanLicensePlate('0 17 175');
        $this->assertEquals('0-17-175', $licenseplate->format(GermanLicensePlate::SIDE_CODE_CORPS_DIPLOMATIC));

        $licenseplate = new GermanLicensePlate('0 59 114');
        $this->assertEquals('0-59-114', $licenseplate->format(GermanLicensePlate::SIDE_CODE_CORPS_DIPLOMATIC));

        //no way we could now this should be 0-166-1 instead of 0-16-61
        $licenseplate = new GermanLicensePlate('01661');
        $this->assertEquals('0-16-61', $licenseplate->format(GermanLicensePlate::SIDE_CODE_CORPS_DIPLOMATIC));

        $licenseplate = new GermanLicensePlate('0 166-1');
        $this->assertEquals('0-166-1', $licenseplate->format(GermanLicensePlate::SIDE_CODE_CORPS_DIPLOMATIC));

        $licenseplate = new GermanLicensePlate('0 158 1');
        $this->assertEquals('0-158-1', $licenseplate->format(GermanLicensePlate::SIDE_CODE_CORPS_DIPLOMATIC));

        $licenseplate = new GermanLicensePlate('0 100 9');
        $this->assertEquals('0-100-9', $licenseplate->format(GermanLicensePlate::SIDE_CODE_CORPS_DIPLOMATIC));

        $licenseplate = new GermanLicensePlate('0 110 1');
        $this->assertEquals('0-110-1', $licenseplate->format(GermanLicensePlate::SIDE_CODE_CORPS_DIPLOMATIC));
    }

    public function testAmericanForcesFormat()
    {
        $licenseplate = new GermanLicensePlate('IFAG238');
        $this->assertEquals('IF AG 238', $licenseplate->format(GermanLicensePlate::SIDE_CODE_AMERICAN_FORCES));

        $licenseplate = new GermanLicensePlate('HKML266');
        $this->assertEquals('HK ML 266', $licenseplate->format(GermanLicensePlate::SIDE_CODE_AMERICAN_FORCES));

        $licenseplate = new GermanLicensePlate('AFAJ952');
        $this->assertEquals('AF AJ 952', $licenseplate->format(GermanLicensePlate::SIDE_CODE_AMERICAN_FORCES));

        $licenseplate = new GermanLicensePlate('ADDV991');
        $this->assertEquals('AD DV 991', $licenseplate->format(GermanLicensePlate::SIDE_CODE_AMERICAN_FORCES));
    }

    public function testFederalPoliceFormat()
    {
        $licenseplate = new GermanLicensePlate('BP12345');
        $this->assertEquals('BP 12-345', $licenseplate->format(GermanLicensePlate::SIDE_CODE_FEDERAL_POLICE));

        $licenseplate = new GermanLicensePlate('BP 12345');
        $this->assertEquals('BP 12-345', $licenseplate->format(GermanLicensePlate::SIDE_CODE_FEDERAL_POLICE));

        $licenseplate = new GermanLicensePlate('BG12345');
        $this->assertEquals('BG 12-345', $licenseplate->format(GermanLicensePlate::SIDE_CODE_FEDERAL_POLICE));
    }

    public function testTechnicalReliefFormat()
    {
        $licenseplate = new GermanLicensePlate('THW80832');
        $this->assertEquals('THW 80832', $licenseplate->format(GermanLicensePlate::SIDE_CODE_TECHNICAL_RELIEF));

        $licenseplate = new GermanLicensePlate('THW8207');
        $this->assertEquals('THW 8207', $licenseplate->format(GermanLicensePlate::SIDE_CODE_TECHNICAL_RELIEF));
    }

    public function testArmyFormat()
    {
        $licenseplate = new GermanLicensePlate('Y127508');
        $this->assertEquals('Y-127 508', $licenseplate->format(GermanLicensePlate::SIDE_CODE_ARMY));

        $licenseplate = new GermanLicensePlate('Y401664');
        $this->assertEquals('Y-401 664', $licenseplate->format(GermanLicensePlate::SIDE_CODE_ARMY));

        $licenseplate = new GermanLicensePlate('Y85129');
        $this->assertEquals('Y-85 129', $licenseplate->format(GermanLicensePlate::SIDE_CODE_ARMY));
    }

    public function testNatoFormat()
    {
        $licenseplate = new GermanLicensePlate('X1234');
        $this->assertEquals('X-1234', $licenseplate->format(GermanLicensePlate::SIDE_CODE_NATO));

        $licenseplate = new GermanLicensePlate('x1234');
        $this->assertEquals('X-1234', $licenseplate->format(GermanLicensePlate::SIDE_CODE_NATO));

        $licenseplate = new GermanLicensePlate('x 1234');
        $this->assertEquals('X-1234', $licenseplate->format(GermanLicensePlate::SIDE_CODE_NATO));

        $licenseplate = new GermanLicensePlate('          x            1234         ');
        $this->assertEquals('X-1234', $licenseplate->format(GermanLicensePlate::SIDE_CODE_NATO));
    }
}