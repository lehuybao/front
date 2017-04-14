<?php

use Illuminate\Session\TokenMismatchException;

/**
 * FRONT
 */
Route::get('front', [
    'as' => 'front',
    'uses' => 'Foostart\Front\Controllers\Front\FrontFrontController@index'
]);


/**
 * ADMINISTRATOR
 */
Route::group(['middleware' => ['web']], function () {

    Route::group(['middleware' => ['admin_logged', 'can_see']], function () {

        ////////////////////////////////////////////////////////////////////////
        ////////////////////////////SAMPLES ROUTE///////////////////////////////
        ////////////////////////////////////////////////////////////////////////
        /**
         * list
         */
        Route::get('admin/front', [
            'as' => 'admin_front',
            'uses' => 'Foostart\Front\Controllers\Admin\FrontAdminController@index'
        ]);

        /**
         * edit-add
         */
        Route::get('admin/front/edit', [
            'as' => 'admin_front.edit',
            'uses' => 'Foostart\Front\Controllers\Admin\FrontAdminController@edit'
        ]);

        /**
         * post
         */
        Route::post('admin/front/edit', [
            'as' => 'admin_front.post',
            'uses' => 'Foostart\Front\Controllers\Admin\FrontAdminController@post'
        ]);

        /**
         * delete
         */
        Route::get('admin/front/delete', [
            'as' => 'admin_front.delete',
            'uses' => 'Foostart\Front\Controllers\Admin\FrontAdminController@delete'
        ]);
        ////////////////////////////////////////////////////////////////////////
        ////////////////////////////SAMPLES ROUTE///////////////////////////////
        ////////////////////////////////////////////////////////////////////////




        
        ////////////////////////////////////////////////////////////////////////
        ////////////////////////////CATEGORIES///////////////////////////////
        ////////////////////////////////////////////////////////////////////////
         Route::get('admin/front_category', [
            'as' => 'admin_front_category',
            'uses' => 'Foostart\Front\Controllers\Admin\FrontCategoryAdminController@index'
        ]);

        /**
         * edit-add
         */
        Route::get('admin/front_category/edit', [
            'as' => 'admin_front_category.edit',
            'uses' => 'Foostart\Front\Controllers\Admin\FrontCategoryAdminController@edit'
        ]);

        /**
         * post
         */
        Route::post('admin/front_category/edit', [
            'as' => 'admin_front_category.post',
            'uses' => 'Foostart\Front\Controllers\Admin\FrontCategoryAdminController@post'
        ]);
         /**
         * delete
         */
        Route::get('admin/front_category/delete', [
            'as' => 'admin_front_category.delete',
            'uses' => 'Foostart\Front\Controllers\Admin\FrontCategoryAdminController@delete'
        ]);
        ////////////////////////////////////////////////////////////////////////
        ////////////////////////////CATEGORIES///////////////////////////////
        ////////////////////////////////////////////////////////////////////////
    });
});
