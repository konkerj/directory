<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

use SilverStripe\Admin\ModelAdmin;

class PlaygroundAdmin extends ModelAdmin
{
    private static $menu_title = 'Playgrounds';
    
    private static $url_segment = 'playgrounds';
    
    private static $managed_models = [
        Playground::class,
    ];
}
