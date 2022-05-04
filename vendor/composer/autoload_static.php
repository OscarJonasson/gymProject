<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit0bf95c795868eadee4119ed3272d395c
{
    public static $prefixLengthsPsr4 = array (
        'S' => 
        array (
            'Symfony\\Requirements\\' => 21,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'Symfony\\Requirements\\' => 
        array (
            0 => __DIR__ . '/..' . '/symfony/requirements-checker/src',
        ),
    );

    public static $classMap = array (
        'Composer\\InstalledVersions' => __DIR__ . '/..' . '/composer/InstalledVersions.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInit0bf95c795868eadee4119ed3272d395c::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit0bf95c795868eadee4119ed3272d395c::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInit0bf95c795868eadee4119ed3272d395c::$classMap;

        }, null, ClassLoader::class);
    }
}