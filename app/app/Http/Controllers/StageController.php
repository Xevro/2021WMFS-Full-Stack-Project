<?php

namespace App\Http\Controllers;

use App\Models\Proposal;

class StageController extends Controller
{

    public function overview() {
        return view('dashboard', ['proposals' => Proposal::all()]);
    }
}
