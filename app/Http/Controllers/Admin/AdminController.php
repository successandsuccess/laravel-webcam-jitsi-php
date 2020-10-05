<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\User;
use App\PatientActivity;
use App\Reviews;
use App\Screenshot;
use App\Meetings;
use App\VideoUploads;
use DataTables;
use App\Dx;
use App\Rx;

class AdminController extends Controller
{
    public $RecordingsToReview;
    public $PatientQueueCounts;

    public function __construct()
    {
        $this->middleware('auth:admin');

        $recordings = PatientActivity::with('getUser', 'getVideoUploads', 'getMeetings', 'getProvider')
                                                        ->where('type', 2) // only self directed videos
                                                        ->where('completion', 0)
                                                        ->get();
        $this->RecordingsToReview = count($recordings);

        $queues = PatientActivity::where('type', 1) // only 1:1 meeting
                                   ->where('completion', 0)
                                   ->get();
        $this->PatientQueueCounts = count($queues);
    }

    public function index()
    {
        return redirect()->route('admin.dashboard.patientqueue');
    }

    public function patientqueue(Request $request)
    {
        $recordingsToReview = $this->RecordingsToReview;
        $patientQueueCount = $this->PatientQueueCounts;

        $currentQueues = PatientActivity::with('getUser', 'getVideoUploads', 'getMeetings', 'getProvider')
                                        ->where('type', 1)
                                        ->where('completion', 0)
                                        ->get();

        $pastQueues = PatientActivity::with('getUser', 'getVideoUploads', 'getMeetings', 'getProvider')
                                        ->where('type', 1)
                                        ->where('completion', 1)
                                        ->get();

        if ($request->ajax()) {
            return Datatables::of($pastQueues)
                ->editColumn('appoint_date', function ($log) {
                    return $log->appoint_time->format('Y-m-d');
                })
                ->editColumn('appoint_time', function ($log) {
                    return $log->appoint_time->format('H:i:s');
                })
                ->editColumn('patient', function ($log) {
                    return $log->getUser->name;
                })
                ->editColumn('length', function ($log) {
                    $Hour = (int) ($log->length / 60);
                    if ( strlen($Hour) == 1 ) {
                        $Hour = "0".$Hour;
                    }
                    $Minute = $log->length - $Hour;
                    if ( strlen($Minute) == 1 ) {
                        $Minute = "0".$Minute;
                    }
                    return $Hour.":".$Minute." min";
                })
                ->addColumn('action', function($row){
                    // $editUrl = url('/admin/dashboard/selfdirectedvisits/view/'.$row->id);
                    $editUrl = '#';
                    $btn = '<a href="' . $editUrl . '"><button class="btn btn-default w-110 color-blue btn-p">DETAILS</button></a>';
                    return $btn;
                })
                ->rawColumns(['action'])
                ->make(true);
        }

        return view('admin.patientqueue', compact('recordingsToReview', 'patientQueueCount', 'currentQueues', 'pastQueues'));
    }

    public function selfdirectedvisits(Request $request)
    {
        $recordingsToReview = $this->RecordingsToReview;
        $patientQueueCount = $this->PatientQueueCounts;
        // get activities from patient Activities
        $availablePatientActivities = PatientActivity::with('getUser', 'getVideoUploads', 'getMeetings', 'getProvider')
                                                        ->where('type', 2) // only self directed videos
                                                        ->where('completion', 0)
                                                        ->get();

        $pastPaitientActivities = PatientActivity::with('getUser', 'getVideoUploads', 'getMeetings', 'getProvider')
                                                    ->where('type', 2) // only self directed videos
                                                    ->where('completion', 1)
                                                    ->get();
        // dd($patientActivities);

        if ($request->ajax()) {
            return Datatables::of($pastPaitientActivities)
                ->editColumn('appoint_date', function ($log) {
                    return $log->appoint_time->format('Y-m-d');
                })
                ->editColumn('appoint_time', function ($log) {
                    return $log->appoint_time->format('H:i:s');
                })
                ->editColumn('patient', function ($log) {
                    return $log->getUser->name;
                })
                ->editColumn('length', function ($log) {
                    $Hour = (int) ($log->length / 60);
                    if ( strlen($Hour) == 1 ) {
                        $Hour = "0".$Hour;
                    }
                    $Minute = $log->length - $Hour;
                    if ( strlen($Minute) == 1 ) {
                        $Minute = "0".$Minute;
                    }
                    return $Hour.":".$Minute." min";
                })
                ->addColumn('action', function($row){
                    $editUrl = url('/admin/dashboard/selfdirectedvisits/view/'.$row->id);
                    $btn = '<a href="' . $editUrl . '"><button class="btn btn-default w-110 color-blue btn-p">VIEW</button></a>';
                    return $btn;
                })
                ->rawColumns(['action'])
                ->make(true);
        }

        return view('admin.selfdirectedvisits', compact('availablePatientActivities', 'pastPaitientActivities', 'recordingsToReview', 'patientQueueCount'));
    }

