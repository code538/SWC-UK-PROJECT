<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class FormSubmission extends Model
{
    protected $fillable = [
        'form_id', 'company_name', 'business_email', 'phone_number',
        'status', 'started_at', 'submitted_at',
    ];

    protected $casts = ['started_at' => 'datetime', 'submitted_at' => 'datetime'];

    public function form(): BelongsTo { return $this->belongsTo(Form::class); }
    public function answers(): HasMany { return $this->hasMany(SubmissionAnswer::class, 'submission_id'); }
}