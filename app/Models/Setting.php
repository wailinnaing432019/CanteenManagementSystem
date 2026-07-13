<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
    use HasFactory;
    protected $fillable=[
        'name',
        'email',
        'address',
        'phone',
        'about_us',
        'logo_image',
        'image_one',
        'image_two',
        'image_three',
        'facebook_link',
        'instagram_link',
        'telegram_link',
        'service_one',
        'service_two',
        'service_three',

    ];
}