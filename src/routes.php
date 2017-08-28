<?php
require '../models/EnquiryForm.php';
require '../models/ExamReciept.php';
require '../models/ExamRecieptTemp.php';
require '../models/TrainingReciept.php';
require '../models/TrainingRecieptTemp.php';
require '../models/Salary.php';
require '../models/StudentForm.php';
require '../models/TaskTab.php';
require '../models/SignUp.php';

// GET details for temp exam
$app->get('/tempexam', function($request, $response) {
    
    $tempexam = \ExamRecieptTemp::get();
    // $details = \ExamRecieptTemp::orderBy('id', 'desc')->get();
    if($tempexam)
    {
        $response->getBody()->write($tempexam->toJson());
    }
    else
    {
        // $response
    }
    return $response;
});
// Post details for temp exam
$app->post('/tempexam', function($request, $response) {
   
    $json = $request->getBody();
    $data = json_decode($json, true);
    $tempexam = new \ExamRecieptTemp(array(
            'staff_name' => $data['staff_name'],
            'student_name' => $data['student_name'],
            'mobile_no' => $data['mobile_no'],
            'course' => $data['course'],
            'branch' => $data['branch'],
            'receipt_type' => $data['receipt_type'],
            'certificate_no' => $data['certificate_no'],
            'current_date' => $data['current_date'],
            'amount' => $data['amount'],
            'total_fees_paid' => $data['total_fees_paid'],
            'exam_total_fees' => $data['exam_total_fees'],
            'balance_fees' => $data['balance_fees'],
            'mode' => $data['mode'],
            'cheque_no' => $data['cheque_no'],
            'bank' => $data['bank']
     ));
     $tempexam->save();
    $response->getBody()->write($tempexam->toJson());
    

    return $response;
});
//delete temp exam
$app->delete('/tempexam/{id}', function($request, $response, $args) {
   
        $id = $request->getAttribute('id');
        $tempexam = \ExamRecieptTemp::find($id);
        
            $tempexam->delete();
            
            $response->getBody()->write('{"status": 200, "message": "Notice Deleted"}');
            return $response;
      
});
// GET details for balance fees from perma training
$app->get('/permatraining/search', function($request, $response) {
    $name = $request->getQueryParams()['student_name'];
    $course = $request->getQueryParams()['course'];
    $student=\TrainingReciept::orderBy('current_date', 'desc')
                             ->where('student_name',$name)
                             ->where('course', $course)
                             ->first();
    if($student)
    {
        return $response->withJson($student);
    }
    else
    {
        return $response->withJson(array('error'=>'Student not found'));
    }
});
//Get for temp training
$app->get('/temptraining', function($request, $response) {
    $temptraining = \TrainingRecieptTemp::get();
    if($temptraining)
    {
        $response->getBody()->write($temptraining->toJson());
    }
    else
    {
       $response->getBody()->write('{"status": 404, "message": "No such data available"}');
    }
    return $response;
});
// Post details temp training
$app->post('/temptraining', function($request, $response) {
   
    $json = $request->getBody();
    $data = json_decode($json, true);
    $temptraining = new \TrainingRecieptTemp(array(
            'staff_name' => $data['staff_name'],
            'student_name' => $data['student_name'],
            'mobile_no' => $data['mobile_no'],
            'course' => $data['course'],
            'branch' => $data['branch'],
            'receipt_type' => $data['receipt_type'],
            // 'certificate_no' => $data['certificate_no'],
            'current_date' => $data['current_date'],
            'amount' => $data['amount'],
            'total_fees_paid' => $data['total_fees_paid'],
            'training_total_fees' => $data['training_total_fees'],
            'balance_fees' => $data['balance_fees'],
            'mode' => $data['mode'],
            'cheque_no' => $data['cheque_no'],
            'bank' => $data['bank']
     ));
     $temptraining->save();
    $response->getBody()->write($temptraining->toJson());
    

    return $response;
});
// GET details for balance fees from perma exam
$app->get('/permaexam/search', function($request, $response) {
    $name = $request->getQueryParams()['student_name'];
    $course = $request->getQueryParams()['course'];
    // return $response->withJson($course);
    $student=\ExamReciept::orderBy('current_date', 'desc')
                             ->where('student_name',$name)
                            ->where('course', $course)
                            ->first();
    if($student)
    {
        return $response->withJson($student);
    }
    else
    {
        return $response->withJson(array('error'=>'Student not found'));
    }
});

//post details to permanent exam
$app->post('/permaexam', function($request, $response) {
    
    $json = $request->getBody();
    $data = json_decode($json, true);
    $permaexam = new \ExamReciept(array(
            'staff_name' => $data['staff_name'],
            'student_name' => $data['student_name'],
            'mobile_no' => $data['mobile_no'],
            'course' => $data['course'],
            'branch' => $data['branch'],
            'receipt_type' => $data['receipt_type'],
            'certificate_no' => $data['certificate_no'],
            'current_date' => $data['current_date'],
            'amount' => $data['amount'],
            'total_fees_paid' => $data['total_fees_paid'],
            'exam_total_fees' => $data['exam_total_fees'],
            'balance_fees' => $data['balance_fees'],
            'mode' => $data['mode'],
            'cheque_no' => $data['cheque_no'],
            'bank' => $data['bank']
     ));  
     $id = $data['id'];
    $tempexam = \ExamRecieptTemp::find($id);
    $tempexam->delete();
    $permaexam->save();
    $response->getBody()->write($permaexam->toJson());
    return $response;
});

