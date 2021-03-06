<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit9d49b663cead23d35c1187fa49009f18
{
    public static $prefixLengthsPsr4 = array (
        'A' => 
        array (
            'Argen\\Public\\' => 13,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'Argen\\Public\\' => 
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
            $loader->prefixLengthsPsr4 = ComposerStaticInit9d49b663cead23d35c1187fa49009f18::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit9d49b663cead23d35c1187fa49009f18::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInit9d49b663cead23d35c1187fa49009f18::$classMap;

        }, null, ClassLoader::class);
    }
}
