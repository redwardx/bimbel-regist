<?php
defined('BASEPATH') or exit('No direct script access allowed');

/*
| -------------------------------------------------------------------------
| URI ROUTING
| -------------------------------------------------------------------------
| This file lets you re-map URI requests to specific controller functions.
|
| Typically there is a one-to-one relationship between a URL string
| and its corresponding controller class/method. The segments in a
| URL normally follow this pattern:
|
|	example.com/class/method/id/
|
| In some instances, however, you may want to remap this relationship
| so that a different class/function is called than the one
| corresponding to the URL.
|
| Please see the user guide for complete details:
|
|	https://codeigniter.com/userguide3/general/routing.html
|
| -------------------------------------------------------------------------
| RESERVED ROUTES
| -------------------------------------------------------------------------
|
| There are three reserved routes:
|
|	$route['default_controller'] = 'welcome';
|
| This route indicates which controller class should be loaded if the
| URI contains no data. In the above example, the "welcome" class
| would be loaded.
|
|	$route['404_override'] = 'errors/page_missing';
|
| This route will tell the Router which controller/method to use if those
| provided in the URL cannot be matched to a valid route.
|
|	$route['translate_uri_dashes'] = FALSE;
|
| This is not exactly a route, but allows you to automatically route
| controller and method names that contain dashes. '-' isn't a valid
| class or method name character, so it requires translation.
| When you set this option to TRUE, it will replace ALL dashes in the
| controller and method URI segments.
|
| Examples:	my-controller/index	-> my_controller/index
|		my-controller/my-method	-> my_controller/my_method
*/
$route['default_controller'] = 'auth';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;


$route['user']['get'] = 'user/index';
$route['user']['post'] = 'user/create';
$route['user/new']['get'] = 'user/new';
$route['user/(:any)/edit']['get'] = 'user/edit/$1';
$route['user/(:any)']['get'] = 'user/edit/$1';
$route['user/(:any)']['post'] = 'user/update/$1';
$route['user/(:any)/delete'] = 'user/delete/$1';

$route['gantipass']['get'] = 'user/gantipass';
$route['gantipass']['post'] = 'user/prosesGantipass';

$route['profile']['get'] = 'user/profile';
$route['profile/edit']['get'] = 'user/editProfile';
$route['profile']['post'] = 'user/prosesProfile';

$route['bimbel']['get'] = 'bimbel/index';
$route['bimbel']['post'] = 'bimbel/create';
$route['bimbel/new']['get'] = 'bimbel/new';
$route['bimbel/(:any)/detail']['get'] = 'bimbel/detail/$1';
$route['bimbel/(:any)']['get'] = 'bimbel/detail/$1';
$route['bimbel/(:any)/edit']['get'] = 'bimbel/edit/$1';
$route['bimbel/(:any)']['get'] = 'bimbel/edit/$1';
$route['bimbel/(:any)']['post'] = 'bimbel/update/$1';
$route['bimbel/(:any)/delete'] = 'bimbel/delete/$1';

$route['siswa']['get'] = 'siswa/index';
$route['siswa']['post'] = 'siswa/create';
$route['siswa/new']['get'] = 'siswa/new';
$route['siswa/(:any)/edit']['get'] = 'siswa/edit/$1';
$route['siswa/(:any)']['get'] = 'siswa/edit/$1';
$route['siswa/(:any)']['post'] = 'siswa/update/$1';
$route['siswa/(:any)/delete'] = 'siswa/delete/$1';

$route['spp']['get'] = 'spp/index';
$route['spp']['post'] = 'spp/create';
$route['spp/new']['get'] = 'spp/new';
$route['spp/(:any)/print']['get'] = 'spp/print/$1';
$route['spp/siswa']['get'] = 'spp/siswa';
$route['spp/(:any)/new']['get'] = 'spp/new/$1';
$route['spp/(:any)/delete'] = 'spp/delete/$1';