<?php

namespace App\Http\Controllers;

use App\Http\Resources\StudentLikeResource;
use App\Models\Like;
use App\Models\Proposal;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;

class StudentLikeController extends Controller {
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Resources\Json\AnonymousResourceCollection
     */
    public function index($studentId) {
        Gate::authorize('api-view-student-likes', $studentId);
        return StudentLikeResource::collection(Like::where('student_id', $studentId)->get());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return string[]
     */
    public function store(Request $request, $studentId) {
        Gate::authorize('api-add-student-like', $studentId);
        if (Proposal::where('id', $request->proposal_id)->where('visibility', 1)->count() > 0) {
            $request->validate([
                'student_id' => 'required|exists:students,id|numeric',
                'proposal_id' => 'required|exists:proposals,id|numeric'
            ]);
            $like = new Like($request->all());
            $like->student_id = $studentId;
            $like->save();
            return ['message' => 'The like has been created'];
        } else {
            return ['message' => 'The like could not been created'];
        }
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return StudentLikeResource
     */
    public function show($studentId, $proposalId) {
        Gate::authorize('api-view-student-like', $studentId);
        if (!Like::where('student_id', $studentId)->where('proposal_id', $proposalId)->first()) {
            return ['data' => []];
        }
        return new StudentLikeResource(Like::where('student_id', $studentId)->where('proposal_id', $proposalId)->first());
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return string[]
     */
    public function update(Request $request) {
        // no need to update the like, just delete it
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return string[]
     */
    public function destroy($studentId, $proposalId) {
        Gate::authorize('api-delete-like', $studentId);
        if (Like::where('student_id', Auth::user()->student->id)->where('proposal_id', $proposalId)->delete()) {
            return ['message' => 'The like has been deleted'];
        } else {
            return ['message' => 'Could not delete the like record'];
        }
    }
}
