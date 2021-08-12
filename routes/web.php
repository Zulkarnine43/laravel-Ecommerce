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

Route::get('/', 'Frontend\PagesController@index')->name('user.index');
Route::get('/contact', 'Frontend\PagesController@contact')->name('contact');

 Route::get('/login', 'Auth\LoginController@showLoginForm')->name('user.login');
 Route::post('/login/submit', 'Auth\LoginController@login_save')->name('user.login.submit');

/*
Product Routes
All the routes for our product for frontend
*/

Route::post('/wishlist/{id}', [
  'uses' => 'Backend\WishlistController@wishlist_add',
  'as' => 'wishlist_add'
]);
Route::get('/wishlist/view/{product_id}', [
  'uses' => 'Frontend\WishlistController@wishlist_view',
  'as' => 'wishlist_view'
]);



  Route::get('/', 'Frontend\ProductsController@index')->name('products');
  Route::get('/{slug}', 'Frontend\ProductsController@show')->name('products.show');
  Route::get('/new/search', 'Frontend\PagesController@search')->name('search');

  //Category Routes
  Route::get('/categories', 'Frontend\CategoriesController@index')->name('categories.index');
  Route::get('/category/{id}', 'Frontend\CategoriesController@show')->name('categories.show');



// User Routes

  Route::get('/token/{token}', 'Frontend\VerificationController@verify')->name('user.verification');
  Route::get('/dashboard', 'Frontend\UsersController@dashboard')->name('user.dashboard');
  Route::get('/profile', 'Frontend\UsersController@profile')->name('user.profile');
  Route::post('/profile/update', 'Frontend\UsersController@profileUpdate')->name('user.profile.update');



// Cart Routes

  Route::get('/', 'Frontend\CartsController@index')->name('carts');
  Route::post('/store', 'Frontend\CartsController@store')->name('carts.store');
  Route::post('/update/{id}', 'Frontend\CartsController@update')->name('carts.update');
  Route::post('/delete/{id}', 'Frontend\CartsController@destroy')->name('carts.delete');


// Checkout Routes

  Route::get('/', 'Frontend\CheckoutsController@index')->name('checkouts');
  Route::post('/store', 'Frontend\CheckoutsController@store')->name('checkouts.store');




// Admin Login Routes
  Route::get('/admin/login', 'Auth\Admin\LoginController@showLoginForm')->name('admin.login');
  Route::post('/loggin/submit', 'Auth\Admin\LoginController@login')->name('admin.login.submit');
  Route::post('/logout/submit', 'Auth\Admin\LoginController@logout')->name('admin.logout');

// Admin Routes

  Route::get('/admin/home', 'Backend\PagesController@index')->name('admin.index');



  // // Password Email Send
  // Route::get('/password/reset', 'Auth\Admin\ForgotPasswordController@showLinkRequestForm')->name('admin.password.request');
  // Route::post('/password/resetPost', 'Auth\Admin\ForgotPasswordController@sendResetLinkEmail')->name('admin.password.email');

  // // Password Reset
  // Route::get('/password/reset/{token}', 'Auth\Admin\ResetPasswordController@showResetForm')->name('admin.password.reset');
  // Route::post('/password/reset', 'Auth\Admin\ResetPasswordController@reset')->name('admin.password.reset.post');


  // Product Routes
    Route::get('/products', 'Backend\ProductsController@index')->name('admin.products');
    Route::get('/products/create', 'Backend\ProductsController@create')->name('admin.product.create');
    Route::get('/products/edit/{id}', 'Backend\ProductsController@edit')->name('admin.product.edit');

    Route::post('/products/store', 'Backend\ProductsController@store')->name('admin.product.store');

    Route::post('/product/update/{id}', 'Backend\ProductsController@update')->name('admin.product.update');
    Route::post('/product/delete/{id}', 'Backend\ProductsController@delete')->name('admin.product.delete');



  // Orders Routes
    Route::get('/orders', 'Backend\OrdersController@index')->name('admin.orders');
    Route::get('/orders/view/{id}', 'Backend\OrdersController@show')->name('admin.order.show');
    Route::post('/orders/delete/{id}', 'Backend\OrdersController@delete')->name('admin.order.delete');

    Route::post('/orders/completed/{id}', 'Backend\OrdersController@completed')->name('admin.order.completed');

    Route::post('/orders/paid/{id}', 'Backend\OrdersController@paid')->name('admin.order.paid');




  // Category Routes

    Route::get('/categories', 'Backend\CategoriesController@index')->name('admin.categories');
    Route::get('/categories/create', 'Backend\CategoriesController@create')->name('admin.category.create');
    Route::get('/categories/edit/{id}', 'Backend\CategoriesController@edit')->name('admin.category.edit');

    Route::post('/categories/store', 'Backend\CategoriesController@store')->name('admin.category.store');

    Route::post('/category/update/{id}', 'Backend\CategoriesController@update')->name('admin.category.update');
    Route::post('/category/delete/{id}', 'Backend\CategoriesController@delete')->name('admin.category.delete');


  // Brand Routes

    Route::get('/brands', 'Backend\BrandsController@index')->name('admin.brands');
    Route::get('/brands/create', 'Backend\BrandsController@create')->name('admin.brand.create');
    Route::get('/brands/edit/{id}', 'Backend\BrandsController@edit')->name('admin.brand.edit');

    Route::post('/brands/store', 'Backend\BrandsController@store')->name('admin.brand.store');

    Route::post('/brand/update/{id}', 'Backend\BrandsController@update')->name('admin.brand.update');
    Route::post('/brand/delete/{id}', 'Backend\BrandsController@delete')->name('admin.brand.delete');


  // Division Routes

    Route::get('/divisions', 'Backend\DivisionsController@index')->name('admin.divisions');
    Route::get('/divisions/create', 'Backend\DivisionsController@create')->name('admin.division.create');
    Route::get('/divisions/edit/{id}', 'Backend\DivisionsController@edit')->name('admin.division.edit');

    Route::post('/divisions/store', 'Backend\DivisionsController@store')->name('admin.division.store');

    Route::post('/division/update/{id}', 'Backend\DivisionsController@update')->name('admin.division.update');
    Route::post('/division/delete/{id}', 'Backend\DivisionsController@delete')->name('admin.division.delete');



  // districts Routes
    Route::get('/districts', 'Backend\DistrictsController@index')->name('admin.districts');
    Route::get('/districts/create', 'Backend\DistrictsController@create')->name('admin.district.create');
    Route::get('/districts/edit/{id}', 'Backend\DistrictsController@edit')->name('admin.district.edit');

    Route::post('/districts/store', 'Backend\DistrictsController@store')->name('admin.district.store');

    Route::post('/districts/district/edit/{id}', 'Backend\DistrictsController@update')->name('admin.district.update');
    Route::post('/districts/district/delete/{id}', 'Backend\DistrictsController@delete')->name('admin.district.delete');

    Route::get('/districts/sliders', 'Backend\SlidersController@index')->name('admin.sliders');

    Route::get('/districts/crete', 'Backend\slidersController@create')->name('admin.slider.create');

    Route::post('/districts/store', 'Backend\slidersController@store')->name('admin.slider.store');


    Route::post('/slider/update/{id}', 'Backend\slidersController@update')->name('admin.slider.update');
    Route::post('/slider/delete/{id}', 'Backend\slidersController@delete')->name('admin.slider.delete');



// Auth::routes();

// Route::get('/home', 'HomeController@index')->name('home');

// Route::get('get-districts/{id}', function ($id) {
//   $result = App\Models\District::where('division_id', $id)->get();
//   return json_encode($result);
// });
