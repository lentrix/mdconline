<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    protected $fillable = ['lname','fname','mname','idext'];

    public function enrol() {
        return $this->hasOne('App\Enrol');
    }

    public function getFullNameAttribute() {
        return $this->lname . ', ' . $this->fname . ' ' . $this->mname;
    }
}
