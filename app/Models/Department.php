<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use \DateTimeInterface;

class Department extends Model
{
    use SoftDeletes, HasFactory;

    public $table = 'departments';

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'department_name',
        'department_code',
        'division_name_id',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }

    public function departmentNameSections()
    {
        return $this->hasMany(Section::class, 'department_name_id', 'id');
    }

    public function departmentEmployees()
    {
        return $this->hasMany(Employee::class, 'department_id', 'id');
    }

    public function departmentFromPromotions()
    {
        return $this->hasMany(Promotion::class, 'department_from_id', 'id');
    }

    public function division_name()
    {
        return $this->belongsTo(Division::class, 'division_name_id');
    }
}
