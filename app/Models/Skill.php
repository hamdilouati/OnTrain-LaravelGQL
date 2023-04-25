<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Skill extends Model {

    protected $guarded = [];

    public function person(): BelongsTo {
        return $this->belongsTo(Person::class);
    }
}
