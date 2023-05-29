<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\UserJob;

use Illuminate\Http\Response;
use App\Traits\ApiResponser;
use Illuminate\Http\Request;
use DB;

Class UserController extends Controller {
use ApiResponser;   

private $request;

public function __construct(Request $request){
    $this->request = $request;
}

public function index()
{
    $users = User::all();
    return $this->successResponse($users);
}

public function add(Request $request)
{
    $rules = [
        'Student_ID' => 'required|numeric|min:1|not_in:0',
        'Student_FName' => 'required|max:25',
        'Student_LName' => 'required|max:25',
        'Course_ID' => 'required|numeric|min:1|not_in:0',
    ];

    $this->validate($request,$rules);

    $userjob = UserJob::findOrFail($request->Course_ID);
    $user = User::create($request->all());

    return $this->successResponse($user, Response::HTTP_CREATED);
}

public function delete($id)
{
    $user = User::findOrFail($id);
    $user->delete();

    return $this->successResponse($user);
}

public function update(Request $request,$id)
{
    $rules = [
        'Student_ID' => 'required|numeric|min:1|not_in:0',
        'Student_FName' => 'required|max:25',
        'Student_LName' => 'required|max:25',
        'Course_ID' => 'required|numeric|min:1|not_in:0',
    ]; 

    $this->validate($request, $rules);

    $userjob = UserJob::findOrFail($request->Course_ID);
    $user = User::findOrFail($id);
    $user->fill($request->all()); 
    
    if ($user->isClean()) {
        return $this->errorResponse('At least one value must change', Response::HTTP_UNPROCESSABLE_ENTITY);
    }

    $user->save();
    return $this->successResponse($user);
}

public function show($id)
{
$user = User::where('Student_ID', $id)->first();
    if($user){
    return $this->successResponse($user);
    }
    {
    return $this->errorResponse('user ID Does Not Exists', Response::HTTP_NOT_FOUND);
    }
}

}