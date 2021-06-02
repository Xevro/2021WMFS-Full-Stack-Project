<?php

namespace App\Http\Controllers;

use App\Models\Proposal;
use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;

class DashboardController extends Controller {

    public function overview(Request $request) {
        Gate::authorize('view-dashboard-page');
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
            if ($request->has('status_student') && $request->status_student == 'on') {
                $students = Student::where(function ($q) use ($request) {
                    $q->where('firstname', 'like', '%' . $request->search_student . '%')->orWhere('lastname', 'like', '%' . $request->search_student . '%');
                })->paginate(10);
            } else {
                $students = Student::where('mentor_id', Auth::user()->id)->where(function ($q) use ($request) {
                    $q->where('firstname', 'like', '%' . $request->search_student . '%')->orWhere('lastname', 'like', '%' . $request->search_student . '%');
                })->paginate(10);
            }
        } else {
            if ($request->has('status_student') && $request->status_student == 'on') {
                $students = Student::where(function ($q) use ($request) {
                    $q->where('firstname', 'like', '%' . $request->search_student . '%')->orWhere('lastname', 'like', '%' . $request->search_student . '%');
                })->paginate(10);
            } else {
                $students = Student::where('mentor_id', Auth::user()->id)->paginate(10);
            }
        }
        return view('dashboard', ['students' => $students, 'allStudents' => Student::all(), 'termStudent' => $request->search_student, 'statusStudent' => $request->status_student, 'proposals' => $proposals, 'proposalsApproved' => $proposalsApproved,
            'term' => $request->search, 'status' => $request->status, 'amountToCheck' => $amountToCheck, 'amountApproved' => $amountApproved, 'menuItem' => 'overzicht', 'pageTitle' => 'Overzicht stages']);
    }
}
