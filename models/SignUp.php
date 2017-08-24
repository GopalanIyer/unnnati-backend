<?php

class SignUp extends \Illuminate\Database\Eloquent\Model {
    protected $fillable = [
        
        'name', 
        'mobile_no', 
        'email_id', 
        'username',
        'password',
        'user_type',
        
    ];
}

?>