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
$routes->get('gestion_campagnes_(:num)', 'Campagne::dashboardclient/$1', ['as' => 'dashboard_client']);


$routes->get('creation_campagne', 'Campagne::CréationC', ['as' => 'creation_campagne']);
$routes->post('update', 'campagne::CréationC_update', ['as' => 'creation_campagne_update']);


$routes->get('modif_campagne_(:num)', 'Campagne::modi_campagne/$1', ['as' => 'modif_campagne']);
$routes->post('update_campagne', 'Campagne::modifCampagne_update', ['as' => 'modif_campagne_update']);

$routes->post('sup_campagne', 'Client::sup_campagne_update', ['as' => 'sup_campagne']);

// 2 routes pour delete campagnes

// classe controleur Questionnaire ?? pas sur... ptet plutôt Campagne
$routes->get('creation_questionnaire', 'Campagne::CréationQuestionnaire', ['as' => 'creation_questionnaire']);
$routes->post('update_questionaire', 'Campagne::CréationQ_update', ['as' => 'questionnaire_update']);

$routes->get('modif_questionnaire_(:num)', 'Campagne::modif_questionnaire/$1', ['as' => 'modif_questionnaire']);
$routes->post('update_questionaire', 'Campagne::modif_questionnaire_update', ['as' => 'modif_questionnaire_update']);

$routes->post('sup_questionaire', 'Client::sup_questionaire_update', ['as' => 'sup_questionaire']);



$routes->get('synthese', 'Campagne::synthese', ['as' => 'synthese']);

// classe controleur Client
$routes->get('gestion_clients', 'Client::gestion_clients', ['as' => 'gestion_admin']);


$routes->get('creation_client ', 'Client::creation_client', ['as' => 'Création_client']);
$routes->post('update', 'Client::creation_client_update', ['as' => 'Création_client']);

$routes->get('modif_client_(:num)', 'Client::modif_client/$1', ['as' => 'modif_client']);
$routes->post('update', 'Client::modif_client_update', ['as' => 'modif_client']);

// soit :
$routes->get('sup_client_(:num)', 'Client::supCL_update/$1', ['as' => 'sup_client']);
// soit :
$routes->post('sup_client', 'Client::supclient_update', ['as' => 'sup_client']);
