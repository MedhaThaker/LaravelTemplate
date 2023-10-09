<?php

namespace App\Http\Controllers\Admin\Master;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\States;
use App\Models\Districts;
use App\Models\Cities;
use DataTables;
use Crypt;
use Arr;
use App\Library\LogActivity;

class CitiesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // get states data
        $states = States::where('status', 'active')->select('id', 'state_name')->orderBy('id', 'DESC')->get();

        // view
        return view('admin/master/city', compact('states'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    // This function is for datatable
    public function data_table(Request $request)
    {
        // cities data along with states and districts in datatable   
        $cities = Cities::where('status', '!=', 'delete')->orderBy('id', 'DESC')->select('id', 'state_id', 'district_id', 'city_name', 'status')->with(['states', 'districts'])->get();

        if ($request->ajax()) {
            return DataTables::of($cities)
                ->addIndexColumn()
                ->addColumn('state_name', function ($row) {
                    if (!empty($row->state_id)) {
                        return $row->states->state_name;
                    } else {
                        return '-';
                    }
                })
                ->addColumn('district_name', function ($row) {
                    if (!empty($row->district_id)) {
                        return $row->districts->district_name;
                    } else {
                        return '-';
                    }
                })
                ->addColumn('action', function ($row) {
                    $actionBtn = '<a href="' . url('admin/city/' . Crypt::encrypt($row->id) . '/edit') . '"> <button type="button" data-id="' . Crypt::encrypt($row->id) . '" class="btn btn-warning btn-xs Edit_button" title="Edit"><i class="fa fa-pencil"></i></button></a> 
                                <a href="javascript:void(0)" data-id="' . $row->id . '" data-table="athletekar_master_cities" data-flash="City Deleted Successfully!" class="btn btn-danger delete btn-xs" title="Delete"><i class="fa fa-trash"></i></a>';
                    return $actionBtn;
                })
                ->addColumn('status', function ($row) {
                    if ($row->status == 'active') {
                        $statusActiveBtn = '<a href="javascript:void(0)"  data-id="' . Crypt::encrypt($row->id) . '" data-table="athletekar_master_cities" data-flash="Status Changed Successfully!"  class="change-status"  ><i class="fa fa-toggle-on tgle-on  status_button" aria-hidden="true" title=""></i></a>';
                        return $statusActiveBtn;
                    } else {
                        $statusBlockBtn = '<a href="javascript:void(0)"  data-id="' . Crypt::encrypt($row->id) . '" data-table="athletekar_master_cities" data-flash="Status Changed Successfully!" class="change-status" ><i class="fa fa-toggle-off tgle-off  status_button" aria-hidden="true" title=""></></a>';
                        return $statusBlockBtn;
                    }
                })
                ->rawColumns(['state_name', 'district_name', 'action', 'status'])
                ->make(true);
        }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // validations
        $request->validate([
            'district_id' => 'required|numeric',
            'state_id' => 'required|numeric',
            'city_name' => 'required'
        ]);
        $input = $request->all();
        $txtpkey = !empty($input['txtpkey']) ? Crypt::decrypt($input['txtpkey']) : '';
        $id = $request->txtpkey;

        if (!empty($id)) {
            $check_id = Cities::where('id', '!=', $txtpkey)
            ->orderBy('id', 'DESC')
                ->where('state_id', '=', $request->state_id)
                ->where('district_id', '=', $request->district_id)
                ->where('city_name', '=', $request->city_name)
                ->where('status', '!=', 'delete')
                ->first();
            if (!empty($check_id)) {
                return redirect('/admin/city')->with('error', 'This city already exists under this state and district.');
            } else {
                //update City
                $input['modified_by'] = auth()->guard('admin')->user()->id;
                $input['modified_ip_address'] = $request->ip();
                $input = Arr::except($input, ['_token', 'txtpkey']);
                $Md_city = Cities::where('id', $txtpkey)->update($input);
                $new_data = Cities::find($txtpkey);
                LogActivity::AdminLog(json_encode($new_data), json_encode($id), 'City', 'update', 'admin');
                return redirect('/admin/city')->with('success', 'City updated successfully!');
            }
        } else {
            //create City
            $check_duplicate = Cities::where(['district_id' => $input['district_id'], 'state_id' => $input['state_id'], 'city_name' => $input['city_name']])->where('status', '!=', 'delete')->get();
            if (($check_duplicate)->isEmpty()) {
                $input['created_by'] = auth()->guard('admin')->user()->id;
                $input['created_ip_address'] = $request->ip();
                $Md_city = Cities::create($input);
                LogActivity::AdminLog(json_encode($Md_city), Null, 'City', 'create', 'admin');
                return redirect('/admin/city')->with('success', 'City added successfully!');
            } else {
                return redirect('/admin/city')->with('error', 'This City already exists under this state and district.');
            }
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    // check duplicate data for client side
    public function city_exists(Request $request)
    {

        if ($request->ajax()) {
            $city_name = Cities::where('city_name', '=', $request->city_name)
                ->where('state_id', $request->state_id)
                ->where('district_id', $request->district_id)
                ->where('status', '!=', 'delete')
                ->select('city_name');
            if (!empty($request->txtpkey)) {
                $city_name = $city_name->where('id', '!=', Crypt::decrypt($request->txtpkey));
            }
            $city_name = $city_name->first();

            return !empty($city_name) ? 'false' : 'true';
        } else {
            return 'No direct scripts are allowed';
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        // decrypt id and get data from all tables
        $id = Crypt::decrypt($id);
        $city = Cities::find($id, ['district_id', 'state_id', 'id', 'city_name']);

        if (!empty($city)) {
            $city['txtpkey'] = Crypt::encrypt($city->id);
        }
        $states = States::where(['status' => 'active'])
            ->select('id', 'state_name')
            ->orderBy('id', 'DESC')
            ->get();

        $districts = Districts::where(['status' => 'active'])
            ->select('id', 'district_name')
            ->orderBy('id', 'DESC')
            ->get();

        return view('admin/master/city', compact('states', 'districts', 'city'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
