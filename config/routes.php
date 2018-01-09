<?php
/**
 * Setup routes with a single request method:
 *
 * $app->get('/', App\Action\HomePageAction::class, 'home');
 * $app->post('/album', App\Action\AlbumCreateAction::class, 'album.create');
 * $app->put('/album/:id', App\Action\AlbumUpdateAction::class, 'album.put');
 * $app->patch('/album/:id', App\Action\AlbumUpdateAction::class, 'album.patch');
 * $app->delete('/album/:id', App\Action\AlbumDeleteAction::class, 'album.delete');
 *
 * Or with multiple request methods:
 *
 * $app->route('/contact', App\Action\ContactAction::class, ['GET', 'POST', ...], 'contact');
 *
 * Or handling all request methods:
 *
 * $app->route('/contact', App\Action\ContactAction::class)->setName('contact');
 *
 * or:
 *
 * $app->route(
 *     '/contact',
 *     App\Action\ContactAction::class,
 *     Zend\Expressive\Router\Route::HTTP_METHOD_ANY,
 *     'contact'
 * );
 */

/** @var \Zend\Expressive\Application $app */

$app->get('/', App\Action\HomePageAction::class, 'home');
$app->get('/api/ping', App\Action\PingAction::class, 'api.ping');
$app->get('/teste', App\Application\Action\TesteAction::class, 'teste');

$app->get('/cliente', App\Application\Action\ClienteListAction::class, 'cliente.list');
$app->route('/cliente/create', App\Application\Action\ClienteCreateAction::class, ['GET', 'POST'], 'cliente.create');
$app->route('/cliente/update/{id}', App\Application\Action\ClienteUpdateAction::class, ['GET', 'POST'], 'cliente.update');
$app->route('/cliente/delete/{id}', App\Application\Action\ClienteDeleteAction::class, ['GET', 'POST'], 'cliente.delete');
