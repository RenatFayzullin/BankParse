<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInite87cb6106df07b8ed0e252c32588d23e
{
    public static $classMap = array (
        'Composer\\InstalledVersions' => __DIR__ . '/..' . '/composer/InstalledVersions.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->classMap = ComposerStaticInite87cb6106df07b8ed0e252c32588d23e::$classMap;

        }, null, ClassLoader::class);
    }
}
