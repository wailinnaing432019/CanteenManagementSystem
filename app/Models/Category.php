<?php

namespace App\Models;

use App\Models\Employee;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Category extends Model
{
    use HasFactory;
    protected $fillable=[
        'name',
        'description',
        'employee_id',
        'status',
    ];
/**
     * Get the user that owns the Menu
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function categoryCreateUser()
    {
        return $this->belongsTo(Employee::class, 'employee_id', 'id');
    }

        /**
         * Get all of the comments for the Category
         *
         * @return \Illuminate\Database\Eloquent\Relations\HasMany
         */
        public function menus()
        {
            return $this->hasMany(Menu::class, 'category_id', 'id');
        }

        /**
         * The roles that belong to the Category
         *
         * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
         */
        // public function menus()
        // {
        //     return $this->belongsToMany(Menu::class, 'category_id', 'id');
        // }

}