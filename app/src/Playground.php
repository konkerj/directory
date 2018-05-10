<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
use SilverStripe\ORM\DataObject;
use SilverStripe\Forms\FieldList;
use SilverStripe\Forms\TextField;
use SilverStripe\Forms\TextareaField;
use SilverStripe\Forms\DropdownField;
use SilverStripe\AssetAdmin\Forms\UploadField;
use SilverStripe\Assets\Image;
use SilverStripe\Forms\TabSet;

use SilverStripe\Versioned\Versioned;

class Playground extends DataObject
{
    private static $db = [
        'Name' => 'Varchar',
        'Description' => 'Text'
    ];
    
    private static $has_one = [
        'PrimaryPhoto' => Image::class,
    ];
    
    private static $has_many =[
        'GalleryPhotos' => Image::class,
    ];
    
    private static $owns = [
        'PrimaryPhoto',
        'GalleryPhotos',
    ];
    
    private static $extensions = [
        Versioned::class,
    ];
    
    private static $searchable_fields=[
        'Name','Suburb','City'
    ];
    
    private static $summary_fields = [
        'PrimaryPhoto.CMSThumbnail' => '',
        'Name' => 'Name',
        'Suburb' => 'Suburb',
        'City' => 'City',
    ];
    
    public function getCMSFields() {
        $fields = FieldList::create(TabSet::create('Root'));
        $fields->addFieldsToTab('Root.Main', [
            TextField::create('Name'),
            TextareaField::create('Description'),
        ]);
        
        $fields->addFieldToTab('Root.Photos', 
                $uploader = UploadField::create('PrimaryPhoto',
                        'Primary Photo'));
        
        $uploader->setFolderName('playground-photos');
        $uploader->setAllowedExtensions(['jpg','jpeg','png','gif']);
        
        $fields->addFieldToTab('Root.Photos', 
                $uploader1 = UploadField::create('GalleryPhotos',
                        'Gallery Photos'));
        
        $uploader1->setFolderName('playground-photos');
        $uploader1->setAllowedExtensions(['jpg','jpeg','png','gif']);
        
        $this->extend('updateCMSFields', $fields);
        
        return $fields;
    }
}