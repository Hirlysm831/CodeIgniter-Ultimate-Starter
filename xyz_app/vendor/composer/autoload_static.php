<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInitd0b63a663708711714d11e157a90bd5d
{
    public static $prefixesPsr0 = array (
        'C' => 
        array (
            'Composer\\Installer' => 
            array (
                0 => __DIR__ . '/..' . '/compwright/codeigniter-installers/src',
            ),
        ),
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixesPsr0 = ComposerStaticInitd0b63a663708711714d11e157a90bd5d::$prefixesPsr0;

        }, null, ClassLoader::class);
    }
}
