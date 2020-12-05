<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use \DateTimeInterface;

class Salary extends Model
{
    use SoftDeletes, HasFactory;

    public $table = 'salaries';

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'employee_id',
        'basic_salary',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }

    public function employee()
    {
        return $this->belongsTo(Employee::class, 'employee_id');
    }

    public function bpjs()
    {
        return $this->belongsToMany(Bpj::class);
    }

    public function tunjangans()
    {
        return $this->belongsToMany(Allowance::class);
    }

    public function potongans()
    {
        return $this->belongsToMany(Deduction::class);
    }
}
