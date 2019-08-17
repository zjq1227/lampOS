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
                // 管理员列表修改
                Route::get('/UadminIstrator_Upload','Admin\Uadmin\UadminIstratorController@uploadList')->name('Uadmin_Istrator_Upload');

                // 个人信息
                Route::get('/UadminInfo','Admin\Uadmin\UadminIstratorController@index')->name('Uadmin_Info');

            });
            // 产品管理
            Route::group(['prefix' => 'Product'], function () {
                // 产品类表
                Route::get('/P/{name}', 'Admin\Product\ProductController@index')->name('Product');
                // 产品添加
                Route::get('/Product_add', 'Admin\Product\ProductController@addList')->name('Picture_add');
                 // 产品添加处理
                 Route::POST('/Product_create', 'Admin\Product\ProductController@create')->name('Picture_create');
                // 添加图片
                Route::POST('/Product_add/img', 'Admin\Product\ProductController@img')->name('Picture_add_img');
                // 产品修改
                Route::get('/Product_upload/{id}', 'Admin\Product\ProductController@uploadList')->name('Picture_Upload');
                // 产品修改处理
                Route::post('/Product_update/{id}', 'Admin\Product\ProductController@update')->name('Picture_update');
                // 产品修改状态
                Route::post('/Product_state/{id}', 'Admin\Product\ProductController@state')->name('Picture_state');

                // 品牌管理
                Route::get('/Brand', 'Admin\Product\ProductBrandController@index')->name('Brand');
                // 品牌管理添加
                Route::get('/Brand_add', 'Admin\Product\ProductBrandController@addList')->name('Brand_add');
                // 品牌管理修改
                Route::get('/Brand_upload', 'Admin\Product\ProductBrandController@uploadList')->name('Brand_upload');                
                // 分类管理
                Route::get('/Category', 'Admin\Product\ProductCategoryController@index')->name('Category');
                // 分类添加管理
                Route::get('/Category_add/{name}', 'Admin\Product\ProductCategoryController@addList')->name('Category_add');
                // 分类添加
                Route::POST('/Category/add', 'Admin\Product\ProductCategoryController@insert')->name('Category.add');
                // 分类修改
                Route::POST('/Category/del', 'Admin\Product\ProductCategoryController@del')->name('Category.del');
            });
            // 图片管理
            Route::group(['prefix' => 'Picture'], function () {
                // 广告管理
                Route::get('/P','Admin\Picture\PictureAdvertisingController@index')->name('PictureAdvertising');
                // 广告修改
                Route::get('/P_upload','Admin\Picture\PictureAdvertisingController@uploadList')->name('PictureAdvertising_Upload');
                // 分类管理
                Route::get('/Picture_Sortads','Admin\Picture\PictureSortadsController@index')->name('Picture_Sortads');
                // 列表
                Route::get('/Picture_Ads_List/{id}','Admin\Picture\PictureSortadsController@addList')->name('Picture_Ads_List');
                // 列表添加
                Route::get('/Picture_Sortads_Add/{id}','Admin\Picture\PictureSortadsController@uploadList')->name('Picture_Sortads_Add');
                // 添加功能
                Route::post('/Picture_Sortads_Addlist/{id}','Admin\Picture\PictureSortadsController@insert')->name('Picture_Sortads_Addlist');
                // 列表修改
                Route::get('/Picture_Sortads_Upload/{id}','Admin\Picture\PictureSortadsController@zuploadList')->name('Picture_Sortads_Upload');
                // 修改功能
                Route::post('/Picture_Sortads_Update/{id}','Admin\Picture\PictureSortadsController@update')->name('Picture_Sortads_Update');
                // 修改状态
                Route::post('/Picture_Sortads_Status/{id}','Admin\Picture\PictureSortadsController@Status')->name('Picture_Sortads_Status');

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
                // 支付方式
                Route::get('Method','Admin\Payment\PaymentMethodController@index')->name('Method');
                // 支付配置
                Route::get('Configure','Admin\Payment\PaymentConfigureController@index')->name('Configure');
            });
            // 店铺管理
            Route::group(['prefix' => 'Shop'], function () {
                // 店铺列表
                Route::get('List/{name}','Admin\Shop\ShopListController@index')->name('Shop_List');
                // 删除
                Route::post('List/del/{id}','Admin\Shop\ShopListController@destroy')->name('Shop_List_del');
                // 店铺审核
                Route::get('Audit','Admin\Shop\ShopAuditController@index')->name('Shop_Audit');
                // 店铺详细
                Route::get('Audit_detail/{id}','Admin\Shop\ShopAuditController@create')->name('Shop_Audit_detail');
                // 通过
                Route::get('Audit_detail_updated/{id}','Admin\Shop\ShopAuditController@edit')->name('Shop_Audit_detail_update');
                // 拒绝
                Route::post('Audit_detail_del/{id}','Admin\Shop\ShopAuditController@destroy')->name('Shop_Audit_detail_del');
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
    Route::get('/login', 'Admin\LoginController@index')->name('login'); 
    // Route::post('logout', 'Admin\LoginController@logout');
    });
    Route::group(['namespace'=>'Home','prefix' => 'home'], function () {
        Route::get('/Index', 'IndexController@index')->name('Index');
        Route::get('/Index/Show/{id}','IndexController@show')->name('Index.show');
        Route::resource('Register','Login\RegisterController');
        Route::resource('Login','Login\LoginController');
        // 店铺申请
        Route::resource('ShopAudit','ShopAudit\ShopAuditController');
        // 注册邮箱验证
        Route::get('/emailStatus','Login\RegisterController@emailStatus')->name('emailStatus');
        // 注册手机验证
        Route::post('/sendPhone','Login\RegisterController@sendPhone')->name('sendPhone');
        Route::post('/phonestore','Login\RegisterController@phonestore')->name('phonestore');
        // 个人中心
        Route::group(['namespace'=>'Center','prefix' => 'Center'], function () {
            // 个人中心-个人资料
            Route::get('/','CenterController@index')->name('Center');
            // 个人资料
            Route::group(['namespace'=>'Personal','prefix' => 'Personal'], function () {
                // 个人信息
                Route::resource('/Information','InformationController');
                // 安全设置
                Route::resource('/Safety', 'SafetyController');
                    // 登陆密码修改
                    Route::get('/Password','SafetyController@Password')->name('Password');
                    // 支付密码修改
                    Route::get('/Setpay','SafetyController@Setpay')->name('Setpay');
                    Route::post('/sendPhone','SafetyController@sendPhone')->name('Setpay.sendPhone');
                    Route::post('/phonestore','SafetyController@phonestore')->name('Setpay.phonestore');
                    // 手机验证换绑
                    Route::get('/Bindphone','SafetyController@Bindphone')->name('Bindphone');
                    // 邮箱验证换绑
                    Route::get('/Email','SafetyController@Email')->name('Email');
                    Route::post('/emailstore','SafetyController@emailstore')->name('Setpay.emailstore');
                    Route::post('/emailStatus','SafetyController@emailStatus')->name('Setpay.emailStatus');
                    // 实名认证
                    Route::get('/Idcard','SafetyController@Idcard')->name('Idcard');
                    // 安全问题认证
                    Route::get('/Question','SafetyController@Question')->name('Question');
                // 收货地址
                Route::resource('/Address','AddressController');
            });
            // 我的交易
            Route::group(['namespace'=>'Deal','prefix' => 'Deal'], function () {
                // 订单管理
                Route::get('/Order','OrderController@index')->name('Order');
                // 订单详情
                Route::get('/Orderinfo','OrderController@orderInfo')->name('Orderinfo');
                //  物流跟踪
                Route::get('/Logistics','OrderController@logistics')->name('Logistics');
                    // 一键支付
                    Route::get('/Pay','OrderController@pay')->name('Pay');
                    // 支付成功
                    Route::get('/Success','OrderController@success')->name('Success');
                // 退款售后
                Route::get('/Change','ChangeController@index')->name('Change');
                    // 钱款去向
                    Route::get('/Record','ChangeController@create')->name('Record');
            });
            // 我的资产
            Route::group(['namespace'=>'Assets','prefix' => 'Assets'], function () {
                // 优惠券
                Route::get('/Coupon','CouponController@index')->name('Coupon');                
                // 红包
                Route::get('/Bonus','BonusController@index')->name('Bonus');                
                // 账单明细
                Route::get('/Bill','BillController@index')->name('Bill');
                // 查看详情
                Route::get('/BillList','BillController@billList')->name('BillList');  
            });
            // 我的小窝
            Route::group(['namespace'=>'Aboutmy','prefix' => 'Aboutmy'], function () {
                // 收藏
                Route::get('/Collection','CollectionController@index')->name('Collection');
                // 足迹
                Route::get('/Foot','FootController@index')->name('Foot');
                Route::POST('/Foot/store','FootController@index')->name('Foot.store');
                // 评价
                Route::get('/Comment','CommentController@index')->name('Comment');
                // 消息
                Route::get('/News','NewsController@index')->name('News');
                // 新闻
                Route::get('/Blog','NewsController@blog')->name('Blog');                
            });
        });
        // 详情
        Route::group(['namespace'=>'Details','prefix' => 'Details'], function () {
            // 搜索详情
            Route::get('/Search/{id}','SearchController@index')->name('Search');
            // 商品详情
            Route::get('/Introduction/{id}','IntroductionController@index')->name('Introduction');            
        });
        // 购物车
        Route::resource('/Shopcart','Shopcart\ShopcartController');
        Route::post('/Shopcart/add/{id}','Shopcart\ShopcartController@add')->name('Shopcart.add');
    });
// Auth::routes();
// Route::get('/home', 'HomeController@index')->name('home');