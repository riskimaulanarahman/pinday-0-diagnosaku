<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Disease extends Model
{
    use HasFactory;
    protected $table = 'diseases';
    public $timestamps = false;
    protected $primaryKey = 'disease_id';
    protected $keyType = 'string';
    protected $fillable = [
        'name',
        'description',
        'suggestion',
        'image',
    ];

    public function diagnosa_result(): HasMany {
        return $this->hasMany(DiagnosaResult::class, 'disease_id');
    }
}
