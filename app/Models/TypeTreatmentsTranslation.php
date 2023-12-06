<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TypeTreatmentsTranslation extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $fillable = ['title', 'body','slug'];
    public function translated()
    {
        return $this->belongsTo(TypeTreatments::class);
    }
}
