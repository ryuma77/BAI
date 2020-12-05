<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use \DateTimeInterface;

class Division extends Model
{
    use SoftDeletes, HasFactory;

    public $table = 'divisions';

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'division_code',
        'division_name',
        'business_unit_id',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }

    public function divisionNameDepartments()
    {
        return $this->hasMany(Department::class, 'division_name_id', 'id');
    }

    public function divisionEmployees()
    {
        return $this->hasMany(Employee::class, 'division_id', 'id');
    }

    public function business_unit()
    {
        return $this->belongsTo(BusinessUnit::class, 'business_unit_id');
    }
}
