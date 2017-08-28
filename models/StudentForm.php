<?php

class StudentForm extends \Illuminate\Database\Eloquent\Model {
    protected $fillable = [
        
        'student_name',
        'mobile_no',
        'email_id',
        'course',
        'branch',
        'exam_total_fees',
        'training_total_fees',
        'current_date',
        'active',
        
    ];
}

?>