<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\SubCategoryController;
use App\Http\Controllers\BrandController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CityController;
use App\Http\Controllers\PayTypeController;
use App\Http\Controllers\ViewController;
use App\Http\Controllers\FeedbackController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ReportController;
use App\Http\Controllers\PaymentController;
use Illuminate\Support\Facades\Route;

Route::get('/check', function () {
    return view('home.profile');
});

Route::get('/', [AdminController::class, 'welcome']);
Route::get('/siteAdmin', [AdminController::class, 'siteAdmin']);

Route::get('/admin', [AdminController::class, 'login']);
Route::post('/saveLogin', [AdminController::class, 'saveLogin']);

Route::get('/forgotPassword', [AdminController::class, 'forgotPassword']);
Route::post('/saveForgot', [AdminController::class, 'saveForgot']);

Route::get('/recoverPassword', [AdminController::class, 'recoverPassword']);
Route::post('/saveRecover', [AdminController::class, 'saveRecover']);

Route::get('/register', [AdminController::class, 'register']);
Route::post('/saveRegister', [AdminController::class, 'saveRegister']);

Route::any('/logout', [AdminController::class, 'logout']);

Route::get('/adminData', [AdminController::class, 'adminData']);
Route::get('/deleteAdmin/{id}', [AdminController::class, 'deleteAdmin']);


Route::get('/viewFeedback', [AdminController::class, 'feedback']);
Route::get('/deleteFeedback/{id}', [AdminController::class, 'deleteFeedback']);

Route::get('/viewRating', [AdminController::class, 'rating']);
Route::get('/deleteRating/{id}', [AdminController::class, 'deleteRating']);

Route::post('/ajax-saveChart', [AdminController::class, 'chart']);

//----------------------------------------------------------------------------

Route::get('/userRegister', [UserController::class, 'index']);
Route::post('/saveUserRegister', [UserController::class, 'store']);

Route::get('/login', [UserController::class, 'login']);
Route::post('/saveUserLogin', [UserController::class, 'saveLogin']);

Route::get('/email', [UserController::class, 'email']);

Route::get('/otp', [UserController::class, 'otp']);
Route::post('/saveOTP', [UserController::class, 'saveOTP']);

Route::get('/userForgotPassword', [UserController::class, 'forgotPassword']);
Route::post('/saveUserForgot', [UserController::class, 'saveUserForgot']);

Route::get('/userRevcoverPassword', [UserController::class, 'recoverPassword']);
Route::post('/saveUserRecover', [UserController::class, 'saveUserRecover']);

Route::any('/userLogout', [UserController::class, 'logout']);

Route::get('/viewCustomer', [UserController::class, 'customer']);
Route::get('/deleteCustomer/{id}', [UserController::class, 'deleteCustomer']);

Route::post('/updateAccount', [UserController::class, 'updateAccount']);
Route::post('/updateProfile', [UserController::class, 'updateProfile']);
Route::post('/updateAddress', [UserController::class, 'updateAddress']);
Route::post('/updatePassword', [UserController::class, 'updatePassword']);

//----------------------------------------------------------------------------


Route::get('/category', [CategoryController::class, 'viewCategory']);
Route::post('/saveCategory', [CategoryController::class, 'saveCategory']);

Route::get('/category', [CategoryController::class, 'displayCategory']);

Route::post('/viewUpdateCategory', [CategoryController::class, 'viewUpdateCategory']);
Route::post('/updateCategory', [CategoryController::class, 'updateCategory']);

Route::post('/deleteCategory', [CategoryController::class, 'deleteCategory']);


//----------------------------------------------------------------------------


Route::get('/subCategory', [SubCategoryController::class, 'viewSubCategory']);
Route::post('/saveSubCategory', [SubCategoryController::class, 'saveSubCategory']);

Route::get('/subCategory', [SubCategoryController::class, 'displaySubCategory']);

Route::post('/viewUpdateSubCategory', [SubCategoryController::class, 'viewUpdateSubCategory']);
Route::post('/updateSubCategory', [SubCategoryController::class, 'updateSubCategory']);

Route::post('/deleteSubCategory', [SubCategoryController::class, 'deleteSubCategory']);


//----------------------------------------------------------------------------


Route::get('/brand', [BrandController::class, 'viewBrand']);
Route::post('/saveBrand', [BrandController::class, 'saveBrand']);

Route::get('/brand', [BrandController::class, 'displayBrand']);

Route::post('/viewUpdateBrand', [BrandController::class, 'viewUpdateBrand']);
Route::post('/updateBrand', [BrandController::class, 'updateBrand']);

Route::post('/deleteBrand', [BrandController::class, 'deleteBrand']);


//----------------------------------------------------------------------------


Route::get('/product', [ProductController::class, 'index']);
Route::post('/saveProduct', [ProductController::class, 'store']);

Route::get('/product', [ProductController::class, 'get_data']);

Route::get('/productRecord', [ProductController::class, 'productRecord']);
Route::get('/productRecord', [ProductController::class, 'productData']);

Route::post('/loadData', [ProductController::class, 'loadData']);
Route::post('/getDataCat', [ProductController::class, 'getDataCat']);

Route::post('/delete', [ProductController::class, 'destroy']);

Route::post('/viewUpdate', [ProductController::class, 'view']);
Route::post('/update', [ProductController::class, 'update']);

Route::post('/multipleDelete', [ProductController::class, 'multipleDelete']);

