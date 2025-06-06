<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInite2b0923eb3dd0e2a71be69fc363103cf
{
    public static $files = array (
        'd9325de9ce9e7b7786706500a2fbbf14' => __DIR__ . '/..' . '/mvc/alframwork/helpers/alframwork_helper.php',
    );

    public static $prefixLengthsPsr4 = array (
        'I' => 
        array (
            'Ilinuminates\\' => 13,
        ),
        'C' => 
        array (
            'Contracts\\' => 10,
        ),
        'A' => 
        array (
            'App\\' => 4,
            'Alframwork\\' => 11,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'Ilinuminates\\' => 
        array (
            0 => __DIR__ . '/..' . '/mvc/alframwork/ilinuminates',
        ),
        'Contracts\\' => 
        array (
            0 => __DIR__ . '/..' . '/mvc/alframwork/Contracts',
        ),
        'App\\' => 
        array (
            0 => __DIR__ . '/../..' . '/app',
        ),
        'Alframwork\\' => 
        array (
            0 => __DIR__ . '/..' . '/mvc/alframwork/framwork',
        ),
    );

    public static $classMap = array (
        'Composer\\InstalledVersions' => __DIR__ . '/..' . '/composer/InstalledVersions.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInite2b0923eb3dd0e2a71be69fc363103cf::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInite2b0923eb3dd0e2a71be69fc363103cf::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInite2b0923eb3dd0e2a71be69fc363103cf::$classMap;

        }, null, ClassLoader::class);
    }
}
