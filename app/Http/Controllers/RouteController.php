<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Route;

class RouteController extends Controller
{
    public function index()
    {
        $routes = collect(Route::getRoutes())->map(function ($route) {
            return [
                'uri' => $route->uri(),
                'name' => $route->getName(),
                'methods' => implode(', ', $route->methods()),
                'action' => $route->getActionName(),
            ];
        });

        return response()->json(['data' => $routes]);
    }
}
