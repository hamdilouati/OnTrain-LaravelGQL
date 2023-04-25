<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Enterprise extends Model {
    use HasFactory;

    protected $casts=[
        'registered_at'=>'datetime:Y-m-d'
    ];
    protected $guarded = [];

    public function persons(): BelongsToMany {
        return $this->belongsToMany(Person::class)
            ->withPivot('role','from_date',
                        'to_date','description');
    }
}
