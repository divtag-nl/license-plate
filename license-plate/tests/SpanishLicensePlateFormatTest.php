<?php
class SpanishLicensePlateFormatTest extends \PHPUnit\Framework\TestCase
{
    /**
     * @dataProvider sideCodeDataProvider
     * @param $licenseplate
     * @param $expectedformat
     */
    public function testGetSidecode($licenseplate, $expectedformat)
    {
        $sut = new \Intrepidity\LicensePlate\SpanishLicensePlate($licenseplate);

        $this->assertEquals($expectedformat, $sut->format());
    }

    /**
     * @return array
     */
    public function sideCodeDataProvider()
    {
        return [
            ['A123456', 'A-123456'],
            ['A12345', 'A-12345'],
            ['TEG12345', 'TEG-12345'],
            ['tEg12345', 'TEG-12345'],

            ['TEG1234AA', 'TEG-1234-AA'],
            ['TEG1234A', 'TEG-1234-A'],
            ['A1234A', 'A-1234-A'],
            ['CNP1234AA', 'CNP-1234-AA'],

            ['1234AAA', '1234-AAA'],
            ['C1234AAA', 'C-1234-AAA'],
        ];
    }
}