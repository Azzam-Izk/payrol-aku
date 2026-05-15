<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    protected $fillable = [
        'user_id',
        'position_id',
        'division_id',
        'nik',
        'name',
        'phone',
        'address',
        'photo',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function position()
    {
        return $this->belongsTo(Position::class);
    }

    public function division()
    {
        return $this->belongsTo(Division::class);
    }

    // Satu karyawan bisa punya banyak slip gaji
    public function payrolls()
    {
        return $this->hasMany(Payroll::class);
    }
}
