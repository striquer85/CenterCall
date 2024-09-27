<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Campagne::index', ['as' => 'accueil']); 
// version 1 : redirection vers gestion_clients
//$routes->post('/', 'Home::connexions_update', ['as' => 'connexions']);


// classe controleur Campagne
$routes->get('gestion_campagnes', 'Campagne::dashboard_client', ['as' => 'gestion_campagnes']);
$routes->get('gestion_campagnes/(:num)', 'Campagne::dashboardclient/$1', ['as' => 'dashboard_client']);


$routes->get('creation_campagne', 'Campagne::ajout', ['as' => 'creation_campagne']);
$routes->post('creation_campagne', 'campagne::create', ['as' => 'creation_campagne_update']);


$routes->get('modif_campagne/(:num)', 'Campagne::modif/$1', ['as' => 'modif_campagne']);
$routes->post('update_campagne', 'Campagne::update', ['as' => 'modif_campagne_update']);

$routes->post('sup_campagne', 'Client::delete', ['as' => 'sup_campagne']);

$routes->get('creation_questionnaire', 'Campagne::creationQuestionnaire', ['as' => 'creation_questionnaire']);
$routes->post('update_questionaire', 'Campagne::creation_update', ['as' => 'questionnaire_update']);

$routes->get('modif_questionnaire/(:num)', 'Campagne::modif_questionnaire/$1', ['as' => 'modif_questionnaire']);
$routes->post('update_questionaire', 'Campagne::modif_questionnaire_update', ['as' => 'modif_questionnaire_update']);

$routes->post('sup_questionaire', 'Client::sup_questionaire_update', ['as' => 'sup_questionaire']);

$routes->get('synthese', 'Campagne::synthese', ['as' => 'synthese']);

// classe controleur Client
$routes->get('gestion-clients', 'Client::gestion-clients', ['as' => 'gestion-admin']);

$routes->get('create', 'Client::ajout', ['as' => 'createGet']);
$routes->post('create', 'Client::create', ['as' => 'createPost']);

$routes->get('update/(:num)', 'Client::modif/$1', ['as' => 'updateGet']);
$routes->post('update', 'Client::update', ['as' => 'updatePost']);

$routes->post('delete', 'Client::delete', ['as' => 'deletePost']);