<?php

class ExamReciept extends \Illuminate\Database\Eloquent\Model {
    protected $fillable = [
        'staff_name',
        'student_name',
        'mobile_no',
        'course',
        'branch',
        'receipt_type',
        'certificate_no',
        'current_date',
        'amount',
        'total_fees_paid',
        'exam_total_fees',
        'balance_fees',
        'mode',
        'cheque_no',
        'bank',
    ];
}

?>