//post for permanant training
$app->post('/permatraining', function($request, $response) {
   
    $json = $request->getBody();
    $data = json_decode($json, true);
    $permatraining = new \TrainingReciept(array(
            'staff_name' => $data['staff_name'],
            'student_name' => $data['student_name'],
            'mobile_no' => $data['mobile_no'],
            'course' => $data['course'],
            'branch' => $data['branch'],
            'receipt_type' => $data['receipt_type'],
            // 'certificate_no' => $data['certificate_no'],
            'current_date' => $data['current_date'],
            'amount' => $data['amount'],
            'total_fees_paid' => $data['total_fees_paid'],
            'training_total_fees' => $data['training_total_fees'],
            'balance_fees' => $data['balance_fees'],
            'mode' => $data['mode'],
            'cheque_no' => $data['cheque_no'],
            'bank' => $data['bank']
     ));
     $id = $data['id'];
     $temptraining = \TrainingRecieptTemp::find($id);
        
    $temptraining->delete();
     $permatraining->save();
    $response->getBody()->write($permatraining->toJson());
    

    return $response;
});

// GET details for enquiry
$app->get('/enquiry', function($request, $response) {
    
     $enquiry = \EnquiryForm::get();
    if($enquiry)
    {
        $response->getBody()->write($enquiry->toJson());
    }
    else
    {
        // $response
    }
    return $response;
});
//post for enquiry
$app->post('/enquiry', function($request, $response) {
    $json = $request->getBody();
    $data = json_decode($json, true);
    $enquiry = new \EnquiryForm(array(
            
            'student_name' => $data['student_name'],
            'current_date' => $data['current_date'],
            'mobile_no' => $data['mobile_no'],
            'email_id' => $data['email_id'],
            'course' => $data['course'],
            'source' => $data['source'],
            'branch' => $data['branch'],
            'exam_total_fees' => $data['exam_total_fees'],
            'training_total_fees' => $data['training_total_fees'],
            
     ));
     $enquiry->save();
    $response->getBody()->write($enquiry->toJson());
    

    return $response;

});

//get salary
$app->get('/salary', function($request, $response) {
    //  $id = $request->getAttribute('id');

    $salary = \Salary::get();
    // orderBy('id', 'desc')->
    // $details = \ExamRecieptTemp::orderBy('id', 'desc')->get();
    if($salary)
    {
        $response->getBody()->write($salary->toJson());
    }
    else
    {
        // $response
    }
    return $response;
});
// post for salary
$app->post('/salary', function($request, $response) {
    $json = $request->getBody();
    $data = json_decode($json, true);
    $employee_name =$data['employee_name'];
    $month = $data['month'];
    $salary = \Salary::where('employee_name', $employee_name)
                            ->where('month', $month)
                            ->first();
    if($salary)
    {
        $response->getBody()->write($salary->toJson()); 
        
    }
    else
    {
        $response->getBody()->write('{"status": 404, "message": "Not found"}');

        // $response
    }
    return $response;
});

//put for salary
$app->put('/salary', function($request, $response) {
    $json = $request->getBody();
    // echo $json;
    $data = json_decode($json, true);
    
    $salary = new \Salary(array(
            'employee_name' => $data['employee_name'],
            'amount' => $data['amount'],
            'month' => $data['month'],
            'mode' => $data['mode'],
            'cheque_no' => $data['cheque_no'],
            'bank' => $data['bank']
         
     ));
     $salary->save();
    $response->getBody()->write($salary->toJson());
    

    return $response;

});

// GET for student form
$app->get('/studform', function($request, $response) {
    // $id = $request->getAttribute('id');

    $studform = \StudentForm::get();
    // $details = \ExamRecieptTemp::orderBy('id', 'desc')->get();
    if($studform)
    {
        $response->getBody()->write($studform->toJson());
    }
    else
    {
        // $response
    }
    return $response;
});

//post for student_form
$app->post('/studform', function($request, $response) {
   
    $json = $request->getBody();
    $data = json_decode($json, true);
    // echo $data['student_name'];
    $studform = new \StudentForm(array(
            
            'student_name' => $data['student_name'],
            'mobile_no' => $data['mobile_no'],
            'email_id' => $data['email_id'],
            'course' => $data['course'],
            'branch' => $data['branch'],
            'exam_total_fees' => $data['exam_total_fees'],
            'training_total_fees' => $data['training_total_fees'],
            'current_date' => $data['current_date'],
            'active' => $data['active']
     ));
    $studform->save();
    $response->getBody()->write($studform->toJson());
    return $response;
});

