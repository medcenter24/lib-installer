<?php namespace mydoctors24\composer;
/**
 * Copyright (c) 2017.
 *
 * @author Oleksandr <zagovorychev@gmail.com>
 */
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
