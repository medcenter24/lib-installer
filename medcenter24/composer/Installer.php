<?php namespace mydoctors24\composer;
/**
 * Copyright (c) 2017.
 *
 * @author Oleksandr Zagovorychev <zagovorichev@gmail.com>
 */
use Composer\Package\PackageInterface;
use Composer\Installer\LibraryInstaller;
class Installer extends LibraryInstaller
{
  const EXT_NAME_KEY = 'medcenter24-extension-name';
  const EXT_TYPE = 'medcenter24-extension';
  
  /**
   * Install extensions before vendor dir
   */
    public function getInstallPath(PackageInterface $package)
    {
        $this->initializeVendorDir();
        $basePath = $this->vendorDir ? $this->vendorDir : '';
        
        $extras = $package->getExtra();
        if (!is_null($extras) && isset($extras[self::EXT_NAME_KEY]) && !empty($extras[self::EXT_NAME_KEY])) {
          // get extension
          return $basePath . DIRECTORY_SEPARATOR .  '..' . DIRECTORY_SEPARATOR . $extras[self::EXT_NAME_KEY];
        } else {
          
          // default path
          $targetDir = $package->getTargetDir();
          return (empty($basePath) ? '' : $basePapth . DIRECTORY_SEPARATOR) . $package->getPrettyName() . ($targetDir ? DIRECTORY_SEPARATOR . $targetDir : '');
        }
    }
    
    public function supports($packageType)
    {
        return self::EXT_TYPE === $packageType;
    }
}

