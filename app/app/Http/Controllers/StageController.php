<?php

namespace App\Http\Controllers;

use App\Models\Company;
use App\Models\Mentor;
use App\Models\Proposal;
use App\Models\Student;

class StageController extends Controller {

    public function overview() {
        $amountApproved = Proposal::where('visibility', '=', 1)->count();
        $amountToCheck = Proposal::where('visibility', '=', 0)->count();
        $proposals = Proposal::with('company')->get();

        return view('dashboard', ['proposals' => $proposals, 'amountToCheck' => $amountToCheck,
            'amountApproved' => $amountApproved,'menuItem' => 'overzicht', 'pageTitle' => 'Overzicht stages']);
    }

    public function students() {
        $students = Student::with('mentor')->get();
        return view('students', ['students' => $students, 'menuItem' => 'students', 'pageTitle' => 'Overzicht studenten']);
    }

    public function companies() {
        return view('companies', ['companies' => Company::all(), 'menuItem' => 'companies', 'pageTitle' => 'Overzicht bedrijven']);
    }

    public function company($id) {
        $company = Company::where('id', $id)->first();
        $proposals = Proposal::where('company_id', $id)->get();
        return view('company_detail', ['company' => $company, 'proposals' => $proposals, 'menuItem' => 'companies', 'pageTitle' => 'Detail Bedrijf']);
    }

    public function proposal($id) {
        $proposal = Proposal::with('company')->where('id', $id)->first();
        return view('proposal_detail', ['proposal' => $proposal, 'menuItem' => 'overzicht', 'pageTitle' => 'stagevoorstel']);
    }
}
