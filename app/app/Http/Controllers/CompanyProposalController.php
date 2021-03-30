<?php

namespace App\Http\Controllers;

use App\Http\Resources\ProposalResource;
use App\Models\Proposal;
use Illuminate\Http\Request;

class CompanyProposalController extends Controller {
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Resources\Json\AnonymousResourceCollection
     */
    public function index($id) {
        // api/companies/{id}/proposals
        // show all proposals of that company
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
        $request->validate([
            'description' => 'required|min:3|max:1000',
            'start_period' => 'required|date_format:Y-m-d',
            'end_period' => 'required|date_format:Y-m-d'
        ]);
        Proposal::create(['description' => $request->description, 'start_period' => $request->start_period,
            'end_period' => $request->end_period, 'company_id' => $id]);
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
        return new ProposalResource(Proposal::where('company_id', $companyId)->where('id', $proposalId)->first());
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return string[]
     */
    public function update(Request $request, $companyId, $proposalId) {
        $reqdata = $request->all();
        $reqdata['updated_at'] = date('Y-m-d H:i:s');
        // only possible if company owns this proposal
        if (Proposal::where('id', $proposalId)->update($reqdata)) {
            return ['message' => 'The proposal has been updated'];
        } else {
            return ['message' => 'Could not update the proposal details'];
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($companyId, $proposalId) {
        //
    }
}
