<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class employee extends Model
{
    use HasFactory;
    protected $table = 'employee';
    protected $guarded = [];
    protected $fillable = [
        'id',
        'name',
        'position',
    ];

    protected $primaryKey = 'id';
    public $incrementing = false;
}
