<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require_once APPPATH . 'libraries/BaconQrCode/vendor/autoload.php';

use BaconQrCode\Renderer\Image\Png;
use BaconQrCode\Writer;

class QrCodeGenerator
{
    public function generateQRCode($data, $filename, $width = 200, $height = 200)
    {
        $renderer = new Png();
        $renderer->setWidth($width);
        $renderer->setHeight($height);

        $writer = new Writer($renderer);
        $writer->writeFile($data, $filename);
    }
}
