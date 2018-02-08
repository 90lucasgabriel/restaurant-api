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
	// PARAMETERS 
	Route::resource('order-status', 				'Api\OrderStatusController', 				['except'=>['create', 'edit', 'delete']]);
	Route::resource('order-detail-status',	'Api\OrderDetailStatusController',	['except'=>['create', 'edit', 'delete']]);
	Route::resource('order-detail-type',		'Api\OrderDetailTypeController',		['except'=>['create', 'edit', 'delete']]);
		
	// COMPANY
	Route::group(['prefix' => 'company/{company_id}/', 'as' => 'company.'], function(){

		// COMPANY/BRANCH
		Route::group(['prefix' => 'branch/{branch_id}/', 'as' => 'company.branch.'], function(){
			
			// COMPANY/BRANCH/ORDER
			Route::group(['prefix' => 'order/{order_id}/', 'as' => 'company.branch.order'], function(){
			 	Route::resource('detail', 						'Api\OrderDetailController', 			 	['except'=>['create', 'edit', 'delete']]);
			});
			Route::get(		'order-detail', 					['as'=>'order-detail.byBranch',			'uses'=>'Api\OrderDetailController@queryByBranch']);
			
			Route::resource('diningtable',  				'Api\DiningtableController', 				['except'=>['create', 'edit', 'delete']]);
			Route::resource('order', 			  				'Api\OrderController', 			 				['except'=>['create', 'edit', 'delete']]);
		});
		

		Route::resource('branch', 								'Api\BranchController', 						['except'=>['create', 'edit', 'delete']]);
		Route::resource('category', 							'Api\CategoryController', 					['except'=>['create', 'edit', 'delete']]);
		Route::resource('product', 								'Api\ProductController', 						['except'=>['create', 'edit', 'delete']]);
		Route::resource('menu', 									'Api\MenuController', 							['except'=>['create', 'edit', 'delete']]);
		Route::post(		'menu/{menu_id}/branch', 	['as'=>'menu.branch.sync', 					'uses'=>'Api\MenuController@syncBranch']);
		Route::post(		'menu/{menu_id}/product', ['as'=>'menu.product.sync', 				'uses'=>'Api\MenuController@syncProduct']);
		Route::post(		'menu/{menu_id}/time', 		['as'=>'menu.time.sync', 						'uses'=>'Api\MenuController@syncTime']);
		
		
	});
	Route::resource('company', 									'Api\CompanyController', 						['except'=>['create', 'edit', 'delete']]);
//});

