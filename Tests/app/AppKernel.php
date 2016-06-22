<?php

/*
 * This file is part of Sulu.
 *
 * (c) MASSIVE ART WebServices GmbH
 *
 * This source file is subject to the MIT license that is bundled
 * with this source code in the file LICENSE.
 */

use Sulu\Bundle\CommunityBundle\SuluCommunityBundle;
use Sulu\Bundle\TestBundle\Kernel\SuluTestKernel;
use Symfony\Bundle\SwiftmailerBundle\SwiftmailerBundle;
use Symfony\Component\Config\Loader\LoaderInterface;

class AppKernel extends SuluTestKernel
{
    /**
     * {@inheritdoc}
     */
    public function registerBundles()
    {
        return array_merge(
            [
                new SuluCommunityBundle(),
                new SwiftmailerBundle(),
            ],
            parent::registerBundles()
        );
    }

    /**
     * {@inheritdoc}
     */
    public function registerContainerConfiguration(LoaderInterface $loader)
    {
        parent::registerContainerConfiguration($loader);

        $context = $this->getContext();
        $loader->load(__DIR__ . '/config/config_' . $context . '.yml');
    }
}