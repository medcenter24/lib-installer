<?php
/**
 * Copyright (c) 2017.
 *
 * @author Oleksandr <zagovorychev@gmail.com>
 */

namespace medcenter24\composer;


use Composer\Composer;
use Composer\IO\IOInterface;
use Composer\Plugin\PluginInterface;

class InstallPlugin implements PluginInterface
{
    public function activate(Composer $composer, IOInterface $io){
        $installer = new Installer($io, $composer);
        $composer->getInstallationManager()->addInstaller($installer);
    }
}

