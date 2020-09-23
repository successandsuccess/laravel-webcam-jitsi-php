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

                            'getDx1.getRx1',
                            'getDx1.getRx2',
                            'getDx1.getRx3',
                            'getDx1.getRx4',
                            'getDx1.getRx5',

                            'getDx2.getRx1',
                            'getDx2.getRx2',
                            'getDx2.getRx3',
                            'getDx2.getRx4',
                            'getDx2.getRx5',

                            'getDx3.getRx1',
                            'getDx3.getRx2',
                            'getDx3.getRx3',
                            'getDx3.getRx4',
                            'getDx3.getRx5',

                            'getDx4.getRx1',
                            'getDx4.getRx2',
                            'getDx4.getRx3',
                            'getDx4.getRx4',
                            'getDx4.getRx5',

                            'getDx5.getRx1',
                            'getDx5.getRx2',
                            'getDx5.getRx3',
                            'getDx5.getRx4',
                            'getDx5.getRx5',
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
        // dd($patient);
        $dx_id = $patient->getDx1->dx_id;

        $dx = Dx::find($dx_id);
        // dd($dx['rx_'.$request->index]);
        $dx['rx_'.$request->index] = null;
        $dx->save();

        return 'Success';
        

    }

    // assign the exercises in dxs
    public function patientdirectorymanageAssign(Request $request)
    {
        // dd($request->rx_id);
        $result = [];
        $patient = User::with('getDx1')->find($request->patientId);
        $dx_id = $patient->getDx1->dx_id;

        $dx = Dx::find($dx_id);
        
        if ( $dx->rx_1 == null ) {
            $dx->rx_1 = $request->rx_id;
            $dx->save();
            $result['info'] = 'Success';
            $result['index'] = 1;
        } else if ( $dx->rx_2 == null ) {
            $dx->rx_2 = $request->rx_id;
            $dx->save();
            $result['info'] = 'Success';
            $result['index'] = 2;
        } else if ( $dx->rx_3 == null ) {
            $dx->rx_3 = $request->rx_id;
            $dx->save();
            $result['info'] = 'Success';
            $result['index'] = 3;
        } else if ( $dx->rx_4 == null ) {
            $dx->rx_4 = $request->rx_id;
            $dx->save();
            $result['info'] = 'Success';
            $result['index'] = 4;
        } else if ( $dx->rx_5 == null ) {
            $dx->rx_5 = $request->rx_id;
            $dx->save();
            $result['info'] = 'Success';
            $result['index'] = 5;
        } else {
            $result['info'] = 'Full';
        }

        return $result;
        
    }

}
