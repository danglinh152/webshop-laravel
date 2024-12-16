<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model; // Import Model
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class Order extends Model // Extend the Model class
{
    use HasApiTokens, HasFactory, Notifiable;

    protected $table = 'orders'; // Specify the table name if it is not pluralized automatically

    protected $fillable = [
        'user_id',
        'payment_cost',
        'shipping_cost',
        'receiverName',
        'receiverPhone',
        'receiverAddress',
        'status',
        'receiverNote'
    ];

    // Optionally define primary key if it's not 'id'
    protected $primaryKey = 'order_id'; // Set the primary key if it's not 'id'

    public $incrementing = false; // Set to true if your primary key is auto-incrementing
    protected $keyType = 'string'; // Set to 'int' if your primary key is an integer
}
