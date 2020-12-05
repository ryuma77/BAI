<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use \DateTimeInterface;

class Promotion extends Model
{
    use SoftDeletes, HasFactory;

    public $table = 'promotions';

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'employee_name_id',
        'department_from_id',
        'level_from_id',
        'position_from_id',
        'level_to_id',
        'position_to_id',
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

    public function level_from()
    {
        return $this->belongsTo(Level::class, 'level_from_id');
    }

    public function position_from()
    {
        return $this->belongsTo(Position::class, 'position_from_id');
    }

    public function level_to()
    {
        return $this->belongsTo(Level::class, 'level_to_id');
    }

    public function position_to()
    {
        return $this->belongsTo(Position::class, 'position_to_id');
    }
}
