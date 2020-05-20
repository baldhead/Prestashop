<?php

/*
 * This file is part of the Symfony package.
 *
 * (c) Fabien Potencier <fabien@symfony.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
namespace _PhpScoper5ea00cc67502b\Symfony\Component\Config\Exception;

use Exception;
use function implode;
use function sprintf;

/**
 * Exception class for when a circular reference is detected when importing resources.
 *
 * @author Fabien Potencier <fabien@symfony.com>
 */
class FileLoaderImportCircularReferenceException extends FileLoaderLoadException
{
    public function __construct(array $resources, $code = null, $previous = null)
    {
        $message = sprintf('Circular reference detected in "%s" ("%s" > "%s").', $this->varToString($resources[0]), implode('" > "', $resources), $resources[0]);
        Exception::__construct($message, $code, $previous);
    }
}