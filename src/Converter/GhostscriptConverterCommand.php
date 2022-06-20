<?php

/*
 * This file is part of the PDF Version Converter.
 *
 * (c) Shahbaz Hassan <xthiago@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
namespace Shahbazhassan\PdfVersionConverter\Converter;

use Shahbazhassan\PdfVersionConverter\Process\Process;

/**
 * Encapsulates the knowledge about gs command.
 *
 * @author Shahbaz Hassan <xthiago@gmail.com>
 */
class GhostscriptConverterCommand
{
    /**
     * @var Filesystem
     */
    protected $baseCommand = 'gswin64 -sDEVICE=pdfwrite -dCompatibilityLevel=%s -dPDFSETTINGS=/screen -dNOPAUSE -dQUIET -dBATCH -dColorConversionStrategy=/LeaveColorUnchanged -dEncodeColorImages=false -dEncodeGrayImages=false -dEncodeMonoImages=false -dDownsampleMonoImages=false -dDownsampleGrayImages=false -dDownsampleColorImages=false -dAutoFilterColorImages=false -dAutoFilterGrayImages=false -dColorImageFilter=/FlateEncode -dGrayImageFilter=/FlateEncode  -sOutputFile=%s %s';

    public function __construct()
    {
    }

    public function run($originalFile, $newFile, $newVersion)
    {
        $command = sprintf($this->baseCommand, $newVersion, $newFile, escapeshellarg($originalFile));

        $process = new Process($command);
        $process->run();

        if (!$process->isSuccessful()) {
            throw new \RuntimeException($process->getErrorOutput());
        }
    }
}
