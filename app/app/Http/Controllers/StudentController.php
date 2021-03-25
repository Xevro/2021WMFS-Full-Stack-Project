<?php

namespace App\Http\Controllers;

use App\Http\Resources\StudentResource;
use App\Models\Student;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class StudentController extends Controller {
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return string[]
     */
    public function store(Request $request) {
        // add a student (registration)
        $request->validate([
            'email' => 'required|email|unique:students',
            'firstname' => 'required',
            'lastname' => 'required',
            'password' => 'required|min:8|required_with:password_confirmation|same:password_confirmation',
            'password_confirmation' => 'required|min:8',
            'mentor_id' => 'required|exists:mentors,id'
        ]);
        if (User::create(['email' => $request->email, 'password' => Hash::make($request->password), 'role' => 'student'])) {
            Student::create(['firstname' => $request->firstname, 'lastname' => $request->lastname, 'email' => $request->email, 'r_number' => $request->r_number,
                'mentor_id' => $request->mentor_id, 'allowed' => 1, 'user_id' => User::where('email', $request->email)->first()->id]);
            return ['message' => 'The student has been created'];
        }
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return StudentResource
     */
    public function show($id) {
        return new StudentResource(Student::findOrFail($id));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return string[]
     */
    public function update(Request $request, $id) {
        // update student information
        $reqdata = $request->all();
        $reqdata['updated_at'] = date('Y-m-d H:i:s');
        if (Student::where('id', $id)->update($reqdata)) {
            return ['message' => 'The student has been updated'];
        } else {
            return ['message' => 'Could not update the student details'];
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id) {
        // do not implement (only if needed)
    }
}
