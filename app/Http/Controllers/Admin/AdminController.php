<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\User;
use DataTables;
use App\Dx;
use App\Rx;

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
        // $patients = User::latest()->get();
        // dd($patients);

        if ($request->ajax()) {
            $data = $patients;

            return DataTables::of($data)
                        ->addColumn(
                            'action', function($row) {
                                $editUrl = url('/admin/dashboard/patientdirectory/manage/'.$row->id);
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
        $rxs = Rx::all();

        return view('admin.exercises', compact('rxs'));
    }

    public function selfdirectedvisitsview()
    {
        return view('admin.selfdirectedvisitsview');
    }

    public function patientdirectorymanage(Request $request, $id) 
    {
        // dd($id);
        $patient = User::where('id', $id)
                    ->with(
                            'getProvider1', 
                            'getProvider2', 
                            'getProvider3',

                            'getDx1',
                            'getDx2',
                            'getDx3',
                            'getDx4',
                            'getDx5',

                            'getRx1',
                            'getRx2',
                            'getRx3',
                            'getRx4',
                            'getRx5'
                        )
                    ->first();
        // dd($patient);

        // get all rxs from current dx using dx_no
        $current_dx_id = $patient->dx_1;
        $dxRxs = Rx::where('dx_no', $current_dx_id)->get();

        // get all dxs from dxs table
        $allDxs = Dx::all();

        // get all rxs from rxs table
        $allRxs = Rx::all();
        return view('admin.patientdirectorymanage', compact('patient', 'dxRxs', 'allDxs', 'allRxs'));
    }

    // remove the assgined exercises in dxs
    public function patientdirectorymanageRemove(Request $request)
    {
        // dd($request->patientId);
        $patient = User::with('getDx1')->find($request->patientId);
      
        $patient['rx_'.$request->index] = null;
        $patient->save();

        return 'Success';
        

    }

    // assign the exercises in dxs
    public function patientdirectorymanageAssign(Request $request)
    {
        // dd($request->rx_id);
        $result = [];
        $patient = User::with('getDx1')->find($request->patientId);
        
        if ( $patient->rx_1 == null ) {
            $patient->rx_1 = $request->rx_id;
            $patient->save();
            $result['info'] = 'Success';
            $result['index'] = 1;
        } else if ( $patient->rx_2 == null ) {
            $patient->rx_2 = $request->rx_id;
            $patient->save();
            $result['info'] = 'Success';
            $result['index'] = 2;
        } else if ( $patient->rx_3 == null ) {
            $patient->rx_3 = $request->rx_id;
            $patient->save();
            $result['info'] = 'Success';
            $result['index'] = 3;
        } else if ( $patient->rx_4 == null ) {
            $patient->rx_4 = $request->rx_id;
            $patient->save();
            $result['info'] = 'Success';
            $result['index'] = 4;
        } else if ( $patient->rx_5 == null ) {
            $patient->rx_5 = $request->rx_id;
            $patient->save();
            $result['info'] = 'Success';
            $result['index'] = 5;
        } else {
            $result['info'] = 'Full';
        }

        return $result;
        
    }

}
