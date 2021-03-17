<?php

namespace App\Http\Controllers;

use App\Models\Company;
use App\Models\Mentor;
use App\Models\Proposal;
use App\Models\Student;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;

class StageController extends Controller {

    public function overview(Request $request) {
        $amountApproved = Proposal::where('visibility', '=', 1)->count();
        $amountToCheck = Proposal::where('visibility', '=', 0)->count();

        if ($request->has('search')) {
            $proposals = Proposal::with('company')->whereHas('company', function ($q) use ($request) {
                $q->where('name', 'like', '%' . $request->search . '%')->orWhere('description', 'like', '%' . $request->search . '%');
            })->where('visibility', '=', (bool)$request->status)->paginate(10);
        } else {
            $proposals = Proposal::with('company')->paginate(10);
        }
        $proposalsApproved = Proposal::with('company')->where('visibility', '=', 1)->paginate(10);

        if ($request->has('search_student')) {
            if($request->has('status_student') && $request->status_student == 'on') {
                $students = Student::where(function ($q) use ($request) {
                    $q->where('firstname', 'like', '%' . $request->search_student . '%')->orWhere('lastname', 'like', '%' . $request->search_student . '%');
                })->paginate(10);
            } else {
                $students = Student::where('mentor_id', Auth::user()->id)->where(function ($q) use ($request) {
                    $q->where('firstname', 'like', '%' . $request->search_student . '%')->orWhere('lastname', 'like', '%' . $request->search_student . '%');
                })->paginate(10);
            }
        } else {
            if($request->has('status_student') && $request->status_student == 'on') {
                $students = Student::where(function ($q) use ($request) {
                    $q->where('firstname', 'like', '%' . $request->search_student . '%')->orWhere('lastname', 'like', '%' . $request->search_student . '%');
                })->paginate(10);
            } else {
                $students = Student::where('mentor_id', Auth::user()->id)->paginate(10);
            }
        }

        return view('dashboard', ['students' => $students, 'termStudent' => $request->search_student, 'statusStudent' => $request->status_student, 'proposals' => $proposals, 'proposalsApproved' => $proposalsApproved,
            'term' => $request->search, 'status' => $request->status, 'amountToCheck' => $amountToCheck, 'amountApproved' => $amountApproved, 'menuItem' => 'overzicht', 'pageTitle' => 'Overzicht stages']);
    }

    public function students(Request $request) {
        //Gate::authorize('view-students');
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
        $company = Company::findOrFail($id);
        $proposals = Proposal::where('company_id', $id)->get();
        return view('company_detail', ['company' => $company, 'proposals' => $proposals, 'menuItem' => 'companies', 'pageTitle' => 'Detail Bedrijf']);
    }

    public function studentDetail($id) {
        $student = Student::findOrFail($id);
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

    public function showAddProposal() {
        Gate::authorize('add-proposal');
        return view('proposal_add', ['mentors' => Mentor::all(), 'companies' => Company::all(), 'menuItem' => 'addProposal', 'pageTitle' => 'Voeg Voorstel toe']);
    }

    public function addProposal(Request $request) {
        Gate::authorize('add-proposal');
        $request->validate([
            'description' => 'required|min:3|max:1000',
            'start_period' => 'required|date_format:Y-m-d',
            'end_period' => 'required|date_format:Y-m-d',
            'company_id' => 'required|exists:companies,id',
            'mentor_id' => 'required|exists:mentors,id'
        ]);
        Proposal::create($request->all());

        return redirect('dashboard');
    }

    public function showAddCompany() {
        Gate::authorize('add-company');
        return view('company_add', ['menuItem' => 'addCompany', 'pageTitle' => 'Voeg bedrijf toe']);
    }

    public function addCompany(Request $request) {
        Gate::authorize('add-company');
        $request->validate([
            'email' => 'required|email|unique:companies',
            'kbo_number' => 'required|unique:companies|numeric',
            'name' => 'required|unique:companies|max:125',
            'profile_image' => 'image|image|mimes:jpeg,png,jpg,gif,svg|max:2048'
        ]);

        $company = new Company($request->input());

        if ($request->profile_image) {
            $imageName = time() . '.' . $request->profile_image->extension();
            $request->profile_image->move(public_path('images'), $imageName);
            $company->profile_image = $imageName;
        }
        $company->save(); // store

        //Company::create($request->all());
        return redirect('dashboard/companies');
    }

    public function showAddStudent() {
        Gate::authorize('add-student');
        return view('student_add', ['mentors' => Mentor::all(), 'menuItem' => 'addStudent', 'pageTitle' => 'Voeg Student toe']);
    }

    public function addStudent(Request $request) {
        Gate::authorize('add-student');
        $request->validate([
            'email' => 'required|email|unique:students',
            'firstname' => 'required',
            'lastname' => 'required',
            'mentor_id' => 'required|exists:mentors,id'
        ]);
        Student::create($request->all());
        return redirect('dashboard/students');
    }

    public function showProposalDelete($id) {
        Gate::authorize('delete-proposal');
        $proposal = Proposal::where('id', $id)->first();
        return view('delete_proposal', ['proposal' => $proposal, 'menuItem' => 'addStudent', 'pageTitle' => 'Verwijder voorstel']);
    }

    public function proposalDelete(Request $request) {
        Gate::authorize('delete-proposal');
        if (Proposal::find($request->id)) {
            if (Proposal::destroy($request->id)) {
                return redirect('dashboard');
            } else {
                return view('errors.something_went_wrong');
            }
        } else {
            return view('errors.something_went_wrong');
        }
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
