<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit1589dd0a239698cf7c44e2f60518eb2a
{
    public static $classMap = array (
        'AdminView' => __DIR__ . '/../..' . '/Views/AdminView.php',
        'Comments' => __DIR__ . '/../..' . '/Controllers/Comments.php',
        'CommentsCtrl' => __DIR__ . '/../..' . '/Models/CommentsCtrl.php',
        'CommentsView' => __DIR__ . '/../..' . '/Models/CommentsView.php',
        'Database' => __DIR__ . '/../..' . '/core/Database.php',
        'PostCtrlData' => __DIR__ . '/../..' . '/Models/PostCtrlData.php',
        'PostViewData' => __DIR__ . '/../..' . '/Models/PostViewData.php',
        'Posts' => __DIR__ . '/../..' . '/Controllers/Posts.php',
        'PublicView' => __DIR__ . '/../..' . '/Views/PublicView.php',
        'Request' => __DIR__ . '/../..' . '/core/Request.php',
        'Router' => __DIR__ . '/../..' . '/core/Router.php',
        'Settings' => __DIR__ . '/../..' . '/config/Settings.php',
        'Template' => __DIR__ . '/../..' . '/core/Template.php',
        'UserView' => __DIR__ . '/../..' . '/Views/UserView.php',
        'Users' => __DIR__ . '/../..' . '/Controllers/Users.php',
        'UsersData' => __DIR__ . '/../..' . '/Models/UsersData.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->classMap = ComposerStaticInit1589dd0a239698cf7c44e2f60518eb2a::$classMap;

        }, null, ClassLoader::class);
    }
}