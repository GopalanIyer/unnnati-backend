<?php

class EnquiryForm extends \Illuminate\Database\Eloquent\Model {
    protected $fillable = [
        'id', 
        'eq_date', 
        'student_name', 
        'mobile_no', 
        'email_id',
        'course',
        'source',
        'branch',
    ];
}

?>