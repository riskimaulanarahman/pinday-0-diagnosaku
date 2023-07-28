<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Doctor extends Model
{
    use HasFactory;
    protected $table = 'doctors';
    public $timestamps = false;
    protected $primaryKey = 'doctor_id';
    protected $keyType = 'string';
    protected $fillable = [
        'user_id',
        'name',
        'gender',
        'address',
        'contact_person',
        'specialist',
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
