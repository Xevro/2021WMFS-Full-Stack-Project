<?php

namespace App\Http\Controllers;

use App\Models\Company;
use App\Models\Proposal;
use App\Models\Student;

class StageController extends Controller {

    public function overview() {
        $amountApproved = Proposal::where('visibility', '=', 1)->count();
        $amountToCheck = Proposal::where('visibility', '=', 0)->count();
        $proposals = Proposal::select("*")->join('companies', 'proposals.companies_id_company', '=', 'companies.id')->get();

        return view('dashboard', ['proposals' => $proposals, 'amountToCheck' => $amountToCheck,
            'amountApproved' => $amountApproved,'menuItem' => 'overzicht', 'pageTitle' => 'Overzicht stages']);
    }

    public function students() {
        return view('students', ['students' => Student::all(), 'menuItem' => 'students', 'pageTitle' => 'Overzicht studenten']);
    }

    public function companies() {
        return view('companies', ['companies' => Company::all(), 'menuItem' => 'companies', 'pageTitle' => 'Overzicht bedrijven']);
    }

    public function proposal($id) {
        $proposal = Proposal::where('id', $id)->first();
        return view('proposal_detail', ['proposal' => $proposal, 'menuItem' => 'overzicht', 'pageTitle' => 'voorstel #' . $proposal->id]);
    }
}
