<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::resource('/', 'CategoryController', ['only' => [
    'index',
    'create',
    'store'
]]);

Route::group(array('middleware' => 'auth'), function () {
  Route::get('/admin', function () {return view('admin');});

  Route::resource('/admin/admins', 'AdminController', ['only' => [
      'index',          //+GET	       /admin/admins	     index    	admin.index
      'create',         //+GET	    /admin/admins/create	 create	     admin.create
      'store',          //+POST   	/admin/admins	        store   s	admin.store
      'edit',           //+GET	/admin/admins/{id}/edit	  edit	      admin.edit
      'update',          //+PUT/PATCH	/admin/admins/{id}	update	   admin.update
      'destroy'         //DELETE        /admin/admins/{id}  destroy     admin.destroy
  ]]);

  Route::resource('/admin/categories', 'AdminCategoryController', ['only' => [
      'index',          //+GET	       /admin/categories	     index    	admincategory.index
      'create',         //+GET	    /admin/categories/create	 create	     admincategory.create
      'store',          //+POST   	/admin/categories	        store   s	admincategory.store
      'destroy'         //DELETE        /admin/categories/{id}  destroy     admincategory.destroy
  ]]);

  Route::resource('/admin/category', 'FaqController', ['only' => [
      'index',          //+GET	       /admin/category	     index    	faq.index
      'show',           //+GET	       /admin/category/{id}	     index    	faq.index
      'edit',           //+GET	     /admin/category/{id}/edit	  edit	      faq.edit
      'update',          //+PUT/PATCH	/admin/category/{id}	update	   faq.update
      'destroy'         //DELETE        /admin/category/{id}  destroy     faq.destroy
  ]]);
  Route::get('/admin/category/{id}/edit_category', 'FaqController@edit_category');

});

Route::get('/logout', function()
{
    Auth::logout();
    return redirect('/');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
