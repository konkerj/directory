<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

use SilverStripe\ORM\DataExtension;

class GalleryImageExtension extends DataExtension
{
    private static $has_one = [
        'Playground' => Playground::class,
        'Product' => Product::class,
    ];
}

