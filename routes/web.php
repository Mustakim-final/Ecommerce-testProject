<?php

use App\Http\Controllers\BrandController;
use App\Http\Controllers\BrandsProductController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\CategoriController;
use App\Http\Controllers\CheckOutController;
use App\Http\Controllers\DeliveryManController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\MainController;
use App\Http\Controllers\ManufactureController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\SliderController;
use App\Http\Controllers\TestController;
use App\Models\BrandsProduct;
use App\Models\Product;
use Illuminate\Support\Facades\Route;

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

// Route::get('/', function () {
//     return view('welcome');
// });


Route::get('/',[TestController::class,'homepage']);
Route::get('/uniqcategory/{id}',[TestController::class,'categoryBY'])->name('categoryby.page');
Route::get('/uniqmanufacture/{id}',[TestController::class,'manufactureBy'])->name('manufactureby.page');
Route::get('/product/view/{id}',[TestController::class,'productview'])->name('product.view');

//brandview
Route::get('/brand/view/{id}',[BrandsProductController::class,'brandview'])->name('brand.view');  
//search

Route::get('/search',[CartController::class,'search'])->name('search.route');



//brands
Route::get('/uniqebrands/{id}',[BrandsProductController::class,'brandby'])->name('brandby.page');


//cart
Route::post('/addchart/page/{id}',[MainController::class,'chart'])->name('addchart');
Route::get('addchar/newpage',[MainController::class,'newchart'])->name('chart.new');
Route::get('cart/delete/{id}',[MainController::class,'delete'])->name('cart.delete');
Route::get('cart/addupdate/{id}',[MainController::class,'addupdate'])->name('cart.add');

//chekout

Route::get('/cart/checkout',[CheckOutController::class,'checkpage'])->name('chekout.form');
Route::post('cart/order',[CheckOutController::class,'ordernow'])->name('chekoutsub');
Route::get('/cart/payment',[CheckOutController::class,'paymentpage'])->name('checkout.pyment');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/home/admin',[HomeController::class,'adminpage'])->name('admin.page')->middleware('isAdmin');


//category

Route::get('/category',[CategoriController::class,'addcategory'])->name('adcategory.page');
Route::post('/category/insert',[CategoriController::class,'insert'])->name('cinsert');
Route::get('/cetegory/show',[CategoriController::class,'index'])->name('show.category');
Route::get('/cetegory/unactive/{id}',[CategoriController::class,'unactive'])->name('unactive.cetegory');
Route::get('/cetegory/active/{id}',[CategoriController::class,'active'])->name('active.cetegory');
Route::get('/category/updatepage/{id}',[CategoriController::class,'updatePage'])->name('update.page');
Route::post('/category/update/{id}',[CategoriController::class,'updatedata'])->name('update.data');
Route::get('/category/delete/{id}',[CategoriController::class,'delete'])->name('category.delete');


//menufacture

Route::get('/manufacture',[ManufactureController::class,'addmanufacture'])->name('manufacture.page');
Route::post('/manufacture/insert',[ManufactureController::class,'insert'])->name('minsert');
Route::get('/manufacture/show',[ManufactureController::class,'index'])->name('show.manufacture');
Route::get('/manufacture/unactive/{id}',[ManufactureController::class,'unactive'])->name('unactive.manufacture');
Route::get('/manufacture/active/{id}',[ManufactureController::class,'active'])->name('active.manufacture');
Route::get('/manufacture/updatepage/{id}',[ManufactureController::class,'updatePage'])->name('update.manufacture_page');
Route::post('/manufacture/update/{id}',[ManufactureController::class,'updatedata'])->name('update.manufacture');
Route::get('/manufacture/delete/{id}',[ManufactureController::class,'delete'])->name('manufacture.delete');


//products
Route::get('/product/add',[ProductController::class,'addpage'])->name('product.add');
Route::post('/product/upload',[ProductController::class,'upload'])->name('product.upload');
Route::get('/product/show',[ProductController::class,'showData'])->name('product.show');
Route::get('/product/unactive/{id}',[ProductController::class,'unactive'])->name('product.unactive');
Route::get('/product/active/{id}',[ProductController::class,'active'])->name('product.active');
Route::get('/product/delete/{id}',[ProductController::class,'delete'])->name('product.delete');
Route::get('/product/update/page/{id}',[ProductController::class,'updatePage'])->name('product.updatepage');

//Slider

Route::get('/slider/addpage',[SliderController::class,'sliderpage'])->name('slider.page');
Route::post('/slider/insert',[SliderController::class,'slideradd'])->name('slider.add');
Route::get('/slider/show',[SliderController::class,'slidershow'])->name('slider.show');
Route::get('/slider/unactive/{id}',[SliderController::class,'unactive'])->name('slider.unactive');
Route::get('/slider/active/{id}',[SliderController::class,'active'])->name('slider.active');
Route::get('/slider/delete/{id}',[SliderController::class,'delete'])->name('slider.delete');


//brands

Route::get('/brand/page',[BrandController::class,'brandpage'])->name('brand.page');
Route::post('/brand/post',[BrandController::class,'addbrand'])->name('brand.add');
Route::get('/brand/show',[BrandController::class,'showbrand'])->name('barnd.show');
Route::get('/brand/unactive/{id}',[BrandController::class,'unactive'])->name('unactive.brand');
Route::get('/brand/active/{id}',[BrandController::class,'active'])->name('active.brand');
Route::get('/brand/delete/{id}',[BrandController::class,'delete'])->name('brand.delete');

//brand product
Route::get('/brand/product/page',[BrandController::class,'brandproduct'])->name('brandproduct.page');
Route::post('/brand/postproduct',[BrandController::class,'addproduct'])->name('brandproduct.add');

Route::get('/brand/postproduct/show',[BrandController::class,'showbrandproudct'])->name('brandproduct.show');
Route::get('/brand/postunactive/{id}',[BrandController::class,'unactiveproduct'])->name('unactive.productbrand');
Route::get('/brand/postactive/{id}',[BrandController::class,'activeproduct'])->name('active.productbrand');
Route::get('/brand/postdelete/{id}',[BrandController::class,'deletepost'])->name('brandsproduct.delete');


//delivery man


Route::get('/deliveryman/add',[DeliveryManController::class,'addman'])->name('deliveryman.add');
Route::post('deliveryman/form/',[DeliveryManController::class,'addmandata'])->name('deliveryman.insert');
Route::get('/deliveryman/show',[DeliveryManController::class,'showman'])->name('deliveryman.show');
Route::get('/deliveryman/unactive/{id}',[DeliveryManController::class,'unactive'])->name('unactive.man');
Route::get('/deliveryman/active/{id}',[DeliveryManController::class,'active'])->name('active.man');
Route::get('/deliveryman/delete/{id}',[DeliveryManController::class,'delete'])->name('man.delete');
