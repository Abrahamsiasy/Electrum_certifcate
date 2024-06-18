@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        Equipment Details
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-4">
                                <strong>Equipment Name:</strong>
                                <p>{{ $siRefEqInfo->eq_name }}</p>
                                <strong>Brand:</strong>
                                <p>{{ $siRefEqInfo->brand }}</p>
                                <strong>Model:</strong>
                                <p>{{ $siRefEqInfo->model }}</p>
                                <strong>Serial Number:</strong>
                                <p>{{ $siRefEqInfo->serial_no }}</p>
                                <strong>Equipment ID:</strong>
                                <p>{{ $siRefEqInfo->eq_id }}</p>
                                <br>

                            </div>
                            <div class="col-md-4">
                                <strong>Sensor SN:</strong>
                                <p>{{ $siRefEqInfo->sensor_sn }}</p>
                                <strong>Sensor ID:</strong>
                                <p>{{ $siRefEqInfo->sensor_id }}</p>
                                <strong>Split Number:</strong>
                                <p>{{ $siRefEqInfo->split_no }}</p>
                                <strong>C0:</strong>
                                <p>{{ $siRefEqInfo->c0 }}</p>
                                <strong>C1:</strong>
                                <p>{{ $siRefEqInfo->c1 }}</p>
                                <strong>C2:</strong>
                                <p>{{ $siRefEqInfo->c2 }}</p>
                                <strong>C3:</strong>
                                <p>{{ $siRefEqInfo->c3 }}</p>
                                <strong>C4:</strong>
                                <p>{{ $siRefEqInfo->c4 }}</p>
                                <strong>Serr:</strong>
                                <p>{{ $siRefEqInfo->Serr }}</p>
                            </div>
                            <div class="col-md-4">
                                <strong>Range Min:</strong>
                                <p>{{ $siRefEqInfo->range_min }}</p>
                                <strong>Range Max:</strong>
                                <p>{{ $siRefEqInfo->range_max }}</p>
                                <strong>Calibration Date:</strong>
                                <p>{{ $siRefEqInfo->cal_date }}</p>
                                <strong>Uncertainty:</strong>
                                <p>{{ $siRefEqInfo->uncert }}</p>
                                <strong>CMC:</strong>
                                <p>{{ $siRefEqInfo->cmc }}</p>
                                <strong>Resolution:</strong>
                                <p>{{ $siRefEqInfo->res }}</p>
                                <strong>Unit:</strong>
                                <p>{{ $siRefEqInfo->unit }}</p>
                                <br>

                            </div>
                        </div>
                        <div class="d-flex justify-content ">
                            <form action="{{ route('si_ref_eq_infos.edit', $siRefEqInfo->id) }}" method="GET">
                                @csrf
                                <button type="submit" class="btn btn-outline-primary  mx-1">Edit</button>
                            </form>
                            <form action="{{ route('si_ref_eq_infos.destroy', $siRefEqInfo->id) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-outline-danger mx-1">Delete</button>
                            </form>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
