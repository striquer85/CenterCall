$routes->get('/', 'Home::index', ['as' => 'accueil']); // version 1 : redirection vers gestion-clients
//$routes->post('/', 'Home::connexions-update', ['as' => 'connexions']);


// classe controleur Campagne
$routes->get('gestion-campagnes', 'campagne::dashboardclient', ['as' => 'gestion-campagnes']);
$routes->get('gestion-campagnes-(:num)', 'Campagne::dashboardclient/$1', ['as' => 'dashboard-client']);


$routes->get('creation-campagne', 'campagne::CréationC', ['as' => 'creation-campagne']);
$routes->post('update',', 'campagne::'CréationC-update, ['as' => 'creation-campagnes']);


$routes->get('modif-campagne-(:num)', 'campagne::modifC/$1', ['as' => 'modif-campagne']);
$routes->post('update-campagne', 'campagne::'modifCampagne-update, ['as' => 'modif-campagne']);

$routes->post('sup-campagne', 'client::'sup-campagne-update, ['as' => 'sup-campagne']);

// 2 routes pour delete campagnes

// classe controleur Questionnaire ?? pas sur... ptet plutôt Campagne
$routes->get('creation-questionnaire', 'campagne::CréationQuestionnaire', ['as' => 'creation-questionnaire']);
$routes->post('update-questionaire', 'campagne::'CréationQ-update, ['as' => 'creation-questionnaire']);

$routes->get('modif-questionnaire-(:num)', 'campagne::modif-questionnaire/$1', ['as' => 'modif-questionnaire']);
$routes->post('update-questionaire', 'campagne::'modif-questionnaire-update, ['as' => 'modif-questionnaire']);

$routes->post('sup-questionaire', 'client::'sup-questionaire-update, ['as' => 'sup-questionaire']);

// 2 routes pour delete questions ? questionnaire ?

$routes->get('synthese', 'campagne::synthese', ['as' => 'synthese']);

// classe controleur Client
$routes->get('gestion-clients', 'client::gestion-clients', ['as' => 'gestion-admin']);


$routes->get('creation-client ', 'client::creation-client', ['as' => 'Création_Client']);
$routes->post('update', 'client::'creation-client-update, ['as' => 'Création_Client']);

$routes->get('modif-client-(:num)', 'client::modif-client/$1', ['as' => 'modif_Client']);
$routes->post('update', 'client::'modif-client-update', ['as' => 'modif_Client']);

// soit :
$routes->get('sup-client-(:num)', 'client::'supCL-update/$1, ['as' => 'sup-client']);
// soit :
$routes->post('sup-client', 'client::'supclient-update, ['as' => 'sup-client']);