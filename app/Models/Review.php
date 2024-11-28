<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    use HasFactory;

    // Define the table name if it's not the plural form of the model name
    protected $table = 'reviews';

    // Fillable properties for mass assignment
    protected $fillable = [
        'product_id',
        'user_id',
        'comment',
        'rating',
    ];

    // Relationship with Product
    // public function product()
    // {
    //     return $this->belongsTo(Product::class, 'product_id');
    // }

    // Relationship with User
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    // Optional: Validation rules (if using form requests)
    public static function rules()
    {
        return [
            'comment' => 'required|string|max:1000',
            'rating' => 'required|integer|between:1,5',
            'product_id' => 'required|exists:products,id',
            'user_id' => 'required|exists:users,id',
        ];
    }
}
