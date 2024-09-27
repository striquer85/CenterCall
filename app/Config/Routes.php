<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Campagne::index', ['as' => 'accueil']); 

$routes->get('gestion-campagnes', 'Campagne::dashboard', ['as' => 'gestion_campagnes']);
$routes->get('gestion-campagnes/(:num)', 'Campagne::dashboardclient/$1', ['as' => 'dashboard_client']);

// CRUD Campagne
$routes->get('creation-campagne', 'Campagne::ajout', ['as' => 'creation_campagne_get']);
$routes->post('creation-campagne', 'campagne::create', ['as' => 'creation_campagne_post']);

$routes->get('modif-campagne/(:num)', 'Campagne::modif/$1', ['as' => 'modif_campagne_get']);
$routes->post('modif-campagne', 'Campagne::update', ['as' => 'modif_campagne_post']);

$routes->post('suppr-campagne', 'Campagne::delete', ['as' => 'suppr_campagne']);

// CRUD Question (attention, penser au paramètre GET CampagneId)
$routes->get('creation-question/(:num)', 'Campagne::ajout/$1', ['as' => 'creation_question_get']);
$routes->post('creation-question', 'Campagne::create', ['as' => 'creation_question_post']);

$routes->get('modif-question/(:num)/(:num)', 'Campagne::modif/$1/$2', ['as' => 'modif_question_get']);
$routes->post('modif-question', 'Campagne::update', ['as' => 'modif_question_post']);

$routes->post('suppr-question', 'Campagne::delete', ['as' => 'suppr_question']);
 

$routes->get('synthese', 'Campagne::synthese', ['as' => 'synthese']);

// CRUD Client
$routes->get('gestion-clients', 'Client::gestionclient', ['as' => 'gestion-admin']);

$routes->get('creation-client', 'Client::ajout', ['as' => 'creation-client_get']);
$routes->post('creation-client', 'Client::create', ['as' => 'creation-client_post']);

$routes->get('modif-client/(:num)', 'Client::modif/$1', ['as' => 'modif_client_get']);
$routes->post('modif-client', 'Client::update', ['as' => 'modif_client_post']);

$routes->post('suppr-client', 'Client::delete', ['as' => 'suppr_client']);