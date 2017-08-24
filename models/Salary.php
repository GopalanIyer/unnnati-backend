<?php

class Salary extends \Illuminate\Database\Eloquent\Model {
    protected $fillable = [
        'employee_name',
        'amount',
        'month',
        'mode',
        'cheque_no',
        'bank',
        
    ];
}

?>