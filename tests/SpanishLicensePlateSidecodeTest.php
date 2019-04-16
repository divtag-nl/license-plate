<?php
class SpanishLicensePlateSidecodeTest extends \PHPUnit\Framework\TestCase
{
    /**
     * @dataProvider sideCodeDataProvider
     * @param $licenseplate
     * @param $expectedSideCode
     */
    public function testGetSidecode($licenseplate, $expectedSideCode)
    {
        $sut = new \Intrepidity\LicensePlate\SpanishLicensePlate($licenseplate);

        $this->assertEquals($expectedSideCode, $sut->getSidecode());
    }

    /**
     * @return array
     */
    public function sideCodeDataProvider()
    {
        return [
            ['A123456', 1],
            ['A12345', 1],
            ['A1234567', false],
            ['X123456', false],
            ['TEG12345', 1],

            ['TEG1234AA', 2],
            ['TEG1234A', 2],
            ['X1234AA', false],
            ['A1234A', 2],
            ['CNP1234AA', 2],

            ['1234AAA', 3],
            ['12345AAA', false],
            ['C1234AAA', 3],
            ['X1234AAA', false]
        ];
    }
}