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

//Route::group(['middleware' => 'cors'], function(){
		
	Route::resource('company', 		'Api\CompanyController', 	['except'=>['create', 'edit', 'delete']]);
	
	Route::group(['prefix' => 'company/{company_id}/', 'as' => 'company.'], function(){
		Route::resource('branch', 				'Api\BranchController', 				['except'=>['create', 'edit', 'delete']]);
		Route::resource('category', 			'Api\CategoryController', 			['except'=>['create', 'edit', 'delete']]);
		Route::resource('product', 				'Api\ProductController', 				['except'=>['create', 'edit', 'delete']]);
		
		Route::resource('menu', 					'Api\MenuController', 					['except'=>['create', 'edit', 'delete']]);
		Route::post(		'menu/{menu_id}/product', 					['as'=>'menu.product.sync', 	'uses'=>'Api\MenuController@syncProduct']);
		Route::get(			'menu/{menu_id}/product', 					['as'=>'menu.product.index', 	'uses'=>'Api\MenuController@queryProduct']);
		Route::post(		'menu/{menu_id}/branch', 						['as'=>'menu.branch.sync', 		'uses'=>'Api\MenuController@syncBranch']);
		Route::get(			'menu/{menu_id}/branch', 						['as'=>'menu.branch.index', 	'uses'=>'Api\MenuController@queryBranch']);
		
	});
//});

