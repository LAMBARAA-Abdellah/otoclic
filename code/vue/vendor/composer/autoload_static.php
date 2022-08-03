<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit08f6e933ca8da29431902df1efc03ed5
{
    public static $prefixLengthsPsr4 = array (
        'T' => 
        array (
            'Twilio\\' => 7,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'Twilio\\' => 
        array (
            0 => __DIR__ . '/..' . '/twilio/sdk/src/Twilio',
        ),
    );

    public static $classMap = array (
        'Composer\\InstalledVersions' => __DIR__ . '/..' . '/composer/InstalledVersions.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInit08f6e933ca8da29431902df1efc03ed5::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit08f6e933ca8da29431902df1efc03ed5::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInit08f6e933ca8da29431902df1efc03ed5::$classMap;

        }, null, ClassLoader::class);
    }
}