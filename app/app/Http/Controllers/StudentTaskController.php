<?php

namespace App\Http\Controllers;

use App\Http\Resources\StudentTaskCollection;
use App\Http\Resources\StudentTaskResource;
use App\Models\Task;
use Illuminate\Http\Request;

class StudentTaskController extends Controller {
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Resources\Json\AnonymousResourceCollection
     */
    public function index($id) {
        return StudentTaskResource::collection(Task::where('student_id', $id)->get());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create() {
        // api/students/{student}/tasks/create
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request) {
        // add task api/students/{student}/tasks
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return StudentTaskResource
     */
    public function show($studentId, $taskId) {
        return new StudentTaskResource(Task::where('student_id', $studentId)->where('id', $taskId)->get());
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($studentId, $taskId) {
        // edit task api/students/{student}/tasks/{task}/edit
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $studentId, $taskId) {
        // update task api/students/{student}/tasks/{task}
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id) {
        // api/students/{student}/tasks/{task}
    }
}
