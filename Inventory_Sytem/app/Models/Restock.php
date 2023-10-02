<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Restock extends Model
{
    use HasFactory;
    protected $table = 'restocks';

    protected $fillable = [
        'product_id',
        'submitted_quantity', // Add this field
        'name', // Add this field
    ];

    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}