@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">

                <h1>Create New SI Reference Equipment</h1>

                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <form action="{{ route('si_ref_eq_infos.store') }}" method="POST">
                    @csrf

                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="eq_name">Equipment Name</label>
                                <input type="text" class="form-control my-2" id="eq_name" name="eq_name"
                                    value="{{ old('eq_name') }}" required>
                            </div>

                            <div class="form-group">
                                <label for="brand">Brand</label>
                                <input type="text" class="form-control my-2" id="brand" name="brand"
                                    value="{{ old('brand') }}" required>
                            </div>

                            <div class="form-group">
                                <label for="model">Model</label>
                                <input type="text" class="form-control my-2" id="model" name="model"
                                    value="{{ old('model') }}" required>
                            </div>

                            <div class="form-group">
                                <label for="serial_no">Serial No</label>
                                <input type="text" class="form-control my-2" id="serial_no" name="serial_no"
                                    value="{{ old('serial_no') }}" required>
                            </div>

                            <div class="form-group">
                                <label for="eq_id">Equipment ID</label>
                                <input type="text" class="form-control my-2" id="eq_id" name="eq_id"
                                    value="{{ old('eq_id') }}" required>
                            </div>

                            <div class="form-group">
                                <label for="sensor_sn">Sensor SN</label>
                                <input type="text" class="form-control my-2" id="sensor_sn" name="sensor_sn"
                                    value="{{ old('sensor_sn') }}" required>
                            </div>

                            <div class="form-group">
                                <label for="sensor_id">Sensor ID</label>
                                <input type="text" class="form-control my-2" id="sensor_id" name="sensor_id"
                                    value="{{ old('sensor_id') }}" required>
                            </div>

                            <div class="form-group">
                                <label for="split_no">Split No</label>
                                <input type="text" class="form-control my-2" id="split_no" name="split_no"
                                    value="{{ old('split_no') }}" required>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group row">
                                <label for="c0" class="col-sm-4 col-form-label">C0</label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control my-2" id="c0" name="c0"
                                        value="{{ old('c0') }}" required>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="c1" class="col-sm-4 col-form-label">C1</label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control my-2" id="c1" name="c1"
                                        value="{{ old('c1') }}" required>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="c2" class="col-sm-4 col-form-label">C2</label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control my-2" id="c2" name="c2"
                                        value="{{ old('c2') }}" required>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="c3" class="col-sm-4 col-form-label">C3</label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control my-2" id="c3" name="c3"
                                        value="{{ old('c3') }}" required>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="c4" class="col-sm-4 col-form-label">C4</label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control my-2" id="c4" name="c4"
                                        value="{{ old('c4') }}" required>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="Serr" class="col-sm-4 col-form-label">Serr</label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control my-2" id="Serr" name="Serr"
                                        value="{{ old('Serr') }}" required>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="range_min" class="col-sm-4 col-form-label">Range Min</label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control my-2" id="range_min" name="range_min"
                                        value="{{ old('range_min') }}" required>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="range_max" class="col-sm-4 col-form-label">Range Max</label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control my-2" id="range_max" name="range_max"
                                        value="{{ old('range_max') }}" required>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="cal_date" class="col-sm-4 col-form-label">Calibration Date</label>
                                <div class="col-sm-8">
                                    <input type="date" class="form-control my-2" id="cal_date" name="cal_date"
                                        value="{{ old('cal_date') }}" required>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="uncert" class="col-sm-4 col-form-label">Uncertainty</label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control my-2" id="uncert" name="uncert"
                                        value="{{ old('uncert') }}" required>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="cmc" class="col-sm-4 col-form-label">CMC</label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control my-2" id="cmc" name="cmc"
                                        value="{{ old('cmc') }}" required>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="res" class="col-sm-4 col-form-label">Resolution</label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control my-2" id="res" name="res"
                                        value="{{ old('res') }}" required>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="unit" class="col-sm-4 col-form-label">Unit</label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control my-2" id="unit" name="unit"
                                        value="{{ old('unit') }}" required>
                                </div>
                            </div>
                        </div>
                    </div>

                    <button type="submit" class="btn btn-outline-primary col-3">Create</button>
                </form>
            </div>
        </div>
    </div>
    </div>
@endsection
