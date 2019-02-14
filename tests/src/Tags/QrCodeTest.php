<?php
namespace PhpPimacoTest;

use PHPUnit\Framework\TestCase;
use Proner\PhpPimaco\Tags\QrCode;

class QrCodeTest extends TestCase
{
    function test_render()
    {
        $qrcode = new QrCode('123456789');

        $render = "<img style='float: left' src='data:image/png;base64,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'>";
        $this->assertEquals($render,$qrcode->render());
    }

    function test_render_with_label()
    {
        $qrcode = new QrCode('123456789');
        $qrcode->setLabel('teste');

        $render = "<img style='float: left' src='data:image/png;base64,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'>";
        $this->assertEquals($render,$qrcode->render());
    }

    function test_render_with_br()
    {
        $qrcode = new QrCode('123456789');
        $qrcode->br();
        
        $render = "<img  src='data:image/png;base64,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'><br>";
        $this->assertEquals($render,$qrcode->render());
    }
}
