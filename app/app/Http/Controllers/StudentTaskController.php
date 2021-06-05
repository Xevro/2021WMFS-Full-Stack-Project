<?php

namespace App\Http\Controllers;

use App\Http\Resources\StudentTaskResource;
use App\Models\Student;
use App\Models\Task;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class StudentTaskController extends Controller {
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Resources\Json\AnonymousResourceCollection
     */
    public function index($studentId) {
        Gate::authorize('api-view-tasks', $studentId);
        return StudentTaskResource::collection(Task::where('student_id', $studentId)->get());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return string[]
     */
    public function store(Request $request, $studentId) {
        // add task api/students/{student}/tasks
        Gate::authorize('api-add-task', $studentId);
        $request->validate([
            'task' => 'required|min:3|max:1000',
            'date' => 'required|date_format:Y-m-d'
        ]);
        $task = new Task($request->all());
        $task->student_id = $studentId;
        $task->save();
        return ['message' => 'The task has been created'];
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Resources\Json\AnonymousResourceCollection
     */
    public function show($studentId, $taskId) {
        Gate::authorize('api-view-tasks', $studentId);
        return StudentTaskResource::collection(Task::where('student_id', $studentId)->where('id', $taskId)->get());
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return string[]
     */
    public function update(Request $request, $studentId, $taskId) {
        // update task api/students/{student}/tasks/{task}
        Gate::authorize('api-update-task', $taskId);
        $reqdata = $request->all();
        $reqdata['updated_at'] = date('Y-m-d H:i:s');
        if (Task::where('id', $taskId)->where('student_id', $studentId)->update($reqdata)) {
            return ['message' => 'The student has been updated'];
        } else {
            return ['message' => 'Could not update the student details'];
        }
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

    /* ** WEB controller methodes ** */

    public function showStudentTasks($id) {
        Gate::authorize('view-student-tasks');
        $tasks = Task::where('student_id', $id)->get();
        return view('student_tasks', ['student' => Student::findOrFail($id), 'tasks' => $tasks, 'menuItem' => 'students', 'pageTitle' => 'Overzicht taken van student']);
    }
}
