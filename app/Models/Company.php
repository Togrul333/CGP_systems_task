<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Company extends Model
{
    use HasFactory;
    use SoftDeletes;


    protected $guarded = false;

    public function clients()
    {
        return $this->belongsToMany(Client::class,'company_clients','company_id','client_id');
    }
}
