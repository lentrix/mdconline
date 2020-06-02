<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    protected $fillable = ['id', 'lname','fname','mname','idext'];
    public $dates = ['create_at', 'updated_at'];

    public function enrol() {
        return $this->hasOne('App\Enrol');
    }

    public function getFullNameAttribute() {
        return $this->lname . ', ' . $this->fname . ' ' . $this->mname;
    }
}
