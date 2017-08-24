<?php

class StudentForm extends \Illuminate\Database\Eloquent\Model {
    protected $fillable = [
        'id',
        'student_name',
        'mobile_no',
        'email_id',
        'course',
        'branch',
        'total_fees',
        'current_date',
        'active',
        
    ];
}

?>