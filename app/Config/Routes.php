<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Campagne::index', ['as' => 'accueil']); 

// route v1 

$routes->get('gestion-campagnes-(:num)', 'Campagne::dashboard/$1', ['as' => 'gestion_campagnes']);

// route test 
// $routes->get('gestion-campagnes', 'Campagne::dashboard', ['as' => 'gestion_campagnes']);

// CRUD Campagne
$routes->get('creation-campagne', 'Campagne::ajout', ['as' => 'creation_campagne_get']);
$routes->post('creation-campagne', 'Campagne::create', ['as' => 'creation_campagne_post']);

$routes->get('modif-campagne/(:num)', 'Campagne::modif/$1', ['as' => 'modif_campagne_get']);
$routes->post('modif-campagne', 'Campagne::update', ['as' => 'modif_campagne_post']);

$routes->post('suppr-campagne', 'Campagne::delete', ['as' => 'suppr_campagne']);
$routes->get('synthese', 'Campagne::synthese', ['as' => 'synthese']);

// CRUD Question (attention, penser au paramètre GET CampagneId)
$routes->get('gestion-question/(:num)', 'Question::gestionQuestion/$1', ['as' => 'gestion_question']);

$routes->get('creation-question/(:num)', 'Question::ajout/$1', ['as' => 'creation_question_get']);
$routes->post('creation-question', 'Question::create', ['as' => 'creation_question_post']);

$routes->get('modif-question/(:num)/(:num)', 'Question::modif/$1/$2', ['as' => 'modif_question_get']);
$routes->post('modif-question', 'Question::update', ['as' => 'modif_question_post']);

$routes->post('suppr-question', 'Question::delete', ['as' => 'suppr_question']);
 
// CRUD Client
$routes->get('gestion-clients', 'Client::gestionclient', ['as' => 'gestion_admin']);

$routes->get('creation-client', 'Client::ajout', ['as' => 'creation-client_get']);
$routes->post('creation-client', 'Client::create', ['as' => 'creation-client_post']);

$routes->get('modif-client/(:num)', 'Client::modif/$1', ['as' => 'modif_client_get']);
$routes->post('modif-client', 'Client::update', ['as' => 'modif_client_post']);

$routes->get('suppr-client-(:num)', 'Client::delete/$1', ['as' => 'suppr_client']);
$routes->post('delete-update', 'Client::delete_update/$1', ['as' => 'delete_update']);
