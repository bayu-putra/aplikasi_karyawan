<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class biodata extends Model
{
    use HasFactory;

    function pendidikan() : HasMany
    {
        return $this->hasMany(pendidikan::class, 'biodata_id');
    }
}
