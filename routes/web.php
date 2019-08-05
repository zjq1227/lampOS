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

    Route::group(['prefix' => 'admin'], function () { 
            Route::get('/index', 'Admin\IndexController@index');
            Route::get('/home', 'Admin\HomeController@index')->name('home');
            Route::get('/login','Admin\LoginController@index')->name('loginout');
            Route::post('/login/dologin','Admin\LoginController@dologin');
            // 会员管理
            Route::group(['prefix' => 'Umember'], function () {
                // 会员列表
                Route::get('/U','Admin\Umember\UmemberController@index')->name('Umember');
                // 等级管理
                Route::get('/Umember_Grading','Admin\Umember\UmemberGradeController@index')->name('Umember_Grading');
                // 会员记录管理
                Route::get('/Umember_Record','Admin\Umember\UmemberRecordController@index')->name('Umember_Record');
            });
            // 管理员管理
            Route::group(['prefix' => 'Uadmin'], function () {
                

                // 权限管理
                Route::get('/UadminCompetence','Admin\Uadmin\UadminCompetenceController@index')->name('Uadmin_Competence');
                // 权限管理添加
                Route::get('/UadminCompetence_add','Admin\Uadmin\UadminCompetenceController@addList')->name('Competence');
                // 权限管理修改
                Route::get('/UadminCompetence_upload','Admin\Uadmin\UadminCompetenceController@uploadList')->name('Competence_Upload');
                // 管理员列表
                Route::get('/UadminIstrator','Admin\Uadmin\UadminIstratorController@index')->name('Uadmin_Istrator');
                Route::get('/UadminIstrator0','Admin\Uadmin\UadminIstratorController@index0')->name('Uadmin_Istrator0');
                Route::get('/UadminIstrator1','Admin\Uadmin\UadminIstratorController@index1')->name('Uadmin_Istrator1');
                Route::get('/UadminIstrator2','Admin\Uadmin\UadminIstratorController@index2')->name('Uadmin_Istrator2');
                // 管理员列表修改
                Route::get('/UadminIstrator_Upload','Admin\Uadmin\UadminIstratorController@uploadList')->name('Uadmin_Istrator_Upload');
                //管理员添加
                 Route::post('/UadminIstrator/useradd','Admin\Uadmin\UadminIstratorController@useradd')->name('Uadmin_Istrator_add');
                //
                Route::post('/UadminIstrator/userdel/{id}','Admin\Uadmin\UadminIstratorController@userdel')->name('Uadmin_userdel'); 
                // 个人信息
                Route::get('/UadminInfo','Admin\Uadmin\UadminIstratorController@index')->name('Uadmin_Info');

            });
            // 产品管理
            Route::group(['prefix' => 'Product'], function () {
                // 产品类表
                Route::get('/P', 'Admin\Product\ProductController@index')->name('Product');
                // 产品添加
                Route::get('/Product_add', 'Admin\Product\ProductController@addList')->name('Picture_add');
                // 产品修改
                Route::get('/Product_upload', 'Admin\Product\ProductController@uploadList')->name('Picture_Upload');

                // 品牌管理
                Route::get('/Brand', 'Admin\Product\ProductBrandController@index')->name('Brand');
                // 品牌管理添加
                Route::get('/Brand_add', 'Admin\Product\ProductBrandController@addList')->name('Brand_add');
                // 品牌管理修改
                Route::get('/Brand_upload', 'Admin\Product\ProductBrandController@uploadList')->name('Brand_upload');                
                // 分类管理
                Route::get('/Category', 'Admin\Product\ProductCategoryController@index')->name('Category');
                Route::get('/Category_add', 'Admin\Product\ProductCategoryController@addList')->name('Category_add');
            });
            // 图片管理
            Route::group(['prefix' => 'Picture'], function () {
                // 广告管理
                Route::get('/P','Admin\Picture\PictureAdvertisingController@index')->name('PictureAdvertising');
                // 广告修改
                Route::get('/P_upload','Admin\Picture\PictureAdvertisingController@uploadList')->name('PictureAdvertising_Upload');
                // 分类管理
                Route::get('/Picture_Sortads','Admin\Picture\PictureSortadsController@index')->name('Picture_Sortads');
                // 分类管理修改
                Route::get('/Picture_Sortads_Upload','Admin\Picture\PictureSortadsController@uploadList')->name('Picture_Sortads_Upload');
                // 列表
                Route::get('/Picture_Ads_List','Admin\Picture\PictureSortadsController@addList')->name('Picture_Ads_List');
                // 列表修改
                Route::get('/Picture_Ads_List_Upload','Admin\Picture\PictureSortadsController@zuploadList')->name('Picture_Ads_List_Upload');
            });
            // 交易管理
            Route::group(['prefix' => 'Transaction'], function () {
                // 交易信息
                Route::get('T','Admin\Transaction\TransactionController@index')->name('Transaction');
                // 交易订单
                Route::get('Order_Chart','Admin\Transaction\TransactionOrderController@index')->name('Order_Chart');
                // 订单管理
                Route::get('Orderform','Admin\Transaction\TransactionOrderformController@index')->name('Orderform');
                // 交易金额
                Route::get('Order_Amounts','Admin\Transaction\TransactionOrderAmountsController@index')->name('Order_Amounts');
                // 订单处理
                Route::get('Order_handling','Admin\Transaction\TransactionOrderHandlingController@index')->name('Order_Handling');
                // 订单列表
                Route::get('Order_Detailed','Admin\Transaction\TransactionOrderHandlingController@addList')->name('Order_Detailed');
                // 退款处理
                Route::get('Refund','Admin\Transaction\TransactionRefundController@index')->name('Refund');
                // 退款订单处理
                Route::get('Refund_Detailed','Admin\Transaction\TransactionRefundController@addList')->name('Refund_Detailed');
            });
            // 支付管理
            Route::group(['prefix' => 'Payment'], function () {
                // 账户管理
                Route::get('Management','Admin\Payment\PaymentManagementController@index')->name('Management');
                // 
                Route::get('Details','Admin\Payment\PaymentManagementController@addList')->name('Details');
                // 支付方式z
                Route::get('Method','Admin\Payment\PaymentMethodController@index')->name('Method');
                // 支付配置
                Route::get('Configure','Admin\Payment\PaymentConfigureController@index')->name('Configure');
            });
            // 店铺管理
            Route::group(['prefix' => 'Shop'], function () {
                // 店铺列表
                Route::get('List','Admin\Shop\ShopListController@index')->name('Shop_List');
                // 店铺审核
                Route::get('Audit','Admin\Shop\ShopAuditController@index')->name('Shop_Audit');
                // 店铺详细
                Route::get('Audit_detail','Admin\Shop\ShopAuditController@create')->name('Shop_Audit_detail');
            });
            // 消息管理
            Route::group(['prefix' => 'Message'], function () {
                // 留言列表
                Route::get('Guestbook','Admin\Message\MessageGuestbookController@index')->name('Message_Guestbook');
                // 留言列表修改
                Route::get('Guestbook_Upload','Admin\Message\MessageGuestbookController@uploadList')->name('Message_Guestbook_Upload');
                // 意见列表
                Route::get('Feedback','Admin\Message\MessageFeedbackController@index')->name('Message_Feedback');
                // 意见列表
                Route::get('Feedback_Upload','Admin\Message\MessageFeedbackController@uploadList')->name('Message_Feedback_Upload');
            });
            // 文章列表
            Route::group(['prefix' => 'Article'], function () {
                // 文章列表
                Route::get('List','Admin\Article\ArticleListController@index')->name('Article_List');
                // 文章列表修改
                Route::get('List_Upload','Admin\Article\ArticleListController@uploadList')->name('Article_List_Upload');
                // 文章管理
                Route::get('Sort','Admin\Article\ArticleSortController@index')->name('Article_Sort');
                // 文章添加
                Route::get('Sort_Add','Admin\Article\ArticleSortController@addList')->name('Article_Sort_Add');
                // 文章管理修改
                Route::get('Sort_Upload','Admin\Article\ArticleSortController@uploadList')->name('Article_Sort_Upload');
            });
            // 系统管理
            Route::group(['prefix' => 'System'], function () {
                // 系统设置
                Route::get('S','Admin\System\SystemController@index')->name('System');
                // 系统栏目管理
                Route::get('Section','Admin\System\SystemSectionController@index')->name('System_Section');
                // 系统日志
                Route::get('Logs','Admin\System\SystemLogsController@index')->name('System_Logs');
            });
    // Route::get('login', 'Admin\LoginController@showLoginForm')->name('admin.login');
    // Route::post('login', 'Admin\LoginController@login'); 
    // Route::post('logout', 'Admin\LoginController@logout');
    });
// Auth::routes();
// Route::get('/home', 'HomeController@index')->name('home');