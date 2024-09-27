<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index', ['as' => 'accueil']); // version 1 : redirection vers gestion_clients
//$routes->post('/', 'Home::connexions_update', ['as' => 'connexions']);


// classe controleur Campagne
$routes->get('gestion_campagnes', 'campagne::dashboardclient', ['as' => 'gestion_campagnes']);
$routes->get('gestion_campagnes_(:num)', 'Campagne::dashboardclient/$1', ['as' => 'dashboard_client']);


$routes->get('creation_campagne', 'campagne::CréationC', ['as' => 'creation_campagne']);
$routes->post('update', 'campagne::CréationC_update', ['as' => 'creation_campagnes']);


$routes->get('modif_campagne_(:num)', 'campagne::modi_campagne/$1', ['as' => 'modif_campagne']);
$routes->post('update_campagne', 'campagne::modifCampagne_update', ['as' => 'modif_campagne']);

$routes->post('sup_campagne', 'client::sup_campagne_update', ['as' => 'sup_campagne']);

// 2 routes pour delete campagnes

// classe controleur Questionnaire ?? pas sur... ptet plutôt Campagne
$routes->get('creation_questionnaire', 'campagne::CréationQuestionnaire', ['as' => 'creation_questionnaire']);
$routes->post('update_questionaire', 'campagne::CréationQ_update', ['as' => 'creation_questionnaire']);

$routes->get('modif_questionnaire_(:num)', 'campagne::modif_questionnaire/$1', ['as' => 'modif_questionnaire']);
$routes->post('update_questionaire', 'campagne::modif_questionnaire_update', ['as' => 'modif_questionnaire']);

$routes->post('sup_questionaire', 'client::sup_questionaire_update', ['as' => 'sup_questionaire']);



$routes->get('synthese', 'campagne::synthese', ['as' => 'synthese']);

// classe controleur Client
$routes->get('gestion_clients', 'client::gestion_clients', ['as' => 'gestion_admin']);


$routes->get('creation_client ', 'client::creation_client', ['as' => 'Création_Client']);
$routes->post('update', 'client::creation_client_update', ['as' => 'Création_Client']);

$routes->get('modif_client_(:num)', 'client::modif_client/$1', ['as' => 'modif_Client']);
$routes->post('update', 'client::modif_client_update', ['as' => 'modif_Client']);

// soit :
$routes->get('sup_client_(:num)', 'client::supCL_update/$1', ['as' => 'sup_client']);
// soit :
$routes->post('sup_client', 'client::supclient_update', ['as' => 'sup_client']);
