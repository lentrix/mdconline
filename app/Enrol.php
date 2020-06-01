<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Enrol extends Model
{
    protected $fillable = ['student_id','email','phone','program','level','code'];
    protected $dates = ['created_at','updated_at'];

    public function student() {
        return $this->belongsTo('App\Student');
    }

    public function user() {
        return $this->belongsTo('App\User');
    }

    public function paymentVerifiedBy() {
        return $this->belongsTo('App\User','payment_verified_by');
    }

    public function recordsVerifiedBy() {
        return $this->belongsTo('App\User','records_verified_by');
    }

    public function processedBy() {
        return $this->belongsTo('App\User','processed_by');
    }

    public function verificationStatus() {
        if($this->payment_verified_by) {
            return "by " . $this->paymentVerifiedBy->fullname;
        }else {
            return "Not verified";
        }
    }

    public function recordsStatus() {
        if($this->records_verified_by) {
            return "by " . $this->recordsVerifiedBy->fullname;
        }else {
            return "Not verified";
        }
    }

    public static function programList() {
        return [
            'BSA' => 'Bachelor of Science in Accountancy',
            'BSC-MA' => 'Bachelor of Science in Commerce Major in Mgt. Accounting',
            'BSBA-MM' =>'Bachelor of Science in Business Administration Major in Marketing Mgt.',
            'BSBA-FM'=>'Bachelor of Science in Business Administration Major in Financial Mgt.',
            'BSHM'=>'Bachelor of Science in Hospitality Management',
            'BSTM'=>'Bachelor of Science in Tourism Management',
            'BSIT'=>'Bachelor of Science in Information Technology',
            'BSCS'=>'Bachelor of Science in Computer Science',
            'BSMath'=>'Bachelor of Science in Mathematics',
            'BSN'=>'Bachelor of Science in Nursing',
            'BSCrim'=>'Bachelor of Science in Criminology',
            'BEED'=>'Bachelor in Elementary Education',
            'BSED-Eng'=>'Bachelor of Secondary Education Major in English',
            'BSED-Sci'=>'Bachelor of Secondary Education Major in Science',
            'BSED-Math'=>'Bachelor of Secondary Education Major in Mathematics',
            'BSED-Fil'=>'Bachelor of Secondary Education Major in Filipino',
            'BSED-Soc'=>'Bachelor of Secondary Education Major in Social Studies',
            'BSED-Val'=>'Bachelor of Secondary Education Major in Values Education',
        ];
    }

    public static function status() {
        return [
            'pending' => $pd = Enrol::where('status','pending')->count(),
            'processing' => $pr = Enrol::where('status','processing')->count(),
            'finalized' => $fn = Enrol::where('status','finalized')->count(),
            'payment_verified' => $vr = Enrol::whereNotNull('payment_verified_by')->count(),
            'records_verified' => $vr = Enrol::whereNotNull('records_verified_by')->count(),
            'total' => $pd+$pr+$fn,
        ];
    }
}
