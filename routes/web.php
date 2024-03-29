	<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| 这里是后台的路由进行页面跳转控制
| 
|
|
*/

Route::get('/', function () {
    return view('welcome');
});
// Route::post('/Login/dologin','Admin\LoginController@dologin')->name('dologin');


    Route::group(['prefix' => 'admin'], function () { 
            Route::get('/index', 'Admin\IndexController@index');
            Route::get('/home', 'Admin\HomeController@index')->name('home');
            Route::get('/login','Admin\LoginController@index')->name('login');
            Route::get('/indexout','Admin\IndexController@indexout')->name('loginout');
            Route::post('/Login/dologin','Admin\LoginController@dologin')->name('dologin');
            // 会员管理
            Route::group(['prefix' => 'Umember'], function () {
                // 会员列表
                Route::any('/U','Admin\Umember\UmemberController@index')->name('Umember');
                //会员添加
                Route::POST('/Add','Admin\Umember\UmemberController@addUser')->name('addUser');
                // 等级管理
                Route::get('/Umember_Grading','Admin\Umember\UmemberGradeController@index')->name('Umember_Grading');
                // 会员记录管理
                Route::get('/Umember_Record','Admin\Umember\UmemberRecordController@index')->name('Umember_Record');
                //会员权限修改
                Route::any('/userupd/{id}','Admin\Umember\UmemberController@userupd')->name('useradmupd');
                //会员信息修改
                Route::any('/upd/{id}','Admin\Umember\UmemberController@update')->name('userupdate');
                //会员信息删除
                Route::any('/del/{id}','Admin\Umember\UmemberController@delete')->name('userdelete');
            });
            // 管理员管理
            Route::group(['prefix' => 'Uadmin'], function () {
                

                // 权限管理
                Route::get('/UadminCompetence','Admin\Uadmin\UadminCompetenceController@index')->name('Uadmin_Competence');
                // 权限管理修改
                Route::get('/UadminCompetence_upload/{id}','Admin\Uadmin\UadminCompetenceController@uploadList')->name('Competence_Upload');
                //权限修改
                Route::post('/Competence_Update/{id}','Admin\Uadmin\UadminCompetenceController@update')->name('Competence_Update'); 
                // 管理员列表
                Route::get('/UadminIstrator','Admin\Uadmin\UadminIstratorController@index')->name('Uadmin_Istrator');
                Route::get('/UadminIstrator0','Admin\Uadmin\UadminIstratorController@index0')->name('Uadmin_Istrator0');
                Route::get('/UadminIstrator1','Admin\Uadmin\UadminIstratorController@index1')->name('Uadmin_Istrator1');
                Route::get('/UadminIstrator2','Admin\Uadmin\UadminIstratorController@index2')->name('Uadmin_Istrator2');
                // 管理员列表修改
                Route::get('/UadminIstrator_Upload/{id}','Admin\Uadmin\UadminIstratorController@uploadList')->name('Uadmin_Istrator_Upload');
                //管理员添加
                 Route::post('/UadminIstrator/useradd','Admin\Uadmin\UadminIstratorController@useradd')->name('Uadmin_Istrator_add');
                //管理员删除
                Route::post('/UadminIstrator/userdel/{id}','Admin\Uadmin\UadminIstratorController@userdel')->name('Uadmin_userdel'); 
                //管理状态修改
                Route::post('/UadminIstrator/userupd/{id}','Admin\Uadmin\UadminIstratorController@userupd')->name('Uadmin_useradmupd'); 
                Route::post('/userupdate/{id}','Admin\Uadmin\UadminIstratorController@userupdate')->name('Uadmin_Upd'); 
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
                Route::post('Orderupd/{id}','Admin\Transaction\TransactionOrderformController@update')->name('Orderupd');
                Route::any('Orderdel/{id}','Admin\Transaction\TransactionOrderformController@delete')->name('Orderdel');
                // 交易金额
                Route::get('Order_Amounts','Admin\Transaction\TransactionOrderAmountsController@index')->name('Order_Amounts');
                // 订单处理
                Route::get('Order_handling','Admin\Transaction\TransactionOrderHandlingController@index')->name('Order_Handling');
                Route::get('handling0','Admin\Transaction\TransactionOrderHandlingController@index0')->name('Order_Handling0');
                Route::get('handling1','Admin\Transaction\TransactionOrderHandlingController@index1')->name('Order_Handling1');
                Route::get('handling2','Admin\Transaction\TransactionOrderHandlingController@index2')->name('Order_Handling2');
                Route::get('handling4','Admin\Transaction\TransactionOrderHandlingController@index4')->name('Order_Handling4');
                //订单发货
                Route::post('handdeal/{id}','Admin\Transaction\TransactionOrderHandlingController@deal')->name('handdeal');
                Route::any('ordstu/{id}','Admin\Transaction\TransactionOrderHandlingController@ordstu')->name('ordstu');
                // 订单列表
                Route::get('detailed/{id}','Admin\Transaction\TransactionOrderHandlingController@addList')->name('Order_Detailed');
                //订单列表修改
                Route::post('Detaiupd/{id}','Admin\Transaction\TransactionOrderHandlingController@Listupd')->name('tailupd');
                //订单地址修改
                Route::post('Adress/{id}','Admin\Transaction\TransactionOrderHandlingController@Adress')->name('dresupd');
                // 退款处理
                Route::get('Refund','Admin\Transaction\TransactionRefundController@index')->name('Refund');
                Route::get('Redres/{id}','Admin\Transaction\TransactionRefundController@dres')->name('Redres');
                Route::get('delete/{id}','Admin\Transaction\TransactionRefundController@delete')->name('delete');
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
                // 友情链接
                Route::get('Sort_pen','Admin\Article\ArticlePenController@index')->name('Article_pen');
                Route::post('Addlink','Admin\Article\ArticlePenController@addlink')->name('pen_link');
                Route::post('updlink/{id}','Admin\Article\ArticlePenController@upd')->name('pen_upd');
                Route::any('dellinks/{id}','Admin\Article\ArticlePenController@del')->name('pen_del');
            });
            // 系统管理
            Route::group(['prefix' => 'System'], function () {
                // 系统设置
                Route::get('S','Admin\System\SystemController@index')->name('System');
                // 系统栏目管理
                Route::get('Section','Admin\System\SystemSectionController@index')->name('System_Section');
                // 系统设置修改
                Route::post('Section_Create','Admin\System\SystemController@create')->name('System_Create');
                // 系统日志
                Route::get('Logs','Admin\System\SystemLogsController@index')->name('System_Logs');
            });
    // Route::get('login', 'Admin\LoginController@showLoginForm')->name('admin.login');
    // Route::post('login', 'Admin\LoginController@login'); 
    // Route::post('logout', 'Admin\LoginController@logout');
    });
        Route::group(['namespace'=>'Home','prefix' => 'home'], function () {
        Route::get('/Index', 'IndexController@index')->name('Index');
        Route::get('/Login', 'Login\LoginController@index')->name('Hlogin');
        Route::resource('Register','Login\RegisterController');
        Route::get('/emailStatus','Login\RegisterController@emailStatus')->name('emailStatus');
        // 个人中心
        Route::group(['namespace'=>'Center','prefix' => 'Center'], function () {
            // 个人中心-个人资料
            Route::get('/','CenterController@index')->name('Center');
            // 个人资料
            Route::group(['namespace'=>'Personal','prefix' => 'Personal'], function () {
                // 个人信息
                Route::get('/Information','InformationController@index')->name('Information');
                // 安全设置
                Route::get('/Safety','SafetyController@index')->name('Safety');
                    // 登陆密码修改
                    Route::get('/Password','SafetyController@Password')->name('Password');
                    // 支付密码修改
                    Route::get('/Setpay','SafetyController@Setpay')->name('Setpay');
                    // 手机验证换绑
                    Route::get('/Bindphone','SafetyController@Bindphone')->name('Bindphone');
                    // 邮箱验证换绑
                    Route::get('/Email','SafetyController@Email')->name('Email');
                    // 实名认证
                    Route::get('/Idcard','SafetyController@Idcard')->name('Idcard');
                    // 安全问题认证
                    Route::get('/Question','SafetyController@Question')->name('Question');
                // 收货地址
                Route::get('/Address','AddressController@index')->name('Address');
            });
            // 我的交易
            Route::group(['namespace'=>'Deal','prefix' => 'Deal'], function () {
                // 订单管理
                Route::get('/Order','OrderController@index')->name('Order');
                //订单删除
                Route::get('/Ordel/{id}','OrderController@Ordel')->name('Ordel');
                Route::get('/Ordsuc/{id}','OrderController@suc')->name('Ordsuc');
                // 订单详情
                Route::get('/Orderinfo/{id}','OrderController@orderInfo')->name('Orderinfo');
                //  物流跟踪
                Route::get('/Logistics','OrderController@logistics')->name('Logistics');
                    // 一键支付
                    Route::get('/Pay','OrderController@pay')->name('Pay');
                    // 支付成功
                    Route::get('/Success','OrderController@success')->name('Success');
                // 退款售后
                Route::get('/Change','ChangeController@index')->name('Change');
                Route::get('/Chdit/{id}','ChangeController@edit')->name('Chdit');
                    // 钱款去向
                    Route::get('/Record/{id}','ChangeController@create')->name('Record');
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
                Route::any('/del/{id}','CollectionController@del')->name('del');
                // 足迹
                Route::get('/Foot','FootController@index')->name('Foot');
                Route::get('/Footdel/{id}','FootController@destory')->name('Footdel');
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
            Route::any('/Search','SearchController@index')->name('Search');
            // 品牌商品详情
            Route::get('/Search_type/{name}','SearchController@brand')->name('Search_type');
            // 商品详情
            Route::get('/Introduction','IntroductionController@index')->name('Introduction');            
        });
        // 购物车
        Route::get('/Shopcart','Shopcart\ShopcartController@index')->name('Shopcart');
    });
// Auth::routes();
// Route::get('/home', 'HomeController@index')->name('home');