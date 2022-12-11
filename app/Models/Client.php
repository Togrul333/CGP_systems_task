<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Client extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $guarded = false;

    public function companies()
    {
        return $this->belongsToMany(Company::class,'company_clients','client_id','company_id');
    }
}
