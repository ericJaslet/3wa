<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInitc1f189d87dce4b3215a5dcb1b3abd1df
{
    public static $prefixLengthsPsr4 = array (
        'A' => 
        array (
            'App\\' => 4,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'App\\' => 
        array (
            0 => __DIR__ . '/../..' . '/src',
        ),
    );

    public static $classMap = array (
        'Composer\\InstalledVersions' => __DIR__ . '/..' . '/composer/InstalledVersions.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInitc1f189d87dce4b3215a5dcb1b3abd1df::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInitc1f189d87dce4b3215a5dcb1b3abd1df::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInitc1f189d87dce4b3215a5dcb1b3abd1df::$classMap;

        }, null, ClassLoader::class);
    }
}
