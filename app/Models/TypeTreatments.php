<?php

namespace App\Models;

use Astrotomic\Translatable\Translatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TypeTreatments extends Model
{
    use HasFactory;
    use Translatable;
    public $translatedAttributes = ['title', 'body', 'slug'];

    public function typeTreat()
    {
        return $this->belongsTo(Treatments::class, 'treatment_id');
    }
}
