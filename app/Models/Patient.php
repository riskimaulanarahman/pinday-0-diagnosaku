<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Patient extends Model
{
    use HasFactory;
    protected $table = 'patients';
    public $timestamps = false;
    protected $primaryKey = 'patient_id';
    protected $keyType = 'string';
    protected $fillable = [
        'user_id',
        'name',
        'gender',
        'address',
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id');
    }
    
    public function diagnosa_result(): HasMany {
        return $this->hasMany(DiagnosaResult::class, 'disease_id');
    }
}
