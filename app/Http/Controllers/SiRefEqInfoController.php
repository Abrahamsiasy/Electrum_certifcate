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
        // dd($siRefEqInfoDataTable);
        return $siRefEqInfoDataTable->render('si_ref_eq_infos.index');
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
