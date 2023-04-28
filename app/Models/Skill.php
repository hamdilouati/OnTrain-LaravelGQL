<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Skill extends Model {
    use HasFactory;

    protected $guarded = [];

    public function person(): BelongsTo {
        return $this->belongsTo(Person::class);
    }
}
