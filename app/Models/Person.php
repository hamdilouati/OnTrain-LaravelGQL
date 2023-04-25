<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Person extends Model {
    use HasFactory;

    protected $table='persons';
    protected $casts=[
        'date_of_birth'=>'datetime:Y-m-d'
    ];
    protected $guarded = [];

    public function address(): HasOne {
        return $this->hasOne(Address::class);
    }

    public function skills(): HasMany {
        return $this->hasMany(Skill::class);
    }

    public function enterprises(): BelongsToMany {
        return $this->belongsToMany(Enterprise::class)
            ->withPivot('role','from_date',
                        'to_date','description');
    }
}

