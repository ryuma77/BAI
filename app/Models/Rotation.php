<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use \DateTimeInterface;

class Rotation extends Model
{
    use SoftDeletes, HasFactory;

    public $table = 'rotations';

    protected $dates = [
        'valid_date',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'employee_name_id',
        'department_from_id',
        'department_to_id',
        'valid_date',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }

    public function employee_name()
    {
        return $this->belongsTo(Employee::class, 'employee_name_id');
    }

    public function department_from()
    {
        return $this->belongsTo(Department::class, 'department_from_id');
    }

    public function department_to()
    {
        return $this->belongsTo(Department::class, 'department_to_id');
    }

    public function getValidDateAttribute($value)
    {
        return $value ? Carbon::parse($value)->format(config('panel.date_format')) : null;
    }

    public function setValidDateAttribute($value)
    {
        $this->attributes['valid_date'] = $value ? Carbon::createFromFormat(config('panel.date_format'), $value)->format('Y-m-d') : null;
    }
}
