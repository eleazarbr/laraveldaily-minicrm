<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    protected $table = 'companies';

    protected $fillable = [
        'first_name',
        'email',
        'logo',
        'website',
    ];

    /**
     * Relationships
     */

    /**
     * The hasMany relationship to Employees
     *
     * @return hasMany
     */
    public function employees()
    {
        return $this->hasMany(Employee::class);
    }
}
