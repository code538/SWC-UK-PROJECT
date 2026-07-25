<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class FormQuestion extends Model
{
    protected $fillable = [
        'form_id', 'question_text', 'helper_text', 'question_type',
        'question_order', 'is_required',
    ];

    protected $casts = ['is_required' => 'boolean'];

    public function form(): BelongsTo 
    { 
        return $this->belongsTo(Form::class); 
    }
    public function options(): HasMany
    {
        return $this->hasMany(
            QuestionOption::class,
            'question_id'
        )->orderBy('option_order');
    }
    public function answers(): HasMany 
    { 
        return $this->hasMany(SubmissionAnswer::class, 'question_id'); 
    }
}