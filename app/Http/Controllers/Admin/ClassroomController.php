<?php

namespace App\Http\Controllers\Admin;

use App\Helpers\Helpers;
use App\Http\Controllers\Controller;
use App\Http\Requests\Classrooms\StoreClassrommRequest;
use App\Http\Requests\Classrooms\UpdateClassrommRequest;
use App\Models\Classroom;
use Illuminate\Http\Request;

class ClassroomController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $classrooms = Classroom::paginate(12);
        if (count($classrooms) > 0) {
            return Helpers::sendResponse(200, 'All ClassRooms', $classrooms);
        }
        return Helpers::sendResponse(200, 'No ClassRooms Found', []);
    }



    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreClassrommRequest $request)
    {
        $data = $request->validated();
        $classroom = Classroom::create($data);
        if ($classroom)
        {
            return Helpers::sendResponse(200, 'Classroom Created', $classroom);
        }
        return Helpers::sendResponse(400, 'Something Went Wrong', []);
    }



    /**
     * Display the specified resource.
     */
    public function show(Classroom $classroom)
    {
        if($classroom)
        {
            return Helpers::sendResponse(200, 'Classroom Retrieved Successfully', $classroom);
        }
        return Helpers::sendResponse(400, 'Something Went Wrong', []);
    }


    
    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateClassrommRequest $request, Classroom $classroom)
    {
        $data = $request->validated();
        $update = $classroom->update($data);
        if ($update)
        {
            return Helpers::sendResponse(200, 'Classroom Updated Successfully', $classroom);
        }
        return Helpers::sendResponse(400, 'Something Went Wrong', []);
    }



    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Classroom $classroom)
    {
        $classroom->delete();
        return Helpers::sendResponse(200, 'Classroom Deleted Successfully', []);
    }
}
