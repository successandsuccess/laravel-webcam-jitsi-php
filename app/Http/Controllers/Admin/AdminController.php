<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\User;
use DataTables;

class AdminController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    public function index()
    {
        return redirect()->route('admin.dashboard.patientqueue');
    }

    public function patientqueue()
    {
        return view('admin.patientqueue');
    }

    public function selfdirectedvisits()
    {
        return view('admin.selfdirectedvisits');
    }

    public function patientdirectory(Request $request)
    {
        $patients = User::all();

        if ($request->ajax()) {
            $data = $patients;

            return DataTables::of($data)
                        ->addColumn(
                            'action', function($row) {
                                $editUrl = url('/admin/dashboard/patientdirectory/manage');
                                $btn = '<a href="'. $editUrl .'"><button class="btn btn-default w-110 color-blue btn-p">MANAGE</button></a>';
                                return $btn;
                            }
                        )
                        ->rawColumns(['action'])
                        ->make(true);
        }

        return view('admin.patientdirectory');
    }

    public function exercises()
    {
        return view('admin.exercises');
    }

    public function selfdirectedvisitsview()
    {
        return view('admin.selfdirectedvisitsview');
    }

    public function patientdirectorymanage() {
        return view('admin.patientdirectorymanage');
    }

}
