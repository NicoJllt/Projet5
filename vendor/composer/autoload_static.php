<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit0d5bd35989572a0f742581f3d41eb142
{
    public static $prefixLengthsPsr4 = array (
        'A' => 
        array (
            'App\\src\\' => 8,
            'App\\config\\' => 11,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'App\\src\\' => 
        array (
            0 => __DIR__ . '/../..' . '/src',
        ),
        'App\\config\\' => 
        array (
            0 => __DIR__ . '/../..' . '/config',
        ),
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInit0d5bd35989572a0f742581f3d41eb142::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit0d5bd35989572a0f742581f3d41eb142::$prefixDirsPsr4;

        }, null, ClassLoader::class);
    }
}