//----------------------------------------------------------------------------

Route::get('/city', [CityController::class, 'index']);
Route::post('/saveCity', [CityController::class, 'store']);

Route::post('/loadDataCity', [CityController::class, 'loadDataCity']);
Route::get('/display', [CityController::class, 'cityRecord']);

Route::post('/deleteCity', [CityController::class, 'destroy']);

Route::post('/viewUpdateCity', [CityController::class, 'viewUpdateCity']);
Route::post('/updateCity', [CityController::class, 'updateCity']);

//----------------------------------------------------------------------------

Route::get('/payType', [PayTypeController::class, 'index']);
Route::post('/savePayType', [PayTypeController::class, 'store']);

Route::post('/loadDataPayType', [PayTypeController::class, 'loadDataPayType']);
Route::get('/displayPayType', [PayTypeController::class, 'payTypeRecord']);

Route::post('/deletePayType', [PayTypeController::class, 'destroy']);

Route::post('/viewUpdatePayType', [PayTypeController::class, 'viewUpdatePayType']);
Route::post('/updatePayType', [PayTypeController::class, 'updatePayType']);

//----------------------------------------------------------------------------

Route::get('/feedback', [FeedbackController::class, 'index']);
Route::post('/saveFeedback', [FeedbackController::class, 'store']);

//----------------------------------------------------------------------------

Route::get('/', [ViewController::class, 'index']);

Route::get('/brandPage/{b_id}', [ViewController::class, 'brandPage']);
Route::get('/allBrand', [ViewController::class, 'allBrand']);

Route::get('/categoryPage/{c_id}', [ViewController::class, 'categoryPage']);
Route::get('/allCategory', [ViewController::class, 'allCategory']);

Route::get('/contact', [ViewController::class, 'contact']);
Route::get('/about', [ViewController::class, 'about']);
Route::get('/singleProduct', [ViewController::class, 'singleProduct']);

Route::post('/saveReview', [ViewController::class, 'saveReview']);

Route::get('/cart', [ViewController::class, 'cart']);
Route::post('/saveCart', [ViewController::class, 'saveCart']);
Route::get('/deleteCart/{id}', [ViewController::class, 'deleteCart']);

Route::post('/updateCart', [ViewController::class, 'updateCart']);
Route::post('/saveUpdateCart', [ViewController::class, 'saveUpdateCart']);

Route::get('/wish', [ViewController::class, 'wish']);
Route::post('/saveWish', [ViewController::class, 'saveWish']);
Route::get('/deleteWish/{id}', [ViewController::class, 'deleteWish']);
Route::get('/addWishCart/{id}', [ViewController::class, 'addWishCart']);

Route::get('/checkout/{qty}/{pro}', [ViewController::class, 'checkout']);
Route::post('/allCheckoutData', [ViewController::class, 'allCheckoutData']);

Route::post('/search', [ViewController::class, 'search'])->name("search_product");

//-------------------------------------------------------------------------------------------------------

Route::get('/order', [OrderController::class, 'index']);
Route::get('/myOrder', [OrderController::class, 'show']);

Route::get('/deleteOrder/{id}', [OrderController::class, 'deleteOrder']);
Route::post('/returnOrder', [OrderController::class, 'return']);
Route::post('/cancelOrder', [OrderController::class, 'cancel']);

Route::get('/profile', [OrderController::class, 'profile']);

Route::get('/orderReceived', [OrderController::class, 'orderReceived']);
Route::get('/orderReturned', [OrderController::class, 'orderReturned']);
Route::get('/orderCanceled', [OrderController::class, 'orderCanceled']);
Route::get('/orderDelivered', [OrderController::class, 'orderDelivered']);

Route::post('/loadReceived', [OrderController::class, 'loadReceived']);
Route::post('/loadDelivered', [OrderController::class, 'loadDelivered']);
Route::post('/loadCanceled', [OrderController::class, 'loadCanceled']);
Route::post('/loadReturned', [OrderController::class, 'loadReturned']);


Route::get('/delever/{id}', [OrderController::class, 'delever']);

Route::get('/invoice', [OrderController::class, 'invoice']);

//---------------------------------------PaymentController-------------------------------------------

Route::post('payment', [PaymentController::class, 'payment'])->name('payment');

//------------------------------------ReportController------------------------------------------------------

Route::get('/productStock/{name}', [ReportController::class, 'product_stock']);
Route::get('/productStockDownload', [ReportController::class, 'product_stock_download']);

Route::get('/orderRegion/{name}', [ReportController::class, 'order_region']);
Route::get('/orderRegionDownload', [ReportController::class, 'order_region_download']);

Route::get('/orderStatus/{name}', [ReportController::class, 'order_status']);
Route::get('/orderStatusDownload', [ReportController::class, 'order_status_download']);

Route::get('/orderReport', [ReportController::class, 'order_report']);
Route::get('/orderReportDownload', [ReportController::class, 'order_report_download']);

Route::get('/productReport', [ReportController::class, 'product_report']);
Route::get('/productReportDownload', [ReportController::class, 'product_report_download']);

Route::get('/brandReport', [ReportController::class, 'brand_report']);
Route::get('/brandReportDownload', [ReportController::class, 'brand_report_download']);

Route::get('/userReport', [ReportController::class, 'user_report']);
Route::get('/userReportDownload', [ReportController::class, 'user_report_download']);

