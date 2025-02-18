<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit04ca43026f72bca3dde4e5b897d37b8e
{
    public static $prefixLengthsPsr4 = array (
        'P' => 
        array (
            'PHPMailer\\PHPMailer\\' => 20,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'PHPMailer\\PHPMailer\\' => 
        array (
            0 => __DIR__ . '/..' . '/phpmailer/phpmailer/src',
        ),
    );

    public static $classMap = array (
        'Composer\\InstalledVersions' => __DIR__ . '/..' . '/composer/InstalledVersions.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInit04ca43026f72bca3dde4e5b897d37b8e::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit04ca43026f72bca3dde4e5b897d37b8e::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInit04ca43026f72bca3dde4e5b897d37b8e::$classMap;

        }, null, ClassLoader::class);
    }
}
