<?php

namespace App\Http\Controllers;

use App\Http\Resources\ProposalResource;
use App\Models\Company;
use App\Models\Proposal;
use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;

class CompanyProposalController extends Controller {
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Resources\Json\AnonymousResourceCollection
     */
    public function index($id) {
        // api/companies/{id}/proposals
        // show all proposals of that company
        Gate::authorize('api-view-proposals');
        return ProposalResource::collection(Proposal::where('company_id', $id)->get());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return string[]
     */
    public function store(Request $request, $id) {
        // add api/companies/{id}/proposals
        // add proposal to company
        Gate::authorize('api-add-proposal');
        $request->validate([
            'description' => 'required|min:3|max:1000',
            'start_period' => 'required|date_format:Y-m-d',
            'end_period' => 'required|date_format:Y-m-d',
        ]);
        $proposal = new Proposal($request->all());
        $proposal->company()->associate(Auth::user()->company->id);
        $proposal->save();
        return ['message' => 'The proposal has been created'];
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return ProposalResource
     */
    public function show($companyId, $proposalId) {
        // api/companies/{company}/proposals/{proposal}
        // show specific proposal of specific company
        Gate::authorize('api-view-proposal');
        return new ProposalResource(Proposal::where('company_id', $companyId)->where('id', $proposalId)->where('visibility', 1)->first());
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return string[]
     */
    public function update(Request $request, $companyId, $proposalId) {
        Gate::authorize('api-update-proposal', $companyId);
        $reqdata = $request->all();
        $reqdata['updated_at'] = date('Y-m-d H:i:s');
        if (Proposal::where('id', $proposalId)->where('company_id', $companyId)->update($reqdata)) {
            return ['message' => 'The proposal has been updated'];
        } else {
            return ['message' => 'Could not update the proposal details'];
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return string[]
     */
    public function destroy($companyId, $proposalId) {
        Gate::authorize('api-delete-proposal', $companyId);
        // also make option to inform the company that it has been declined
        if (Proposal::where('company_id', Auth::user()->company->id)->where('id', $proposalId)->first()) {
            if (Proposal::destroy($proposalId)) {
                return ['message' => 'The proposal has been deleted'];
            } else {
                return ['message' => 'Could not delete the proposal'];
            }
        } else {
            return ['message' => 'Could not delete the proposal'];
        }
    }

    public function proposalDetail($id) {
        Gate::authorize('view-proposal-details');
        $proposal = Proposal::with('company')->findOrFail($id);
        return view('proposal_detail', ['proposal' => $proposal, 'menuItem' => 'overzicht', 'pageTitle' => 'stagevoorstel']);
    }

    public function showAddProposal() {
        Gate::authorize('add-proposal');
        return view('proposal_add', ['companies' => Company::all(), 'menuItem' => 'addProposal', 'pageTitle' => 'Voeg Voorstel toe']);
    }

    public function addProposal(Request $request) {
        Gate::authorize('add-proposal');
        $request->validate([
            'description' => 'required|min:3|max:1000',
            'start_period' => 'required|date_format:Y-m-d',
            'end_period' => 'required|date_format:Y-m-d',
            'company_id' => 'required|exists:companies,id'
        ]);
        Proposal::create($request->all());

        return redirect('dashboard');
    }

    public function showProposalDelete($id) {
        Gate::authorize('delete-proposal');
        $proposal = Proposal::findOrFail($id);
        return view('delete_proposal', ['proposal' => $proposal, 'menuItem' => 'companies', 'pageTitle' => 'Verwijder voorstel']);
    }

    public function proposalDelete(Request $request) {
        Gate::authorize('delete-proposal');
        // also make option to inform the company that it has been declined
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
        Gate::authorize('view-assign-to-proposal');
        return view('assign_student_to_proposal', ['proposals' => Proposal::doesntHave('students')->get(), 'students' => Student::where('proposal_id', 0)->where('allowed', 1)->get(), 'menuItem' => 'AssignProposal', 'pageTitle' => 'Koppel student aan een voorstel']);
    }

    public function assignStudentToProposal(Request $request) {
        Gate::authorize('view-assign-to-proposal');
        Student::where('id', $request->student_id)->update(['proposal_id' => $request->proposal_id, 'approved' => 'Goedgekeurd']);
        Proposal::where('id', $request->proposal_id)->update(['visibility' => 1, 'status' => 'Goedgekeurd']);
        return redirect('dashboard/student/' . $request->student_id);
    }

    public function evaluateProposal($id) {
        Gate::authorize('evaluate-proposal');
        $proposal = Proposal::findOrFail($id);
        return view('approve_proposal', ['proposal' => $proposal, 'menuItem' => 'companies', 'pageTitle' => 'Keur voorstel goed']);
    }

    public function approveProposal($id) {
        Gate::authorize('evaluate-proposal');
        Proposal::where('id', $id)->update(['visibility' => 1, 'status' => 'Goedgekeurd']);
        return redirect('dashboard/company/proposal/' . $id);
    }
}
