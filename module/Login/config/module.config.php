<?php
/**
 * @link      http://github.com/zendframework/ZendSkeletonApplication for the canonical source repository
 * @copyright Copyright (c) 2005-2016 Zend Technologies USA Inc. (http://www.zend.com)
 * @license   http://framework.zend.com/license/new-bsd New BSD License
 */

namespace Login;

use Zend\Router\Http\Literal;
use Zend\Router\Http\Segment;
use Zend\ServiceManager\Factory\InvokableFactory;

return [
    'router' => [
        'routes' => [
            'login' => [
                'type'    => Segment::class,
                'options' => [
                    'route'    => '/login/login',
                    'defaults' => [
                        'controller' => Controller\LoginController::class,
                        'action'     => 'login',
                    ],
                ],
            ],

            'login-succesfully' => [
                'type'    => Segment::class,
                'options' => [
                    'route'    => '/login/succesfully',
                    'defaults' => [
                        'controller' => Controller\LoginController::class,
                        'action'     => 'succesfully',
                    ],
                ],
            ],

            'login-failed' => [
                'type'    => Segment::class,
                'options' => [
                    'route'    => '/login/failed',
                    'defaults' => [
                        'controller' => Controller\LoginController::class,
                        'action'     => 'failed',
                    ],
                ],
            ],

            'check' => [
                'type'    => Segment::class,
                'options' => [
                    'route'    => '/login/check',
                    'defaults' => [
                        'controller' => Controller\LoginController::class,
                        'action'     => 'check',
                    ],
                ],
            ],
        ],
    ],
    'controllers' => [
        'factories' => [
            Controller\LoginController::class => InvokableFactory::class,
        ],
    ],
    'view_manager' => [
        'template_path_stack' => [
            __DIR__ . '/../view',
        ],
    ],
];
