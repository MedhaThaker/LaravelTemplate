<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Districts;
use App\Models\States;

class Cities extends Model
{
    use HasFactory;

    protected $table = 'athletekar_master_cities';

    protected $fillable = [
        'state_id',
        'district_id',
        'city_name',
        'created_ip_address',
        'modefied_ip_address',
        'created_by',
        'modefied_by',
    ];

    public function states()
    {
        return $this->hasOne(States::class,'id','state_id')->select('id','state_name');
    }

    public function districts()
    {
        return $this->hasOne(Districts::class,'id','district_id')->select('id','district_name');
    }

}
