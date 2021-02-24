<?php

namespace App\Http\Controllers;

use App\Models\Company;
use App\Models\Proposal;

class StageController extends Controller {

    public function overview() {
        //dd((new \App\Models\Proposal)->company->email);
        return view('dashboard', ['proposals' => Proposal::all(), 'companies' => Company::first()]);
    }
}
