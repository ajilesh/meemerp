<!DOCTYPE html>
<html lang="en">
<head>
  <title>Bootstrap Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>
{{-- <head>
    <title>Landing</title>
</head> --}}
{{-- @extends('layouts.app') --}}
{{-- <div class="container">
    <div class="col-lg-3">addhs</div>
    <div class="col-lg-3"></div>
    <div class="col-lg-3"></div>
    <div class="col-lg-3"></div>
</div> --}}

<div class="container">
    
    <div class="row">
        <!-- Product -->
        <?php
        if (auth()->user()->can('product.view') || auth()->user()->can('product.create') ||
                auth()->user()->can('brand.view') || auth()->user()->can('unit.view') ||
                auth()->user()->can('category.view') || auth()->user()->can('brand.create') ||
                auth()->user()->can('unit.create') || auth()->user()->can('category.create')) {
        ?>
        <div class="col-lg-3 col-md-3">
            <div class="card">
                <div class="face front-face">
                    <img src="{{ asset('img/product.png') }}" style="width:100px; height:100px"
                        alt="" class="profile">
                    <div class="pt-3 text-uppercase name">
                        PRODUCTS
                    </div>
                    {{-- <div class="designation">Android Developer</div> --}}
                </div>
                <div class="face back-face">
                    <span class="fas fa-quote-left"></span>
                    <div class="testimonial">
                       <?php if (auth()->user()->can('product.view')) {
                        echo "<a href='".url(action('ProductController@index'))."'>".strtoupper(__('lang_v1.list_products'))."</a><br>";    
                        } ?>
                        <?php if (auth()->user()->can('product.create')) {
                            echo "<a href='".url(action('ProductController@create'))."'>".strtoupper(__('product.add_product'))."</a><br>";    
                            } ?>
                            <?php if (auth()->user()->can('product.create')) {
                                echo "<a href='".url(action('VariationTemplateController@index'))."'>".strtoupper(__('product.variations'))."</a><br>";    
                                } ?>
                        <?php if (auth()->user()->can('product.view')) {
                            echo "<a href='".url(action('LabelsController@show'))."'>".strtoupper(__('barcode.print_labels'))."</a><br>";    
                            } ?>
                        <?php if (auth()->user()->can('product.opening_stock')) {
                                echo "<a href='".url(action('ImportOpeningStockController@index'))."'>".strtoupper(__('lang_v1.import_opening_stock'))."</a><br>";    
                                } ?>
                        <?php if (auth()->user()->can('product.create')) {
                                    echo "<a href='".url(action('SellingPriceGroupController@index'))."'>".strtoupper(__('lang_v1.selling_price_group'))."</a><br>";    
                                    } ?>
                        <?php if (auth()->user()->can('unit.view')) {
                            echo "<a href='".url(action('UnitController@index'))."'>".strtoupper(__('unit.units'))."</a><br>";    
                            } ?> 
                        <?php if (auth()->user()->can('category.view')) {
                            echo "<a href='".url(
                                action('TaxonomyController@index'))."'>".strtoupper(__('category.categories'))."</a><br>";    
                            } ?>                
                    </div>
                    <span class="fas fa-quote-right"></span>
                </div>
            </div>
        </div>
        <?php } if (auth()->user()->can('supplier.view') || auth()->user()->can('customer.view')) {?>
        <!-- Contact -->
            <div class="col-lg-3 col-md-3">
            <div class="card">
                <div class="face front-face">
                    <img src="{{ asset('img/contact.png') }}" style="width:100px; height:100px"
                        alt="" class="profile">
                    <div class="pt-3 text-uppercase name">
                        CONTACTS
                    </div>
                    {{-- <div class="designation">Full Stack Developer</div> --}}
                </div>
                <div class="face back-face">
                    <span class="fas fa-quote-left"></span>
                    <div class="testimonial">
                        <?php if (auth()->user()->can('supplier.view')) {
                            echo "<a href='".url(action('ContactController@index', ['type' => 'supplier']))."'>".strtoupper(__('report.supplier'))."</a><br>";    
                            } ?>
                            <?php if (auth()->user()->can('customer.view')) {
                                echo "<a href='".url(action('ContactController@index', ['type' => 'customer']))."'>".strtoupper(__('report.customer'))."</a><br>";    
                                echo "<a href='".url(action('CustomerGroupController@index'))."'>".strtoupper(__('lang_v1.customer_groups'))."</a><br>";
                                } ?>
                                <?php if (auth()->user()->can('supplier.create')) {
                                    echo "<a href='".url(action('ContactController@getImportContacts'))."'>".strtoupper(__('lang_v1.import_contacts'))."</a><br>";    
                                    } ?>
                            
                    </div>
                    <span class="fas fa-quote-right"></span>
                </div>
            </div>
        </div>
        <!-- Purchase -->
        <?php } if (auth()->user()->can('purchase.view') || auth()->user()->can('purchase.create') || auth()->user()->can('purchase.update')) {?>
        <div class="col-lg-3 col-md-3">
            <div class="card">
                <div class="face front-face">
                    <img src="{{ asset('img/purchase.png') }}" style="width:100px; height:100px"
                        alt="" class="profile">
                    <div class="pt-3 text-uppercase name">
                        PURCHASES
                    </div>
                    {{-- <div class="designation">Finance Director</div> --}}
                </div>
                <div class="face back-face">
                    <span class="fas fa-quote-left"></span>
                    <div class="testimonial">
                        <?php if (auth()->user()->can('purchase.view')) {
                            echo "<a href='".url(
                                action('PurchaseController@index'))."'>".strtoupper(__('purchase.list_purchase'))."</a><br>";    
                            } ?>
                            <?php if (auth()->user()->can('purchase.create')) {
                                echo "<a href='".url(
                                action('PurchaseController@create'))."'>".strtoupper(__('purchase.add_purchase'))."</a><br>";    
                                echo "<a href='".url(action('CustomerGroupController@index'))."'>".strtoupper(__('lang_v1.customer_groups'))."</a><br>";
                                } ?>
                                <?php if (auth()->user()->can('purchase.update')) {
                                    echo "<a href='".url(
                                action('PurchaseReturnController@index'))."'>".strtoupper(__('lang_v1.list_purchase_return'))."</a><br>";    
                                    } ?>
                    </div>
                    <span class="fas fa-quote-right"></span>
                </div>
            </div>
        </div>
        <?php } if (auth()->user()->can('sell.view') || auth()->user()->can('sell.create') || auth()->user()->can('direct_sell.access') ||  auth()->user()->can('view_own_sell_only')) {?>
        <!-- Sells -->
        <div class="col-lg-3 col-md-3">
            <div class="card">
                <div class="face front-face">
                    <img src="{{ asset('img/sales.png') }}" style="width:100px; height:100px"
                        alt="" class="profile">
                    <div class="pt-3 text-uppercase name">
                        SELLS
                    </div>
                    {{-- <div class="designation">Finance Director</div> --}}
                </div>
                <div class="face back-face">
                    <span class="fas fa-quote-left"></span>
                    <div class="testimonial">
                        <?php if (auth()->user()->can('direct_sell.access')) {
                            echo "<a href='".url(
                                action('SellController@index'))."'>".strtoupper(__('lang_v1.all_sales'))."</a><br>";    
                            } ?>
                            <?php if (auth()->user()->can('direct_sell.access')) {
                                echo "<a href='".url(
                                action('SellController@create'))."'>".strtoupper(__('sale.add_sale'))."</a><br>";    
                                echo "<a href='".url(action('CustomerGroupController@index'))."'>".strtoupper(__('lang_v1.customer_groups'))."</a><br>";
                                } ?>
                                <?php if (auth()->user()->can('sell.view')) {
                                    echo "<a href='".url(
                                action('SellPosController@index'))."'>".strtoupper(__('sale.list_pos'))."</a><br>";    
                                    } ?>
                                <?php if (auth()->user()->can('sell.create')) {
                                    echo "<a href='".url(
                                action('SellPosController@create'))."'>".strtoupper(__('sale.pos_sale'))."</a><br>";
                                echo "<a href='".url(
                                action('SellController@getDrafts'))."'>".strtoupper(__('lang_v1.list_drafts'))."</a><br>";
                                echo "<a href='".url(
                                action('SellController@getQuotations'))."'>".strtoupper(__('lang_v1.list_quotations'))."</a><br>";    
                                    } ?>
                                <?php if (auth()->user()->can('sell.view')) {
                                    echo "<a href='".url(
                                action('SellReturnController@index'))."'>".strtoupper(__('lang_v1.list_sell_return'))."</a><br>";    
                                    } ?>
                                                    
                    </div>
                    <span class="fas fa-quote-right"></span>
                </div>
            </div>
        </div>
        <?php }?>
    </div>
    
