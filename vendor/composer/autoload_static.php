<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit9e07fd61162a960d4e97bb7ac2ae076c
{
    public static $prefixLengthsPsr4 = array (
        'M' => 
        array (
            'Model\\' => 6,
        ),
        'D' => 
        array (
            'Db\\' => 3,
        ),
        'C' => 
        array (
            'Controller\\' => 11,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'Model\\' => 
        array (
            0 => __DIR__ . '/../..' . '/model',
        ),
        'Db\\' => 
        array (
            0 => __DIR__ . '/../..' . '/Db',
        ),
        'Controller\\' => 
        array (
            0 => __DIR__ . '/../..' . '/controller',
        ),
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInit9e07fd61162a960d4e97bb7ac2ae076c::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit9e07fd61162a960d4e97bb7ac2ae076c::$prefixDirsPsr4;

        }, null, ClassLoader::class);
    }
}