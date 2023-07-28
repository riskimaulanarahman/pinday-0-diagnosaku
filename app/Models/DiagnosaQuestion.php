<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DiagnosaQuestion extends Model
{
    use HasFactory;
    protected $table = 'diagnosa_questions';
    public $timestamps = false;
    protected $primaryKey = 'diagnosa_question_id';
    protected $keyType = 'string';
    protected $fillable = [
        'name',
        'question',
        'yes_to',
        'no_to',
        'yes_diagnosa',
        'no_diagnosa',
    ];
}
