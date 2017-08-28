<?php

class EnquiryForm extends \Illuminate\Database\Eloquent\Model {
    protected $fillable = [
       
        'current_date', 
        'student_name', 
        'mobile_no', 
        'email_id',
        'course',
        'source',
        'branch',
        'total_fees',
    ];
}

?>