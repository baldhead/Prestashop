<?php

/*
 * This file is part of the Symfony package.
 *
 * (c) Fabien Potencier <fabien@symfony.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
namespace _PhpScoper5ea00cc67502b\Symfony\Component\DependencyInjection\Loader\Configurator\Traits;

use _PhpScoper5ea00cc67502b\Symfony\Component\DependencyInjection\ChildDefinition;
use _PhpScoper5ea00cc67502b\Symfony\Component\DependencyInjection\Exception\InvalidArgumentException;
use function sprintf;

trait AutoconfigureTrait
{
    /**
     * Sets whether or not instanceof conditionals should be prepended with a global set.
     *
     * @param bool $autoconfigured
     *
     * @return $this
     *
     * @throws InvalidArgumentException when a parent is already set
     */
    public final function autoconfigure($autoconfigured = true)
    {
        if ($autoconfigured && $this->definition instanceof ChildDefinition) {
            throw new InvalidArgumentException(sprintf('The service "%s" cannot have a "parent" and also have "autoconfigure". Try disabling autoconfiguration for the service.', $this->id));
        }
        $this->definition->setAutoconfigured($autoconfigured);
        return $this;
    }
}