<?php

namespace App\Http\Controllers;

use App\Models\SiCalPoint;
use App\Models\SiRefEqInfo;
use Illuminate\Http\Request;
use App\Models\SiRefEqDetail;
use App\DataTables\SiRefEqInfoDataTable;

class SiRefEqInfoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(SiRefEqInfoDataTable $siRefEqInfoDataTable)
    {
        // return $siRefEqInfoDataTable->render('si_ref_eq_infos.index');
        $siRefEqInfos = SiRefEqInfo::paginate(10);
        $uniqueEqNames = SiRefEqInfo::distinct()->pluck('eq_name');
        return view('si_ref_eq_infos.index', compact('uniqueEqNames', 'siRefEqInfos'));
    }

    public function getSensorIdsByEqName(Request $request)
    {
        $eqName = $request->input('eq_name');
        $sensorIds = SiRefEqInfo::where('eq_name', $eqName)
            ->get()
            ->map(function ($item) {
                return $item->sensor_id;
            })->unique()->toArray(); // Ensuring the list is not duplicated
        // dd($sensorIds);

        return response()->json($sensorIds);
    }


    public function getDivRowIdsByEqName(Request $request)
    {
        $eqName = $request->input('eq_name');
        $eqSensor = $request->input('eq_sensor');
        $divRows = SiRefEqInfo::where('eq_name', $eqName)
            ->where('sensor_id', $eqSensor)
            ->get()->toArray(); // Ensuring the list is not duplicated
        // dd($divRows);
        return response()->json($divRows);
    }


    public function siRefEqInfosTable(Request $request)
    {
        // dd($request->all());
        $siRefEqInfos = SiRefEqInfo::where('eq_name', $request->eq_name)
            ->where('sensor_id', $request->eq_sensor)
            ->where('res', 'like', $request->eq_res)
            ->where('cal_date', $request->eq_cal)
            ->where('split_no', $request->eq_split)
            ->get();
        // dd($siRefEqInfos);

        return response()->json($siRefEqInfos);
    }

    public function getEquipmentDetailsPage(){


        $equipmentDetails = SiRefEqDetail::all();

        // Pass the data to the view
        return view('si_ref_eq_infos.details.index', compact('equipmentDetails'));
        // dd('here');
    }

    public function getEquipmentPoints(Request $request)
    {
        $eqName = SiRefEqInfo::where('eq_name', $request->eq_name);
        $eq_id = $eqName->first()->eq_id;
        $sensor_id = $request->query('sensor_id');
        // $cal_date = $request->query('cal_date');
        $split_no = $request->query('split_no');
        // dd($eq_id);

        // dd(SiCalPoint::first());
        $points = SiCalPoint::where('eq_id', $eq_id)
            ->where('sensor_id', $sensor_id)
            // ->where('cal_date', $cal_date)
            ->where('split_no', $split_no)
            ->get();
        // dd($points);

        return response()->json($points);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('si_ref_eq_infos.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $validatedData = $request->validate([
            'eq_name' => 'required|string|max:255',
            'brand' => 'required|string|max:255',
            'model' => 'required|string|max:255',
            'serial_no' => 'required|string|max:255',
            'eq_id' => 'required|string|max:255',
            'sensor_sn' => 'required|string|max:255',
            'sensor_id' => 'required|string|max:255',
            'split_no' => 'required|numeric',
            'c0' => 'nullable|numeric',
            'c1' => 'nullable|numeric',
            'c2' => 'nullable|numeric',
            'c3' => 'nullable|numeric',
            'c4' => 'nullable|numeric',
            'Serr' => 'nullable|numeric',
            'range_min' => 'required|numeric',
            'range_max' => 'required|numeric|gt:range_min', // Ensure range_max is greater than range_min
            'cal_date' => 'required|date_format:Y-m-d',
            'uncert' => 'required|string|max:255',
            'cmc' => 'required|string|max:255',
            'res' => 'required|string|max:255',
            'unit' => 'required|string|max:255',
        ]);

        // Set default values for nullable fields
        $validatedData['c0'] = $validatedData['c0'] ?? 0;
        $validatedData['c1'] = $validatedData['c1'] ?? 0;
        $validatedData['c2'] = $validatedData['c2'] ?? 0;
        $validatedData['c3'] = $validatedData['c3'] ?? 0;
        $validatedData['c4'] = $validatedData['c4'] ?? 0;
        $validatedData['Serr'] = $validatedData['Serr'] ?? 0;






        // dd($validatedData);

        SiRefEqInfo::create($validatedData);

        return redirect()->route('si_ref_eq_infos.index')->with('success', 'SI Reference Equipment created successfully.');
    }



    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
        // $siRefEqInfo = SiRefEqInfo::find($id);
        $siRefEqInfo = SiRefEqInfo::findOrFail($id);
        return view('si_ref_eq_infos.show', compact('siRefEqInfo'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
        return view('si_ref_eq_infos.edit', compact('siRefEqInfo'));
    }

    public function updateInfoButton(Request $request, $id)
    {

        //dd($request->all());
        // Find the record by ID and update it
        $siRefEqInfo = SiRefEqInfo::find($id);
        // dd($siRefEqInfo);
        //update $siRefEqInfo one by one for "c0" => 0.0
        $siRefEqInfo->c0 = $request->c0;
        $siRefEqInfo->c1 = $request->c1;
        $siRefEqInfo->c3 = $request->c3;
        $siRefEqInfo->c4 = $request->c4;
        $siRefEqInfo->Serr = $request->serr;
        $siRefEqInfo->save();
        // $siRefEqInfo->update($request);

        $siRefEqDetail = new SiRefEqDetail();
        // dd($siRefEqDetail);
        $siRefEqDetail->eq_id = $siRefEqInfo->eq_id;
        $siRefEqDetail->eq_name = $siRefEqInfo->eq_name;
        $siRefEqDetail->brand = $siRefEqInfo->brand;
        $siRefEqDetail->model = $siRefEqInfo->model;
        $siRefEqDetail->serial_no = $request['serial_no'];
        $siRefEqDetail->save();

        return response()->json(['message' => 'Information updated successfully'], 200);
    }
    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, SiRefEqInfo $siRefEqInfo)
    {
        //
        $data = $request->validated();

        $siRefEqInfo->update($data);

        return redirect()->route('si_ref_eq_infos.index')
            ->with('success', 'SiRefEqInfo updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(SiRefEqInfo $siRefEqInfo)
    {
        //
        $siRefEqInfo->delete();

        return redirect()->route('si_ref_eq_infos.index')
            ->with('success', 'SiRefEqInfo deleted successfully.');
    }
}
