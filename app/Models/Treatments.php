<?php

namespace App\Models;

use Astrotomic\Translatable\Translatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Treatments extends Model
{
    use HasFactory;
    use Translatable;
    public $translatedAttributes = ['title'];
    protected $fillable = ['image', 'publish'];
    public function children()
    {
        return $this->hasMany(TypeTreatments::class);
    }
}
