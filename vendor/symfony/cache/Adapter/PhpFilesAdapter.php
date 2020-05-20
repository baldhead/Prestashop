<?php

/*
 * This file is part of the Symfony package.
 *
 * (c) Fabien Potencier <fabien@symfony.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
namespace _PhpScoper5ea00cc67502b\Symfony\Component\Cache\Adapter;

use _PhpScoper5ea00cc67502b\Symfony\Component\Cache\Exception\CacheException;
use _PhpScoper5ea00cc67502b\Symfony\Component\Cache\PruneableInterface;
use _PhpScoper5ea00cc67502b\Symfony\Component\Cache\Traits\PhpFilesTrait;
use Exception;
use function filter_var;
use function ini_get;
use const FILTER_VALIDATE_BOOLEAN;

class PhpFilesAdapter extends AbstractAdapter implements PruneableInterface
{
    use PhpFilesTrait;
    /**
     * @param string      $namespace
     * @param int         $defaultLifetime
     * @param string|null $directory
     *
     * @throws CacheException if OPcache is not enabled
     */
    public function __construct($namespace = '', $defaultLifetime = 0, $directory = null)
    {
        if (!static::isSupported()) {
            throw new CacheException('OPcache is not enabled.');
        }
        parent::__construct('', $defaultLifetime);
        $this->init($namespace, $directory);
        $e = new Exception();
        $this->includeHandler = function () use($e) {
            throw $e;
        };
        $this->zendDetectUnicode = filter_var(ini_get('zend.detect_unicode'), FILTER_VALIDATE_BOOLEAN);
    }
}