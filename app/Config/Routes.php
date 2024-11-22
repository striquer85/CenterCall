<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
service('auth')->routes($routes);
$routes->get('/', 'Home::index', ['as' => 'index']);

// CRUD Campagne
$routes->get('gestion-campagnes/(:num)', 'Campagne::dashboard/$1', ['as' => 'gestion_campagnes']);

$routes->get('creation-campagne/(:num)', 'Campagne::ajout/$1', ['as' => 'creation_campagne_get']);
$routes->post('creation-campagne', 'Campagne::create', ['as' => 'creation_campagne_post']);

$routes->get('modif-campagne/(:num)', 'Campagne::modif/$1', ['as' => 'modif_campagne_get']);
$routes->post('modif-campagne', 'Campagne::update', ['as' => 'modif_campagne_post']);

$routes->post('suppr-campagne', 'Campagne::delete', ['as' => 'suppr_campagne']);

$routes->get('synthese', 'Campagne::synthese', ['as' => 'synthese']);

// CRUD Question
$routes->get('gestion-question/(:num)', 'Question::gestionQuestion/$1', ['as' => 'gestion_question']);

$routes->get('creation-question/(:num)', 'Question::ajout/$1', ['as' => 'creation_question_get']);
$routes->post('creation-question', 'Question::create', ['as' => 'creation_question_post']);

$routes->get('modif-question/(:num)', 'Question::modif/$1', ['as' => 'modif_question_get']);
$routes->post('modif-question', 'Question::update', ['as' => 'modif_question_post']);

$routes->post('suppr-question', 'Question::delete', ['as' => 'suppr_question']);

// CRUD Client
$routes->get('gestion-clients', 'Client::gestionclient', ['as' => 'gestion_admin']);

$routes->get('creation-client', 'Client::ajout', ['as' => 'creation-client_get']);
$routes->post('creation-client', 'Client::create', ['as' => 'creation-client_post']);

$routes->get('modif-client/(:num)', 'Client::modif/$1', ['as' => 'modif_client_get']);
$routes->post('modif-client', 'Client::update', ['as' => 'modif_client_post']);

$routes->post('suppr-client/(:num)', 'Client::delete/$1', ['as' => 'suppr_client']);
