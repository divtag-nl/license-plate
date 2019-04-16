<?php
class ItalianLicensePlateSidecodeTest extends \PHPUnit\Framework\TestCase
{
    /**
     * @param $licenseplate
     * @param $expectedSidecode
     * @dataProvider sidecodeDataProvider
     */
    public function testGetSidecode($licenseplate, $expectedSidecode)
    {
        $sut = new \Intrepidity\LicensePlate\ItalianLicensePlate($licenseplate);

        $this->assertEquals(
            $expectedSidecode,
            $sut->getSidecode()
        );
    }

    public function sidecodeDataProvider()
    {
        return [
            ['AA123AA', 1],
            ['AQ123AA', false],
            ['A123AA', false],
            ['AA1234AA', false],
            ['BG963AD', 1]
        ];
    }
}