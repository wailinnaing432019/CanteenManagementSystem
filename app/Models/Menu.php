<?php

namespace App\Models;

use App\Models\Like;
use App\Models\User;
use App\Models\Comment;
use App\Models\Employee;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Menu extends Model
{
    use HasFactory;
    protected $fillable=[
        'name',
        'price',
        'waiting_time',
        'description',
        'category_id',
        'employee_id',
        'status',
        'qty',
        'stock_alert',
        'count',
        'discount'
    ];

    /**
     * Get all of the comments for the Menu
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function menuImages()
    {
        return $this->hasMany(MenuImage::class, 'menu_id', 'id');
    }

    /**
     * Get the user that owns the Menu
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function MenuCreateUser()
    {
        return $this->belongsTo(Employee::class, 'employee_id', 'id');
    }

    /**
     * Get the user that owns the Menu
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id', 'id');
    }

    /**
     * Get the user that owns the Menu
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function like()
    {
        return $this->belongsTo(Like::class);
    }

    /**
     * Get the comments that owns the Menu
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function comments()
    {
        return $this->belongsTo(Comment::class);
    }
}
