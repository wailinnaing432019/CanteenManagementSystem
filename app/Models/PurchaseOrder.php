<?php

namespace App\Models;

use App\Models\Employee;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class PurchaseOrder extends Model
{
    use HasFactory;
    protected $fillable=[
        'employee_id',
        'product_name',
        'quantity',
        'price_perunit',
        'total_price',
        'small_description',
        'status',
    ];

/**
 * Get the user that owns the PurchaseOrder
 *
 * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
 */
public function user()
{
    return $this->belongsTo(Employee::class, 'employee_id', 'id');
}
}
