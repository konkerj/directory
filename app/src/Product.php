<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
use SilverStripe\ORM\DataObject;
use SilverStripe\Assets\Image;
use SilverStripe\Forms\TabSet;
use SilverStripe\Forms\FieldList;
use SilverStripe\Forms\TextField;
use SilverStripe\Forms\HTMLEditor\HTMLEditorField;

use SilverStripe\AssetAdmin\Forms\UploadField;

class Product extends DataObject
{
    private static $db = [
        'Name' => 'Varchar',
        'Description' => 'HTMLText',
    ];
    
    private static $has_one = [
        'PrimaryPhoto' => Image::class,
    ];
    
    private static $has_many = [
        'GalleryPhotos' => Image::class,
    ];
    
    private static $owns = [
        'PrimaryPhoto',
        'GalleryPhotos',
    ];
    
    private static $searchable_fields = [
        'Name','Description'
    ];
    
    private static $summary_fields = [
        'PrimaryPhoto.CMSThumbnail' => '',
        'Name' => 'Name',
        'Description.FirstParagraph' => 'Description'
    ];
    
    public function getCMSFields() {
        $fields = FieldList::create(TabSet::create('Root'));
        $fields->addFieldsToTab('Root.Main', [
        TextField::create('Name'),
        HTMLEditorField::create('Description'),
        ]);
        
        $fields->addFieldsToTab('Root.Photos', [
           $uploader = UploadField::create('PrimaryPhoto','Primary Photo'),
           $uploader1 = UploadField::create('GalleryPhotos','Gallery Photos')
        ]);
        
        $uploader->setFolderName('product-photos');
        $uploader->setAllowedExtensions(['jpeg','jpg','gif','png']);
        
        $uploader1->setFolderName('product-photos');
        $uploader1->setAllowedExtensions(['jpeg','jpg','gif','png']);
        
        $this->extend('updateCMSFields', $fields);
        
        return $fields;
    }
}
