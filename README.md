## Got tired of editing module templates on every update? 
This module lets you override templates and tempalte blocks from modules with templates from your theme directory.  
So, **as theme designer**, you can provide adopted module tempaltes for your theme,   
or as **shop owner / developer** you can keep original module templates for easy updates and store your own modified templates in theme directory

# how it works:
lets assume your active theme is "custom-flow",  
so it's templates directory is ``application/views/custom-flow/tpl/``

## template blocks
module directory: ``modules/bla/bla-tprice/``  
module metadata.php:
````php
'blocks' => array(
   array(
      'template' => 'page/details/inc/productmain.tpl',
      'block'    => 'details_productmain_tprice',
      'file'     => '/application/views/blocks/details_productmain_tprice.tpl'
   ),
)
````
oxid expects this path for block file:  
````modules/bla/bla-tprice/application/views/blocks/details_productmain_tprice.tpl````  
with this module oxid will look inside your theme's templates folder for this file:  
**theme templates directory** + **module directory** + **template path**  
````application/views/custom-flow/tpl/modules/bla/bla-tprice/application/views/blocks/details_productmain_tprice.tpl````  
you can simply copy the tempaltes folder from module directory and place it exactly  the same path under theme templates directory:

## registered module templates:
module directory: ``modules/d3/d3heidelpay/``  
module metadata.php:
````php
'templates' => array(
   'd3_d3heidelpay_views_flow_tpl_payment_paypal.tpl' => 'd3/d3heidelpay/views/flow/tpl/payment/paypal.tpl'
)
````
in this case, simply use the name of the registered template and not it's actual path for your custom template:
````application/views/custom-flow/tpl/modules/d3_d3heidelpay_views_flow_tpl_payment_paypal.tpl````

## unregisteres module tempaltes (e.g. in a template block):
module directory: ``modules/d3/bla-vskfreiab/``  
smarty code:  
````php
[{include file=$oViewConf->getModulePath('bla-vskfreiab','/application/views/minibasket.tpl')}]
````  
this works just like a regular template block file, the file path is:   
**theme templates directory** + **module directory** + **template path**   
````application/views/custom-flow/tpl/modules/bla/bla-vskfreiab/application/views/minibasket.tpl````  
