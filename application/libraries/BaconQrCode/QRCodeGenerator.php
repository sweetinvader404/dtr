// app/libraries/BaconQrCode/QRCodeGenerator.php

<?php
namespace BaconQrCode;

use BaconQrCode\Renderer\Image\Png;
use BaconQrCode\Writer;

class QRCodeGenerator {
    public function generateQRCode($data) {
        $renderer = new Png();
        $renderer->setWidth(256);
        $renderer->setHeight(256);
        $writer = new Writer($renderer);

        // Save the QR code image to a public-accessible folder
        $path = 'public/qrcodes/';
        $file = $path . 'qr_code.png';
        file_put_contents($file, $writer->writeString($data));

        return base_url($file);
    }
}
