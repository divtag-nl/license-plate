<?php
class ItalianLicensePlateFormatTest extends \PHPUnit\Framework\TestCase
{
    /**
     * @param $licenseplate
     * @param $expectedOutput
     * @dataProvider sidecodeDataProvider
     */
    public function testGetSidecode($licenseplate, $expectedOutput)
    {
        $sut = new \Intrepidity\LicensePlate\ItalianLicensePlate($licenseplate);

        $this->assertEquals(
            $expectedOutput,
            $sut->format()
        );
    }

    public function sidecodeDataProvider()
    {
        return [
            ['AA123AA', 'AA-123-AA'],
            ['BG963AD', 'BG-963-AD']
        ];
    }
}