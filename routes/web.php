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
     return view('welcome');
 });

Route::get('/login', 'LoginController@index')->name('login');
Route::post('/login', 'LoginController@verify');
Route::get('/logout', 'LoginController@logout')->name('logout');

//Admin Routes
Route::group(['middleware'=>['sessionCheck']], function(){
Route::get('/admin/home', 'AdminController@index')->name('admin.index');
Route::get('/admin/addmanager', 'AdminController@addmanager')->name('admin.manageradd');
Route::post('/admin/addmanager', 'AdminController@manageradded');
Route::get('/admin/userlist', 'AdminController@userlist')->name('userlist');
Route::get('/admin/userpdf', 'AdminController@userpdf')->name('userpdf');
Route::get('/admin/userlist/delete{id}', 'AdminController@delete')->name('admin.delete');
Route::get('/admin/noticelist', 'AdminController@noticelist')->name('admin.noticelist');
Route::get('/admin/notice/add', 'AdminController@addnotice')->name('admin.addnotice');
Route::post('/admin/notice/add', 'AdminController@noticeadded');
//Route::get('/admin/notice/add', 'AdminController@addnotice')->name('admin.addnotice');
Route::get('/admin/notice/delete{id}', 'AdminController@deletenotice')->name('notice.delete');
Route::get('admin/updf','AdminController@updf')->name('updf');
Route::get('admin/npdf','AdminController@npdf')->name('npdf');
Route::get('admin/review','AdminController@review')->name('review');
Route::get('admin/review/delete{id}','AdminController@reviewdelete')->name('review.delete');
Route::get('admin/invoice','AdminController@invoice')->name('review.invoice');
Route::get('admin/order','AdminController@order')->name('admin.order');
Route::get('admin/reset','AdminController@resetPassword')->name('admin.reset');
Route::post('admin/reset','AdminController@changePassword');
Route::get('admin/search','AdminController@search')->name('admin.search');
Route::get('admin/usersearch','AdminController@asearch')->name('admin.usersearch');
//{{route('admin.nsearch')}}
Route::get('admin/nsearch','AdminController@searchn')->name('admin.nosearch');
Route::get('admin/noticesearch','AdminController@nsearch')->name('admin.noticesearch');

Route::get('admin/send/message','AdminController@smessage')->name('admin.sendmessage');
Route::post('admin/send/message','AdminController@message');
Route::get('admin/messagelist','AdminController@messagelist')->name('admin.message');
//Route::get('admin/n{id}','AdminController@noticeResult')->name('admin.n');
});
//Route::get('admin/price','AdminController@price')->name('invoice.price');

///manager
    Route::group(['middleware'=>['name']], function(){
    Route::group(['middleware'=>['email']], function(){
    Route::get('/home', 'managerController@index')->name('home.index');
    //Notice
    Route::get('/notice', 'managerController@getNotice')->name('manager.notice');
    Route::get('/notice/edit/{id}', 'managerController@edit')->name('home.edit');
    Route::post('/notice/edit/{id}', 'managerController@update');
    Route::get('/notice/delete/{id}', 'managerController@delete');
    Route::get('/notice/create', 'managerController@noticeCreate')->name('notice.create');
    Route::post('/notice/create', 'managerController@NoticeCreatePost');
    //News
    Route::get('/news', 'managerController@getNews')->name('manager.news');
    Route::get('/news/create', 'managerController@createNews')->name('manager.news.create');
    Route::post('/news/create', 'managerController@createNewsPost');
    Route::get('/news/edit/{id}', 'managerController@editNews')->name('manager.news.edit');
    Route::post('/news/edit/{id}', 'managerController@editNewsPost');
    Route::get('/news/delete/{id}', 'managerController@deleteNews')->name('manager.news.delete');
    //contact
    Route::get('/manager/admin', 'managerController@admin')->name('contact.admin');
    Route::get('/manager/buyer', 'managerController@buyer')->name('contact.buyer');
    Route::get('/manager/seller', 'managerController@seller')->name('contact.seller');
    //message
    Route::get('/message/{email}', 'managerController@message')->name('manager.message');
    Route::post('/message/{email}', 'managerController@messagePost');
    //review
    Route::get('/manager/review', 'managerController@review')->name('manager.review');
    Route::get('/review/delete/{id}', 'managerController@reviewDelete');
    //search
    Route::get('/search', 'managerController@search')->name('manager.search');
    //pdf
    Route::get('/news/pdf/{id}', 'managerController@pdfCreate')->name('manager.pdf');
    //my message
    Route::get('/manager/message', 'managerController@myMessage')->name('manager.myMessage');
    });
    });



