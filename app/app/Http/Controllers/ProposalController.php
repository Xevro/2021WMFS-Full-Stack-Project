<?php

namespace App\Http\Controllers;

use App\Http\Resources\ProposalCollection;
use App\Http\Resources\ProposalResource;
use App\Models\Proposal;
use Illuminate\Http\Request;

class ProposalController extends Controller {
    /**
     * Display a listing of the resource.
     *
     * @return ProposalCollection
     */
    public function index() {
        return new ProposalCollection(Proposal::all());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request) {
        // save a proposal
        $request->validate([
            'description' => 'required|min:3|max:1000',
            'start_period' => 'required|date_format:Y-m-d',
            'end_period' => 'required|date_format:Y-m-d',
            'company_id' => 'required|exists:companies,id',
            'mentor_id' => 'required|exists:mentors,id'
        ]);
        $proposal = new Proposal($request->all());
        $proposal->save();
        return ['message' => 'The proposal has been created'];
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return ProposalResource
     */
    public function show($id) {
        return new ProposalResource(Proposal::findOrFail($id));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id) {
        // update a proposal
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id) {
        // delete a proposal
        // only possible if company owns this proposal
    }
}
