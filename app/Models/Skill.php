<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Skill extends Model {
    public function person(): BelongsTo {
        return $this->belongsTo(Person::class);
    }
}