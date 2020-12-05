<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use \DateTimeInterface;

class BusinessUnit extends Model
{
    use SoftDeletes, HasFactory;

    public $table = 'business_units';

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'business_unit_code',
        'business_unit_name',
        'lokasi',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }

    public function businessUnitDivisions()
    {
        return $this->hasMany(Division::class, 'business_unit_id', 'id');
    }
}
