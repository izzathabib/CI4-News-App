<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index'); // Default routing

use App\Controllers\News;
use App\Controllers\Pages;

$routes->get('news', [News::class, 'index']);
$routes->get('news/demo', [News::class, 'demo']);// Route use to demonstrate template
$routes->get('news/new', [News::class, 'new']); 
$routes->post('news', [News::class, 'create']);
$routes->get('news/(:segment)', [News::class, 'show']);// Declare function show as a segment

$routes->get('pages', [Pages::class, 'index']);
$routes->get('(:segment)', [Pages::class, 'view']);
