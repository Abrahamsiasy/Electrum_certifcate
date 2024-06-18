<?php

namespace App\Http\Controllers;

use App\Models\SiRefEqInfo;
use Illuminate\Http\Request;
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
        $data = $request->validated();
        SiRefEqInfo::create($data);

        return redirect()->route('si_ref_eq_infos.index')
            ->with('success', 'SiRefEqInfo created successfully.');
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
