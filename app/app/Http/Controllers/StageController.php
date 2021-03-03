<?php

namespace App\Http\Controllers;

use App\Models\Company;
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
                $q->where('name', 'like', '%' . $request->search . '%')->where('visibility', '=', (bool) $request->status);
            })->paginate(8);
        } else {
            $proposals = Proposal::with('company')->paginate(8);
        }
        return view('dashboard', ['proposals' => $proposals, 'term' => $request->search, 'status' => $request->status, 'amountToCheck' => $amountToCheck,
            'amountApproved' => $amountApproved, 'menuItem' => 'overzicht', 'pageTitle' => 'Overzicht stages']);
    }


    public function students() {
        $students = Student::paginate(8);
        return view('students', ['students' => $students, 'menuItem' => 'students', 'pageTitle' => 'Overzicht studenten']);
    }

    public function companies() {
        $companies = Company::paginate(8);
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

        $proposalsLiked = Proposal::with('students')->whereHas('Likes', function (Builder $query) use ($id) {
            $query->where('student_id', $id);
        })->get();
        return view('student_detail', ['student' => $student, 'proposals' => $proposals, 'proposalsLiked' => $proposalsLiked, 'menuItem' => 'students', 'pageTitle' => 'Detail Student']);
    }

    public function proposalDetail($id) {
        $proposal = Proposal::with('company')->where('id', $id)->first();
        return view('proposal_detail', ['proposal' => $proposal, 'menuItem' => 'overzicht', 'pageTitle' => 'stagevoorstel']);
    }
}
