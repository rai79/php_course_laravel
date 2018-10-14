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

Route::get('/', function () {
	//этот код бы куда нибудь перенести ... но КУДА?!
	$categories = \App\Category::all();
	$data['categories'] = $categories;
	$products = \App\Product::orderBy('id', 'DESC')->paginate(6);
	$data['products'] = $products;
    return view('home',$data);
});

//главная страница сайта
Route::get('/home', 'HomeController@index')->name('home');
//новости и о компании просто грузим шаблон с исходной версткой
Route::get('/news', 'PagesController@news')->name('news');
Route::get('/about', 'PagesController@about')->name('about');
//поиск
Route::post('/search', 'PagesController@search')->name('search');

Auth::routes();
//роуты для админки
Route::group(['prefix' => 'admin', 'middleware' => ['auth', 'adminOnly']], function () {
	Route::get('/', 'AdminController@index')->name('admin.index');// тут выведем форму для выбора что будем редактировать
	// роуты для администрирования товаров
	Route::group(['prefix' => 'products'], function () {
		Route::get('/', 'AdminController@products')->name('admin.products'); // админка товаров
		Route::get('/create', 'AdminController@product_create')->name('admin.product_create'); // вывод формы добавления записи
		Route::get('/edit/{product_id}', 'AdminController@product_edit')->name('admin.product_edit'); // вывод формы редактирования
		Route::get('/delete/{product_id}', 'AdminController@product_delete')->name('admin.product_delete'); //удаление записи из бд
		Route::post('/store', 'AdminController@product_store')->name('admin.product_store'); // добавление записи в бд
		Route::post('/update/{product_id}', 'AdminController@product_update')->name('admin.product_update'); //обновление записи в бд
	});

	// роуты для администрирования категорий
	Route::group(['prefix' => 'categories'], function () {
		Route::get('/', 'AdminController@categories')->name('admin.categories'); // админка категорий
		Route::get('/create', 'AdminController@category_create')->name('admin.category_create'); // вывод формы добавления записи
		Route::get('/edit/{category_id}', 'AdminController@category_edit')->name('admin.category_edit'); // вывод формы редактирования
		Route::get('/delete/{category_id}', 'AdminController@category_delete')->name('admin.category_delete'); //удаление записи из бд
		Route::post('/store', 'AdminController@category_store')->name('admin.category_store'); // добавление записи в бд
		Route::post('/update/{category_id}', 'AdminController@category_update')->name('admin.category_update'); //обновление записи в бд
	});

	// роуты для просмотра заказов
	Route::get('/orders', 'AdminController@orders')->name('admin.orders'); // вывод заказов

	Route::group(['prefix' => 'notifications'], function () {
	//роуты для редактирования эл.ящиков для уведомления о заказе
		Route::get('/', 'AdminController@notifications')->name('admin.notifications'); // вывод формы редактирования
		Route::get('/create', 'AdminController@notification_create')->name('admin.notification_create'); // вывод формы редактирования
		Route::get('/edit/{notification_id}', 'AdminController@notification_edit')->name('admin.notification_edit'); // вывод формы редактирования
		Route::get('/delete/{notification_id}', 'AdminController@notification_delete')->name('admin.notification_delete'); //удаление записи из бд
		Route::post('/store', 'AdminController@notification_store')->name('admin.notification_store'); // добавление записи в бд
		Route::post('/update/{notification_id}', 'AdminController@notification_update')->name('admin.notification_update'); //обновление записи в бд
	});
});

//роуты для категорий
Route::get('/category/{category_id}', 'CategoriesController@category')->name('category');
//товары
Route::get('/product/{product_id}', 'ProductsController@product')->name('product');
Route::post('/product/buy/{product_id}', 'ProductsController@buy')->name('product.buy');
Route::group(['prefix' => 'cart'], function () {
	Route::post('/buy', 'CartController@buy')->name('cart.buy');
	Route::get('/add/{product_id}', 'CartController@add')->name('cart.add');
	Route::get('/delete/{product_id}', 'CartController@delete')->name('cart.delete');
	Route::get('/clear', 'CartController@clear')->name('cart.clear');
	Route::get('/', 'CartController@cart')->name('cart');
});