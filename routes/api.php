<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::group(['middleware' => 'cors'], function(){

		Route::post('/oauth/token', ['as' => 'oauth.token',	'uses' => '\Laravel\Passport\Http\Controllers\AccessTokenController@issueToken'])->middleware('checkLogin', 'throttle');		
		Route::group(['prefix' => 'client', 'as' => 'client.'], function(){
			Route::group(['prefix' => 'companies', 'as' => 'companies.'], function(){
				Route::get('/search/{data}', 			['as' => 'search', 	'uses' => 'Api\CompaniesController@search']);
				Route::get('/{id}', 					['as' => 'show', 	'uses' => 'Api\CompaniesController@show']);
				Route::get('', 							['as' => 'index', 	'uses' => 'Api\CompaniesController@index']);
			});

			Route::group(['prefix' => 'branches', 'as' => 'branches.'], function(){
				Route::get('/favorites/{userId}',		['as' => 'favorites', 	'uses' => 'Api\BranchesController@queryFavoritesByUser']);
				Route::get('/search/{data}', 			['as' => 'search', 		'uses' => 'Api\BranchesController@search']);
				Route::get('/{id}', 					['as' => 'show', 		'uses' => 'Api\BranchesController@show']);
				Route::get('', 							['as' => 'index', 		'uses' => 'Api\BranchesController@index']);
			});

			Route::group(['prefix' => 'jobs', 'as' => 'jobs.'], function(){
				Route::get('/by-branch/{branchId}',		['as' => 'by-branch',	'uses' => 'Api\BranchesJobsController@queryJobsByBranch']);
				Route::get('/search/{data}', 			['as' => 'search', 		'uses' => 'Api\JobsController@search']);
				Route::get('/{id}', 					['as' => 'show', 		'uses' => 'Api\JobsController@show']);
				Route::get('', 							['as' => 'index', 		'uses' => 'Api\JobsController@index']);
			});

			Route::group(['prefix' => 'employees', 'as' => 'employees.'], function(){
				Route::get('/by-branch-job/{branchJobId}',		['as' => 'by-branch-job',		'uses' => 'Api\BranchJobEmployeesController@queryEmployeesByBranchJob']);
				Route::get('/branch/{branchId}/job/{jobId}',	['as' => 'by-branch-and-job',	'uses' => 'Api\EmployeesController@queryEmployeesByBranchAndJob']);
				Route::get('/search/{data}', 					['as' => 'search', 				'uses' => 'Api\EmployeesController@search']);
				Route::get('/{id}', 							['as' => 'show', 				'uses' => 'Api\EmployeesController@show']);
				Route::get('', 									['as' => 'index', 				'uses' => 'Api\EmployeesController@index']);
			});



			Route::resource('orders', 'Api\ClientCheckoutController', ['except' => ['create', 'edit', 'destroy']]);
			
			Route::group(['prefix' => 'products', 'as' => 'products.'], function(){
				Route::get('/search/{data}', 			['as' => 'search', 	'uses' => 'Api\ClientProductController@search']);
				Route::get('/{id}', 					['as' => 'show', 	'uses' => 'Api\ClientProductController@show']);
				Route::get('', 							['as' => 'index', 	'uses' => 'Api\ClientProductController@index']);
			});
			
		});

		Route::group(['prefix' => 'deliveryman', 'middleware' => 'oauth.checkrole:deliveryman', 'as' => 'deliverymen.'], function(){
			Route::resource('orders', 'Api\DeliverymanCheckoutController', ['except' => ['create', 'edit', 'destroy', 'store']]);
			Route::patch('orders/{id}/update-status',	['as' => 'orders.update-status',	'uses' => 'Api\DeliverymanCheckoutController@updateStatus']);
			Route::post('orders/{id}/geo', 				['as' => 'orders.geo', 				'uses' => 'Api\DeliverymanCheckoutController@geo']);
		});

		Route::group(['prefix' => 'users', 'as' => 'users.'], function(){
			Route::get('find-local-by-token/{social}/{token}',  ['as' => 'find-local-by-token',    'uses' => 'Api\UsersController@findLocalByToken']);
			Route::get('find-social-by-token/{social}/{token}', ['as' => 'find-social-by-token',   'uses' => 'Api\UsersController@findSocialByToken']);
			Route::get('authenticated', 				['as' => 'authenticated', 	'uses' => 'Api\UsersController@authenticated']);
			Route::patch('device-token', 				['as' => 'device-token', 	'uses' => 'Api\UsersController@updateDeviceToken']);
			Route::post('/', 							['as' => 'create', 			'uses' => 'Api\UsersController@create']);
			Route::get('/', 							['as' => 'list', 			'uses' => 'Api\UsersController@index']);
		});

		Route::group(['prefix' => 'app', 'as' => 'app.'], function(){
			Route::post('/', 							['as' => 'index', 			'uses' => 'Api\OauthClientController@create']);
		
		});

		Route::group(['prefix' => 'coupons', 'as' => 'coupons.'], function(){
			Route::get('/code/{code}', 						['as' => 'findByCode', 'uses' => 'Api\CouponsController@findByCode']);
		});		

});

