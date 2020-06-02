<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Info extends Model
{
    protected $fillable = [
        'id','street','bar','town','prov','gender','civil_status','bdate','phone',
        'father','mother','parent_address','phone_parent','guardian','relation',
        'phone_guardian', 'guardian_address','elem_school','elem_address','elem_sy',
        'jhs_school','jhs_address','jhs_sy','shs_school','shs_address','shs_sy',
        'tertiary_school','tertiary_address','tertiary_sy','grad_school','grad_address','grad_sy',
    ];

    public $dates = ['bdate', 'created_at', 'updated_at'];

    public function student() {
        return $this->belongsTo('App\Student','id');
    }
}
