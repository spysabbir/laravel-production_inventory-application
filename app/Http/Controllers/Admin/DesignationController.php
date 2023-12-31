<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Designation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Yajra\DataTables\Facades\DataTables;

class DesignationController extends Controller
{
    function __construct()
    {
        $this->middleware('permission:designation.list|designation.create|designation.edit|designation.delete', ['only' => ['index','show']]);
        $this->middleware('permission:designation.create', ['only' => ['create','store']]);
        $this->middleware('permission:designation.edit', ['only' => ['edit','update', 'status']]);
        $this->middleware('permission:designation.delete', ['only' => ['destroy']]);
    }

    public function index(Request $request)
    {
        if ($request->ajax()) {
            $query = Designation::select('designations.*');

            $query->orderBy('created_at', 'desc');

            $designations = $query->get();

            return DataTables::of($designations)
                ->addIndexColumn()
                ->addColumn('action', function ($row) {
                    $btn = '<button type="button" data-id="' . $row->id . '" class="btn text-white bg-purple btn-sm editBtn" data-toggle="modal" data-target="#editModal"><i class="fe fe-edit"></i></button>
                            <button type="button" data-id="' . $row->id . '" class="btn text-white bg-yellow btn-sm deleteBtn"><i class="fe fe-trash"></i></button>';
                    return $btn;
                })
                ->rawColumns(['action'])
                ->make(true);
        }

        return view('admin.designation.index');
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'designation_name' => 'required|string|max:255|unique:designations,designation_name',
        ]);

        if($validator->fails()){
            return response()->json([
                'status' => 400,
                'error'=> $validator->errors()->toArray()
            ]);
        }else{
            Designation::create($request->all() + [
                'created_by' => Auth::user()->id,
            ]);

            return response()->json([
                'status' => 200,
            ]);
        }
    }

    public function edit(string $id)
    {
        $designation = Designation::where('id', $id)->first();
        return response()->json($designation);
    }

    public function update(Request $request, string $id)
    {
        $validator = Validator::make($request->all(), [
            'designation_name' => 'required|string|max:255|unique:designations,designation_name,' . $id,
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => 400,
                'error' => $validator->errors()->toArray()
            ]);
        } else {
            $designation = Designation::findOrFail($id);
            $designation->update($request->all() + [
                'updated_by' => Auth::user()->id,
            ]);

            return response()->json([
                'status' => 200,
            ]);
        }
    }

    public function destroy(string $id)
    {
        $designation = Designation::findOrFail($id);
        $designation->delete();
    }
}