</div>

<div class="container">
    <div class="row">
        <!-- stock transfer -->
        <?php if (auth()->user()->can('purchase.view') || auth()->user()->can('purchase.create')) { ?>
        <div class="col-lg-3 col-md-3">
            <div class="card">
                <div class="face front-face">
                    <img src="{{ asset('img/stock_transfer.png') }}" style="width:100px; height:100px"
                        alt="" class="profile">
                    <div class="pt-3 text-uppercase name">
                        STOCK TRANSFERS
                    </div>
                    {{-- <div class="designation">Android Developer</div> --}}
                </div>
                <div class="face back-face">
                    <span class="fas fa-quote-left"></span>
                    <div class="testimonial">
                        <?php if (auth()->user()->can('purchase.view')) {
                            echo "<a href='".url(
                                action('StockTransferController@index'))."'>".strtoupper(__('lang_v1.list_stock_transfers'))."</a><br>";    
                            } ?>
                            <?php if (auth()->user()->can('purchase.create')) {
                                echo "<a href='".url(
                                action('StockTransferController@create'))."'>".strtoupper(__('lang_v1.add_stock_transfer'))."</a><br>";    
                                } ?>
                                
                    </div>
                    <span class="fas fa-quote-right"></span>
                </div>
            </div>
        </div>
        <?php } if (auth()->user()->can('purchase.view') || auth()->user()->can('purchase.create')) {?>
            <!-- stock adjustment -->
        <div class="col-lg-3 col-md-3">
            <div class="card">
                <div class="face front-face">
                    <img src="{{ asset('img/adjustment.png') }}" style="width:100px; height:100px"
                        alt="" class="profile">
                    <div class="pt-3 text-uppercase name">
                        STOCK ADJUSTMENT
                    </div>
                    {{-- <div class="designation">Full Stack Developer</div> --}}
                </div>
                <div class="face back-face">
                    <span class="fas fa-quote-left"></span>
                    <div class="testimonial">
                        <?php if (auth()->user()->can('purchase.view')) {
                            echo "<a href='".url(
                                action('StockAdjustmentController@index'))."'>".strtoupper(__('stock_adjustment.list'))."</a><br>";    
                            } ?>
                            <?php if (auth()->user()->can('purchase.create')) {
                                echo "<a href='".url(
                                action('StockAdjustmentController@create'))."'>".strtoupper(__('stock_adjustment.add'))."</a><br>";    
                                } ?>
                    </div>
                    <span class="fas fa-quote-right"></span>
                </div>
            </div>
        </div>
        <?php } if (auth()->user()->can('expense.access')) {?>
        <!-- expenses -->
        <div class="col-lg-3 col-md-3">
            <div class="card">
                <div class="face front-face">
                    <img src="{{ asset('img/expence.png') }}" style="width:100px; height:100px"
                        alt="" class="profile">
                    <div class="pt-3 text-uppercase name">
                        EXPENSES
                    </div>
                    {{-- <div class="designation">Finance Director</div> --}}
                </div>
                <div class="face back-face">
                    <span class="fas fa-quote-left"></span>
                    <div class="testimonial">
                        <?php if (auth()->user()->can('expense.access')) {
                            echo "<a href='".url(
                            action('ExpenseController@index'))."'>".strtoupper(__('lang_v1.list_expenses'))."</a><br>";    
                            } ?>
                            <?php if (auth()->user()->can('expense.access')) {
                                echo "<a href='".url(
                            action('ExpenseController@create'))."'>".strtoupper(__('messages.add') .  __('expense.expenses'))."</a><br>";    
                                } ?>
                        <?php if (auth()->user()->can('expense.access')) {
                            echo "<a href='".url(
                            action('ExpenseCategoryController@index'))."'>".strtoupper(__('expense.expense_categories'))."</a><br>";    
                            } ?>        
                    </div>
                    <span class="fas fa-quote-right"></span>
                </div>
            </div>
        </div>
        <?php }if (auth()->user()->can('business_settings.access') ||
        auth()->user()->can('barcode_settings.access') ||
        auth()->user()->can('invoice_settings.access') ||
        auth()->user()->can('tax_rate.view') ||
        auth()->user()->can('tax_rate.create')) {?>
        <!-- settings -->
        <div class="col-lg-3 col-md-3">
            <div class="card">
                <div class="face front-face">
                    <img src="{{ asset('img/settings.png') }}" style="width:100px; height:100px"
                        alt="" class="profile">
                    <div class="pt-3 text-uppercase name">
                        SETTINGS
                    </div>
                    {{-- <div class="designation">Finance Director</div> --}}
                </div>
                <div class="face back-face">
                    <span class="fas fa-quote-left"></span>
                    <div class="testimonial">
                        <?php if (auth()->user()->can('business_settings.access')) {
                            echo "<a href='".url(
                                action('BusinessController@getBusinessSettings'))."'>".strtoupper(__('business.business_settings'))."</a><br>"; 
                                echo "<a href='".url(
                                action('BusinessLocationController@index'))."'>".strtoupper(__('business.business_locations'))."</a><br>";    
                            } ?>
                            <?php if (auth()->user()->can('invoice_settings.access')) {
                                echo "<a href='".url(
                                action('InvoiceSchemeController@index'))."'>".strtoupper(__('invoice.invoice_settings'))."</a><br>";    
                            } ?>
                            <?php if (auth()->user()->can('barcode_settings.access')) {
                                echo "<a href='".url(
                                action('BarcodeController@index'))."'>".strtoupper(__('barcode.barcode_settings'))."</a><br>";    
                            } ?>
                            <?php if (auth()->user()->can('tax_rate.view') || auth()->user()->can('tax_rate.create')) {
                                echo "<a href='".url(
                                action('TaxRateController@index'))."'>".strtoupper(__('tax_rate.tax_rates'))."</a><br>";    
                            } ?>
                            <?php if (in_array('tables', $enabled_modules) && auth()->user()->can('business_settings.create')) {
                                echo "<a href='".url(
                                action('Restaurant\TableController@index'))."'>".strtoupper(__('restaurant.tables'))."</a><br>";    
                            } ?>
                            <?php if (in_array('modifiers', $enabled_modules) && (auth()->user()->can('product.view') || auth()->user()->can('product.create'))) {
                                echo "<a href='".url(
                                action('Restaurant\ModifierSetsController@index'))."'>".strtoupper(__('restaurant.modifiers'))."</a><br>";    
                            } ?>
                            <?php if (in_array('types_of_service', $enabled_modules)) {
                                echo "<a href='".url(
                                action('TypesOfServiceController@index'))."'>".strtoupper(__('lang_v1.types_of_service'))."</a><br>";    
                            } ?>
                                
                    </div>
                    <span class="fas fa-quote-right"></span>
                </div>
            </div>
        </div>
        <?php }?>
    </div>
