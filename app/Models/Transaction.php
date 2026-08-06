<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\TransactionItem;

class Transaction extends Model
{
    use HasFactory;

    protected $fillable = [
    'user_id',
    'invoice',
    'customer_name',
    'customer_phone',
    'customer_email',
    'table_number',
    'total',
    'payment_method',
    'status',
];

    public function items()
    {
        return $this->hasMany(TransactionItem::class, 'transaction_id');
    }
}