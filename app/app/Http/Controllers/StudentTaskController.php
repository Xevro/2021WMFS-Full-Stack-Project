<?php

namespace App\Http\Controllers;

use App\Http\Resources\StudentTaskCollection;
use App\Models\Task;
use Illuminate\Http\Request;

class StudentTaskController extends Controller {
    /**
     * Display a listing of the resource.
     *
     * @return StudentTaskCollection
     */
    public function index($id) {
        return new StudentTaskCollection(Task::where('student_id', $id)->get());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create() {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request) {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return StudentTaskCollection
     */
    public function show($studentId, $taskId) {
        return new StudentTaskCollection(Task::where('student_id', $studentId)->where('id', $taskId)->get());
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id) {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id) {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id) {
        //
    }
}
