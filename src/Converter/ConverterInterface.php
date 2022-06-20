<?php

/*
 * This file is part of the PDF Version Converter.
 *
 * (c) Shahbaz Hassan <shahbazhassan24@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
namespace Shahbazhassan\PdfVersionConverter\Converter;

/**
 * Classes that implements this interface can convert the PDF version of given file.
 *
 * @author Shahbaz Hassan <shahbazhassan24@gmail.com>
 */
interface ConverterInterface
{
    /**
     * Change PDF version of given $file to $newVersion.
     * @param string $file absolute path.
     * @param string $newVersion version (1.4, 1.5, 1.6, etc).
     * @throws \RuntimeException if something goes wrong.
     * @return void
     */
    public function convert($file, $newVersion);
}
