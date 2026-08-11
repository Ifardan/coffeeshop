<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class WebsiteSetting extends Model
{
    protected $fillable = [

        // ABOUT
        'about_title',
        'about_description',
        'about_image',
        
        // CONTACT
        'contact_address',
        'contact_phone',
        'contact_email',

        // HOME HERO
        'hero_title',
        'hero_subtitle',

        // MENU FAVORIT
        'favorite_title',

        'favorite_col1_title',
        'favorite_col1_items',

        'favorite_col2_title',
        'favorite_col2_items',

        'favorite_col3_title',
        'favorite_col3_items',

    ];
}