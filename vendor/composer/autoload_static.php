<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInitd17021ba53338878cc581a6a949320bb
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

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInitd17021ba53338878cc581a6a949320bb::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInitd17021ba53338878cc581a6a949320bb::$prefixDirsPsr4;

        }, null, ClassLoader::class);
    }
}