<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Diseasedetection extends Model
{
    use HasFactory;

    protected $table = 'diseasedetections';

    protected $primaryKey = 'DetectionID';

    protected $fillable = [
        'UserID',
        'DetectionDate',
        'PlantPhoto',
        'DiseaseID',
        'ResultDetection'
    ];

    public function farmer()
    {
        return $this->belongsTo(User::class, 'UserID');
    }

    public function disease()
    {
        return $this->belongsTo(DiseaseSolution::class, 'DiseaseID');
    }
}
