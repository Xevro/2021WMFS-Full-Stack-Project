<?php

namespace App\Http\Controllers;

use App\Models\Company;
use App\Models\Mentor;
use App\Models\Proposal;
use App\Models\Student;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;

class StageController extends Controller {

    public function overview(Request $request) {
        $amountApproved = Proposal::where('visibility', '=', 1)->count();
        $amountToCheck = Proposal::where('visibility', '=', 0)->count();
        if ($request->has('search')) {
            $proposals = Proposal::with('company')->whereHas('company', function ($q) use ($request) {
                $q->where('name', 'like', '%' . $request->search . '%')->where('visibility', '=', (bool)$request->status);
            })->paginate(10);
        } else {
            $proposals = Proposal::with('company')->paginate(10);
        }
        return view('dashboard', ['proposals' => $proposals, 'term' => $request->search, 'status' => $request->status, 'amountToCheck' => $amountToCheck,
            'amountApproved' => $amountApproved, 'menuItem' => 'overzicht', 'pageTitle' => 'Overzicht stages']);
    }

    public function students(Request $request) {
        if ($request->has('search')) {
            $students = Student::where('firstname', 'like', '%' . $request->search . '%')->orWhere('lastname', 'like', '%' . $request->search . '%')->paginate(10);
        } else {
            $students = Student::paginate(8);
        }

        return view('students', ['students' => $students, 'term' => $request->search, 'menuItem' => 'students', 'pageTitle' => 'Overzicht studenten']);
    }

    public function companies(Request $request) {
        if ($request->has('search')) {
            $companies = Company::where('name', 'like', '%' . $request->search . '%')->paginate(10);
        } else {
            $companies = Company::paginate(8);
        }

        return view('companies', ['companies' => $companies, 'term' => $request->search, 'menuItem' => 'companies', 'pageTitle' => 'Overzicht bedrijven']);
    }

    public function companyDetail($id) {
        $company = Company::where('id', $id)->first();
        $proposals = Proposal::where('company_id', $id)->get();
        return view('company_detail', ['company' => $company, 'proposals' => $proposals, 'menuItem' => 'companies', 'pageTitle' => 'Detail Bedrijf']);
    }

    public function studentDetail($id) {
        $student = Student::find($id);
        $proposals = Proposal::whereHas('students', function (Builder $query) use ($id) {
            $query->where('id', $id);
        })->get();

        $proposalsLiked = Proposal::with('students')->whereHas('Likes', function (Builder $query) use ($id) {
            $query->where('student_id', $id);
        })->get();
        return view('student_detail', ['student' => $student, 'proposals' => $proposals, 'proposalsLiked' => $proposalsLiked, 'menuItem' => 'students', 'pageTitle' => 'Detail Student']);
    }

    public function proposalDetail($id) {
        $proposal = Proposal::with('company')->where('id', $id)->first();
        return view('proposal_detail', ['proposal' => $proposal, 'menuItem' => 'overzicht', 'pageTitle' => 'stagevoorstel']);
    }

    public function showAddCompany() {
        return view('company_add', ['menuItem' => 'addCompany', 'pageTitle' => 'Voeg bedrijf toe']);
    }

    public function addCompany(Request $request) {
        $request->validate([
            'email' => 'required|email|unique:companies',
            'kbo_number' => 'required|unique:companies|numeric',
            'name' => 'required|unique:companies|max:125',
          //  'website' => 'nullable',
            'password' => 'required|min:8|required_with:password_confirmation|same:password_confirmation',
            'password_confirmation' => 'required|min:8'
        ]);
        Company::create($request->all());
        return redirect('dashboard/companies');
    }

    public function showAddStudent() {
        return view('student_add', ['mentors'=> Mentor::all(), 'menuItem' => 'addStudent', 'pageTitle' => 'Voeg Student toe']);
    }

    public function addStudent(Request $request) {
        $request->validate([
            'email' => 'required|email|unique:students',
            'firstname' => 'required',
            'lastname' => 'required',
            'mentor_id' => 'required|exists:mentors,id'
        ]);
        Student::create($request->all());
        return redirect('dashboard/students');
    }

    public function showAssignStudentToProposal() {
        return view('assign_student_to_proposal', ['menuItem' => 'Students', 'pageTitle' => 'stagevoorstel']);
    }

    public function assignStudentToProposal(Request $request) {

    }

    public function showValidateProposal() {

    }

    public function validateProposal(Request $request) {

    }
}