    public function patientdirectory(Request $request)
    {
        $recordingsToReview = $this->RecordingsToReview;
        $patientQueueCount = $this->PatientQueueCounts;
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

        return view('admin.patientdirectory', compact('recordingsToReview', 'patientQueueCount'));
    }

    public function exercises()
    {
        $recordingsToReview = $this->RecordingsToReview;
        $patientQueueCount = $this->PatientQueueCounts;
        $rxs = Rx::all();

        return view('admin.exercises', compact('rxs', 'recordingsToReview', 'patientQueueCount'));
    }

    public function selfdirectedvisitsview(Request $request, $activityId)
    {
        $recordingsToReview = $this->RecordingsToReview;
        $patientQueueCount = $this->PatientQueueCounts;
        $patientActivity = PatientActivity::with(
            'getUser', 
            'getVideoUploads', 
            'getMeetings', 
            'getProvider',
            'getUser.getRx1',
            'getUser.getRx2',
            'getUser.getRx3',
            'getUser.getRx4',
            'getUser.getRx5'
            )->find($activityId);
        // dd($patientActivity);
        return view('admin.selfdirectedvisitsview', compact('patientActivity', 'recordingsToReview', 'patientQueueCount'));
    }

    // check to see recording to review
    public function checkrecordingview(Request $request)
    {
        // dd($request->activityId);
        $patientActivity = PatientActivity::find($request->activityId);
        $patientActivity->completion = 1;
        $patientActivity->save();
        return 'Success';
    }

    public function patientdirectorymanage(Request $request, $id) 
    {
        // dd($id);
        $recordingsToReview = $this->RecordingsToReview;
        $patientQueueCount = $this->PatientQueueCounts;
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

        // get patient log from patient activities
        $patientLogs = PatientActivity::where('user_id', $id)
                        ->with(
                            'getMeetings',
                            'getVideoUploads', 
                            'getUser', 
                            'getProvider'
                            )
                        ->get();

        if ($request->ajax()) {
            return Datatables::of($patientLogs)
                ->editColumn('appoint_date', function ($log) {
                    return $log->appoint_time->format('Y-m-d');
                })
                ->editColumn('appoint_time', function ($log) {
                    return $log->appoint_time->format('H:i:s');
                })
                ->editColumn('type', function ($log) {
                    return $log->type == 2 ? 'Self Directed' : 'One on One';
                })
                ->editColumn('length', function ($log) {
                    $Hour = (int) ($log->length / 60);
                    if ( strlen($Hour) == 1 ) {
                        $Hour = "0".$Hour;
                    }
                    $Minute = $log->length - $Hour;
                    if ( strlen($Minute) == 1 ) {
                        $Minute = "0".$Minute;
                    }
                    return $Hour.":".$Minute." min";
                })
                ->addColumn('action', function($row){
                    $editUrl = url('/admin/dashboard/selfdirectedvisits/view/'.$row->id);
                    $btn = '<a href="' . $editUrl . '"><button class="btn btn-default w-110 color-blue btn-p">VIEW</button></a>';
                    return $btn;
                })
                ->rawColumns(['action'])
                ->make(true);
        }
        // dd($patientLogs);
        return view('admin.patientdirectorymanage', compact('patient', 'dxRxs', 'allDxs', 'allRxs', 'recordingsToReview', 'patientQueueCount'));
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
