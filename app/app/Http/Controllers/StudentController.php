<?php

namespace App\Http\Controllers;

use App\Http\Resources\ProposalResource;
use App\Http\Resources\StudentResource;
use App\Models\Mentor;
use App\Models\Proposal;
use App\Models\Student;
use App\Models\User;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Hash;

class StudentController extends Controller {
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Resources\Json\AnonymousResourceCollection
     */
    public function index() {
        Gate::authorize('api-view-all-student');
        return StudentResource::collection(Student::all());
    }

    public function contract($id) {
        Gate::authorize('api-view-contract', $id);
        $proposal_id = Student::where('id', $id)->where('approved', 'Approved')->pluck('proposal_id');
        return Proposal::where('id', $proposal_id)->with('company')->get();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return string[]
     */
    public function store(Request $request) {
        // student can't be created on the SPA
        /*
        $request->validate([
            'email' => 'required|email|unique:students',
            'firstname' => 'required',
            'lastname' => 'required',
            'password' => 'required|min:8|required_with:password_confirmation|same:password_confirmation',
            'password_confirmation' => 'required|min:8'
        ]);
        if (User::create(['email' => $request->email, 'password' => Hash::make($request->password), 'role' => 'student'])) {
            Student::create(['firstname' => $request->firstname, 'lastname' => $request->lastname, 'email' => $request->email, 'r_number' => $request->r_number,
                'allowed' => 1, 'user_id' => User::where('email', $request->email)->first()->id]);
            return ['message' => 'The student has been created'];
        }*/
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return StudentResource
     */
    public function show($id) {
        Gate::authorize('api-view-student', $id);
        return new StudentResource(Student::where('id', $id)->first());
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return string[]
     */
    public function update(Request $request, $id) {
        Gate::authorize('api-update-student', $id);
        $reqdata = $request->all();
        $reqdata['updated_at'] = date('Y-m-d H:i:s');
        if (Auth::user()->student()->update($reqdata)) {
            Auth::user()->update(['email' => $request->email]);
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

    /* ** WEB controller methodes ** */

    public function students(Request $request) {
        Gate::authorize('view-students-page');
        if ($request->has('search')) {
            $students = Student::where('firstname', 'like', '%' . $request->search . '%')->orWhere('lastname', 'like', '%' . $request->search . '%')->where('allowed', 1)->paginate(8);
        } else {
            $students = Student::where('allowed', 1)->with(['mentor'])->paginate(8);
        }
        return view('students', ['students' => $students, 'term' => $request->search, 'menuItem' => 'students', 'pageTitle' => 'Overzicht studenten']);
    }

    public function studentDetail($id) {
        Gate::authorize('view-student-details');
        $student = Student::findOrFail($id);
        $proposals = Proposal::whereHas('students', function (Builder $query) use ($id) {
            $query->where('id', $id);
        })->get();

        $proposalsLiked = Proposal::with('students')->whereHas('Likes', function (Builder $query) use ($id) {
            $query->where('student_id', $id);
        })->get();
        return view('student_detail', ['student' => $student, 'proposals' => $proposals, 'proposalsLiked' => $proposalsLiked, 'menuItem' => 'students', 'pageTitle' => 'Detail Student']);
    }

    public function showAddStudent() {
        Gate::authorize('add-student');
        return view('student_add', ['mentors' => Mentor::all(), 'menuItem' => 'addStudent', 'pageTitle' => 'Voeg Student toe']);
    }

    public function addStudent(Request $request) {
        Gate::authorize('add-student');
        $request->validate([
            'email' => 'required|email|unique:users',
            'firstname' => 'required',
            'lastname' => 'required',
            'password' => 'required|min:8|required_with:password_confirmation|same:password_confirmation',
            'password_confirmation' => 'required|min:8',
            'mentor_id' => 'required|exists:mentors,id'
        ]);
        User::create(['email' => $request->email, 'password' => Hash::make($request->password), 'role' => 'student']);
        Student::create(['firstname' => $request->firstname, 'lastname' => $request->lastname, 'r_number' => $request->r_number,
            'mentor_id' => $request->mentor_id, 'allowed' => 1, 'user_id' => User::where('email', $request->email)->first()->id]);
        return redirect('dashboard/students');
    }

    public function showAssignMentorToStudent() {
        Gate::authorize('view-assign-mentor-to-student');
        return view('assign_mentor_to_student', ['mentors' => Mentor::all(), 'students' => Student::where('mentor_id', null)->where('allowed', 1)->get(), 'menuItem' => 'AssignMentor', 'pageTitle' => 'Koppel mentor aan een student']);
    }

    public function assignMentorToStudent(Request $request) {
        Gate::authorize('view-assign-mentor-to-student');
        Student::where('id', $request->student_id)->update(['mentor_id' => $request->mentor_id]);
        return redirect('dashboard/student/' . $request->student_id);
    }
}
