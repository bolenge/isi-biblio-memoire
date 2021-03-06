<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit408f35912c8abacaa0fb1b316ba44e6b
{
    public static $files = array (
        'da0eb8ff4f3c4b818d3e710e0d157ae6' => __DIR__ . '/..' . '/ekolobuilder/ekolo/src/Functions/Helpers.php',
        '0212250db3b9d6fe331c700f380e64ce' => __DIR__ . '/../..' . '/core/Functions.php',
    );

    public static $prefixLengthsPsr4 = array (
        'M' => 
        array (
            'Models\\' => 7,
        ),
        'E' => 
        array (
            'Ekolo\\Routing\\' => 14,
            'Ekolo\\Http\\' => 11,
            'Ekolo\\EkoMagic\\' => 15,
            'Ekolo\\Builder\\' => 14,
        ),
        'C' => 
        array (
            'Core\\' => 5,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'Models\\' => 
        array (
            0 => __DIR__ . '/../..' . '/models',
        ),
        'Ekolo\\Routing\\' => 
        array (
            0 => __DIR__ . '/..' . '/ekolobuilder/eko-routing/src',
        ),
        'Ekolo\\Http\\' => 
        array (
            0 => __DIR__ . '/..' . '/ekolobuilder/eko-http/src',
        ),
        'Ekolo\\EkoMagic\\' => 
        array (
            0 => __DIR__ . '/..' . '/ekolobuilder/eko-magic/src',
        ),
        'Ekolo\\Builder\\' => 
        array (
            0 => __DIR__ . '/..' . '/ekolobuilder/ekolo/src',
        ),
        'Core\\' => 
        array (
            0 => __DIR__ . '/../..' . '/core',
        ),
    );

    public static $classMap = array (
        'Composer\\InstalledVersions' => __DIR__ . '/..' . '/composer/InstalledVersions.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInit408f35912c8abacaa0fb1b316ba44e6b::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit408f35912c8abacaa0fb1b316ba44e6b::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInit408f35912c8abacaa0fb1b316ba44e6b::$classMap;

        }, null, ClassLoader::class);
    }
}
