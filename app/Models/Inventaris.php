<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Inventaris extends Model
{
    use HasFactory;
    protected $table = 'inventaris';
    protected $primaryKey = 'inventaris_id';
    
    protected $fillable = [
        'inventaris_id',
        'inventaris_nama_barang',
        'inventaris_user_id'
    ];

    public function user()
    {
        return $this->hasOne(User::class, 'user_id', 'inventaris_user_id');
    }
}
