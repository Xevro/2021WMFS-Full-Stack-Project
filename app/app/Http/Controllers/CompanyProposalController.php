<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CompanyProposalController extends Controller {
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id) {
        // api/companies/{company}/proposals
        // show all proposals of company
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request) {
        // add api/companies/{company}/proposals
        // add proposal to company
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($companyId, $proposalId) {
        // api/companies/{company}/proposals/{proposal}
        // show specific proposal of specific company
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $companyId, $proposalId) {
        //
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
