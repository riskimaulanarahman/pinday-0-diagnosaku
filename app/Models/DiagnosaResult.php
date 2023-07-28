<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class DiagnosaResult extends Model
{
    use HasFactory;
    protected $table = 'diagnosa_results';
    public $timestamps = false;
    protected $primaryKey = 'diagnosa_result_id';
    protected $keyType = 'string';
    protected $fillable = [
        'patient_id',
        'disease_id',
        'answer_1',
        'answer_2',
        'answer_3',
        'answer_4',
        'answer_5',
        'answer_6',
        'answer_7',
        'answer_8',
        'suggestion_doctor',
        'date',
    ];

    public function patient(): BelongsTo
    {
        return $this->belongsTo(Patient::class, 'patient_id');
    }
    public function disease(): BelongsTo
    {
        return $this->belongsTo(Disease::class, 'disease_id');
    }
}
