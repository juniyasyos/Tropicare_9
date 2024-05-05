<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DiseaseSolution extends Model
{
    use HasFactory;

    protected $table = 'diseasesolutions';

    protected $primaryKey = 'SolutionID';

    protected $fillable = [
        'DiseaseName',
        'SolutionDescription'
    ];

    public function diseaseDetections()
    {
        return $this->hasMany(Diseasedetection::class, 'DiseaseID');
    }
}
