<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use \DateTimeInterface;

class Position extends Model
{
    use SoftDeletes, HasFactory;

    public $table = 'positions';

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'position_name',
        'kode_jabatan',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }

    public function positionEmployees()
    {
        return $this->hasMany(Employee::class, 'position_id', 'id');
    }

    public function positionJobdescs()
    {
        return $this->hasMany(Jobdesc::class, 'position_id', 'id');
    }
}
