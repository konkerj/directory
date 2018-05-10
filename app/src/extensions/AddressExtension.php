<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
use SilverStripe\ORM\DataExtension;
use SilverStripe\Forms\TabSet;
use SilverStripe\Forms\FieldList;
use SilverStripe\Forms\TextField;

class AddressExtension extends DataExtension
{
    private static $db = [
      'StreetAddress' => 'Varchar',
      'Suburb' => 'Varchar',
      'City' => 'Varchar',
      'PostCode' => 'Varchar',
      'Latitude' => 'Varchar',
    ];
    
    public function updateCMSFields(FieldList $fields){
        $fields->addFieldsToTab('Root.Address', [
            TextField::create('StreetAddress'),
            TextField::create('Suburb'),
            TextField::create('City'),
            TextField::create('PostCode'),
        ]);
    }
}

