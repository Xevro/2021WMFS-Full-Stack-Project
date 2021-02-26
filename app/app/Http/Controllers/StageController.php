<?php

namespace App\Http\Controllers;

use App\Models\Company;
use App\Models\Proposal;
use App\Models\Student;
use Illuminate\Database\Eloquent\Builder;

class StageController extends Controller {

    public function overview() {
        $amountApproved = Proposal::where('visibility', '=', 1)->count();
        $amountToCheck = Proposal::where('visibility', '=', 0)->count();
        $proposals = Proposal::with('company')->get();

        return view('dashboard', ['proposals' => $proposals, 'amountToCheck' => $amountToCheck,
            'amountApproved' => $amountApproved,'menuItem' => 'overzicht', 'pageTitle' => 'Overzicht stages']);
    }

    public function students() {
        $students = Student::all();
        return view('students', ['students' => $students, 'menuItem' => 'students', 'pageTitle' => 'Overzicht studenten']);
    }

    public function companies() {
        $companies = Company::all();
        return view('companies', ['companies' => $companies, 'menuItem' => 'companies', 'pageTitle' => 'Overzicht bedrijven']);
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

        $proposalsLiked = Proposal::whereHas('students', function (Builder $query) use ($id) {
            $query->where('id', $id);
        })->get();
        return view('student_detail', ['student' => $student, 'proposals' => $proposals,'proposalsLiked' => $proposalsLiked, 'menuItem' => 'students', 'pageTitle' => 'Detail Student']);
    }

    public function proposalDetail($id) {
        $proposal = Proposal::with('company')->where('id', $id)->first();
        return view('proposal_detail', ['proposal' => $proposal, 'menuItem' => 'overzicht', 'pageTitle' => 'stagevoorstel']);
    }
}
