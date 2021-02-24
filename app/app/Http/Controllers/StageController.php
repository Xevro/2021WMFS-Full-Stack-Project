<?php

namespace App\Http\Controllers;

use App\Models\Company;
use App\Models\Proposal;

class StageController extends Controller {

    public function overview() {
        $amountApproved = Proposal::where('visibility', '=', 1)->count();
        $amountToCheck = Proposal::where('visibility', '=', 0)->count();
        return view('dashboard', ['proposals' => Proposal::all(), 'companies' => Company::first(), 'amountToCheck' => $amountToCheck, 'amountApproved' => $amountApproved]);
    }

    public function students() {
        //dd((new \App\Models\Proposal)->company->email);
        return view('students', ['proposals' => Proposal::all(), 'companies' => Company::first()]);
    }

    public function companies() {
        //dd((new \App\Models\Proposal)->company->email);
        return view('companies', ['proposals' => Proposal::all(), 'companies' => Company::first()]);
    }
}
