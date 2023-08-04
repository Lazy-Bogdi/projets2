<?php

namespace App\Twig;

use Symfony\Component\Routing\RouterInterface;
use Twig\Extension\AbstractExtension;
use Twig\TwigFunction;

class AppExtension extends AbstractExtension
{
    private $router;

    public function __construct(RouterInterface $router)
    {
        $this->router = $router;
    }

    public function getFunctions(): array
    {
        return [
            new TwigFunction('get_admin_routes', [$this, 'getAdminRoutes']),
        ];
    }

    public function getAdminRoutes()
    {
        $allRoutes = $this->router->getRouteCollection()->all();

        $adminRoutes = [];
        foreach ($allRoutes as $routeName => $route) {
            if (strpos($routeName, 'app_admin') !== false && substr($routeName, -6) === '_index') {
                $adminRoutes[$routeName] = $route->getPath();
            }
        }

        return $adminRoutes;
    }

}