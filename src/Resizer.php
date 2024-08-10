<?php

namespace Cyve\Resize;

use Imagine\Gd\Imagine;
use Imagine\Image\Box;
use Imagine\Image\ManipulatorInterface;

class Resizer
{
    private Imagine $imagine;

    public function __construct()
    {
        $this->imagine = new Imagine();
    }

    public function resize(\SplFileInfo $file, float $ratio): void
    {
        $image = $this->imagine->open($file->getRealPath());

        $originalSize = $image->getSize();
        $originalWidth = $originalSize->getWidth();
        $originalHeight = $originalSize->getHeight();
        $originalRatio = $originalHeight / $originalWidth;

        if ($originalRatio > 1) {
            $image = $image->rotate(90);
        }

        $box = match ($originalRatio > $ratio) {
            true => new Box($originalWidth, $originalWidth * $ratio),
            false => new Box($originalHeight / $ratio, $originalHeight),
        };
        if ($box->getWidth() > 1920) {
            $box = $box->widen(1920);
        }

        $image = $image->thumbnail($box, ManipulatorInterface::THUMBNAIL_OUTBOUND);

        $image->save($file->getPathname(), ['jpeg_quality' => 100, 'png_compression_level' => 9, 'webp_quality' => 100]);
    }
}
