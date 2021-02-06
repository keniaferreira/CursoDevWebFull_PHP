<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit40bd665e2b67f2095ceed586fd3fc862
{
    public static $prefixLengthsPsr4 = array (
        'S' => 
        array (
            'Src\\' => 4,
        ),
        'A' => 
        array (
            'App\\' => 4,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'Src\\' => 
        array (
            0 => __DIR__ . '/../..' . '/src',
        ),
        'App\\' => 
        array (
            0 => __DIR__ . '/../..' . '/app',
        ),
    );

    public static $classMap = array (
        'Composer\\InstalledVersions' => __DIR__ . '/..' . '/composer/InstalledVersions.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInit40bd665e2b67f2095ceed586fd3fc862::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit40bd665e2b67f2095ceed586fd3fc862::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInit40bd665e2b67f2095ceed586fd3fc862::$classMap;

        }, null, ClassLoader::class);
    }
}