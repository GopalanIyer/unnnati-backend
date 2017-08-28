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
        'exam_total_fees',
        'training_total_fees',
    ];
}

?>