</div>
{{-- <div class="container">
    
</div> --}}

<style>
    /* Importing fonts from Google */
@import url('https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800;900&display=swap');

/* Reseting */
* {
margin: 0;
padding: 0;
box-sizing: border-box;
font-family: 'Poppins', sans-serif;
}

body {
background: linear-gradient(to bottom, #000428, #004683);
animation: background-color 20s;
min-height: 100vh;
}

@keyframes background-color {
0% {
    background: linear-gradient(to bottom, #000428, #004683);
}

25% {
    background: linear-gradient(135deg, #1a4223, #5ee95e);
}

50% {
    background: linear-gradient(to bottom, #421a31, #e95ed2);
}

100% {
    background: linear-gradient(-135deg, #fae37d, #881da8, #20668f);
}

}

.container {
margin-top: 30px;
}

.container .col-lg-4 {
display: flex;
justify-content: center;
}
.testimonial a{
    color:white !important;
}
.card {
width: 260px;
height: 210px;
transform-style: preserve-3d;
perspective: 500px;
border: none;
background-color: inherit;
}

.card .face {
position: absolute;
color: #fff;
width: 100%;
height: 100%;
overflow: hidden;
box-shadow: 0 15px 35px rgba(0, 0, 0, 0.1);
border-radius: 15px;
background: rgba(255, 255, 255, 0.06);
transform-style: preserve-3d;
transition: 0.5s;
backface-visibility: hidden;
border-top: 1px solid #ddd;
border-left: 1px solid #ddd;
/* border-right: 1px solid #999;
border-bottom: 1px solid #999; */
}

.card .face.front-face,
.card .face.back-face {
position: absolute;
display: flex;
flex-direction: column;
align-items: center;
justify-content: center;
}

.card .face.front-face .profile {
width: 150px;
height: 150px;
border-radius: 50%;
object-fit: cover;
}

.card .face.front-face .name {
margin-top:10px;
letter-spacing: 2px;
}

.card .face.front-face .designation {
font-size: 0.8rem;
color: #ddd;
letter-spacing: 0.8px;
}

.card:hover .face.front-face {
transform: rotateY(180deg);
}

.card .face.back-face {
position: absolute;
background: rgba(255, 255, 255, 0.06);
transform: rotateY(180deg);
padding: 20px 30px;
text-align: center;
user-select: none;
}

.card .face.back-face .fa-quote-left {
position: absolute;
top: 25px;
left: 25px;
font-size: 1.2rem;
}

.card .face.back-face .fa-quote-right {
position: absolute;
bottom: 35px;
right: 25px;
font-size: 1.2rem;
}

.card:hover .face.back-face {
transform: rotateY(360deg);
}
/* @media (max-width: 992px) 
{
    .card {
    width: 226px;
    height: 225px;
    }
} */
@media (max-width: 800px) 
{
    .card {
    width: 226px;
    height: 225px;
    }
}

@media(max-width: 991.5px) {
.col-lg-4 {
    margin-top: 40px;
    margin-bottom: 20px;
}
}
    </style>