//enquiry to studform
$app->post('/enquirytostud', function($request, $response) {
   
    $json = $request->getBody();
    $data = json_decode($json, true);
    // echo $data['student_name'];
    $studform = new \StudentForm(array(
            
            'student_name' => $data['student_name'],
            'mobile_no' => $data['mobile_no'],
            'email_id' => $data['email_id'],
            'course' => $data['course'],
            'branch' => $data['branch'],
            'exam_total_fees' => $data['exam_total_fees'],
            'training_total_fees' => $data['training_total_fees'],
            'current_date' => $data['current_date']
           
     ));
    $id = $data['id'];
    $enquiry = \EnquiryForm::find($id);
    $enquiry->delete();
    $studform->save();
    $response->getBody()->write($studform->toJson());
    return $response;
});

// GET details for task
$app->get('/task', function($request, $response) {
    // $id = $request->getAttribute('id');

     $tasktab = \TaskTab::get();
    
    if($tasktab)
    {
        $response->getBody()->write($tasktab->toJson());
    }
    else
    {
        // $response
    }
    return $response;
});

// Post details for task tab
$app->post('/task', function($request, $response) {
   
    $json = $request->getBody();
    $data = json_decode($json, true);
    $tasktab = new \TaskTab(array(
            
            'current_date' => $data['current_date'],
            'task' => $data['task'],
            'task_type' => $data['task_type']
            
     ));
     $tasktab->save();
    $response->getBody()->write($tasktab->toJson());
    return $response;
});

//delete for task
$app->delete('/task/{id}', function($request, $response, $args) {
    $id = $request->getAttribute('id');
    $notice = \TaskTab::find($id);
    if (!$notice) {
        $response->getBody()->write('{"status": 404, "error": "Task not found"}');
    }
    else {
    
        $notice->delete();
        $response->getBody()->write('{"status": 200, "message": "Task Deleted"}');

        }
    return $response;
});

// GET for sign up form
$app->get('/signup', function($request, $response) {
    $signup = \SignUp::get();
    if($signup)
    {
        $response->getBody()->write($signup->toJson());
    }
    else
    {
        // $response
    }
    return $response;
});

//post for student_form
$app->post('/signup', function($request, $response) {
   
    $json = $request->getBody();
    $data = json_decode($json, true);
    $signup = new \SignUp(array(
            
            'name' => $data['name'],
            'mobile_no' => $data['mobile_no'],
            'email_id' => $data['email_id'],
            'username' => $data['username'],
            'password' => $data['password'],
            'user_type' => $data['user_type']
            
     ));
     $signup->save();
    $response->getBody()->write($signup->toJson());
    return $response;
});

//get for login
$app->post('/login', function($request, $response) {
    $json = $request->getBody();
    $data = json_decode($json, true);
    $username =$data['username'];
    $password = $data['password'];
    $login = \SignUp::where('username', $username)
                            ->where('password', $password)
                            ->first();
    
    if($login)
    {
        $response->getBody()->write($login->toJson()); 
         
    }
    else
    {
        $response->getBody()->write('{"status": 404, "message": "Username or Password Incorrect"}');
    }
    return $response;
});

//post for change password
$app->post('/changepassword', function($request, $response) {
    $json = $request->getBody();
    $data = json_decode($json, true);
    $username =$data['username'];
    $password = $data['password'];
    $newpass = $data['newpass'];
    $change = \SignUp::where('username', $username)
                            ->where('password', $password)
                            ->first();
    if ($change) {
        $params = $request->getBody();
        $data = json_decode($params, true);
        $password = $data['password'];
        $newpass = $data['newpass'];
        if ($password == $change['password']) {
            // updating the password and token
            $change->update([
                'password' =>  $newpass
                ]);
            $change->update([
                'change' => $change['username'] . $newpass
                ]);
            $change->save();
            $response->getBody()->write('{ "error": "Password changed successfully"}');
        } else {
            $response->getBody()->write('{"status": 401, "error": "Incorrect Password"}');
        }
    } else {
        $response->getBody()->write('{"status": 401, "error": "Unauthorized Access"}');
    }
  
    return $response;
});

//GET for all
$app->get('/report', function($request, $response) {
    $rpt=array();
//get permaexam
    $id = $request->getAttribute('id');

    $permaexam = \ExamReciept::orderBy('id', 'desc')->get();
    // $details = \ExamRecieptTemp::orderBy('id', 'desc')->get();
    if($permaexam)
    {
        $rpt["permaexam"] = $permaexam;
        
        // $response->getBody()->write('{"status": 200, "message": ""}');
    }
    else
    {
     $rpt["permaexam"] = array('status'=>404, 'message'=>"No such data available");
   
    }
//get perma training
    $id = $request->getAttribute('id');

    $permatraining = \TrainingReciept::orderBy('id','desc')->get();
    // $details = \ExamRecieptTemp::orderBy('id', 'desc')->get();
    if($permatraining)
    {
        $rpt["permatraining"] = $permatraining;
        // 
    }
    else
    {
        // $response
    }
    return $response->withJson($rpt, 200);
});
?>