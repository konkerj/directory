<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
use SilverStripe\Admin\ModelAdmin;

class ProductAdmin extends ModelAdmin
{
    private static $menu_title = 'Products';
    
    private static $url_segment = 'products';
    
    private static $managed_models = [
        Product::class,
    ];
}
