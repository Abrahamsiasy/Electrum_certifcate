@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">

                <div class="col-md-12">
                    <h1 class="my-2">SI Reference Equipment Info</h1>

                    <h2>Select Equipment Name</h2>
                    <select class="form-control select2" id="eq_name_select" name="eq_name">
                        @foreach ($uniqueEqNames as $eqName)
                            <option value="{{ $eqName }}">{{ $eqName }}</option>
                        @endforeach
                    </select>

                    <div class="row my-2" id="sensor_div" style="display: none;">
                        <h2 class="mt-4">Select Equipment with Sensor ID</h2>
                        <select class="form-control select2" id="eq_sensor_select" name="eq_sensor">
                            <option value="">Select Equipment Name first</option>
                        </select>
                    </div>

                    <div class="row my-2" id="row_div" style="display: none;">
                        <div class="col-md-4">
                            <h3>Select Equipment Res</h3>
                            <select class="form-control select2" id="eq_res_select" name="eq_res">
                                <option value="">Select Equipment Res first</option>
                            </select>
                        </div>
                        <div class="col-md-4">
                            <h3>Select Equipment Cal</h3>
                            <select class="form-control select2" id="eq_cal_select" name="eq_cal">
                                <option value="">Select Equipment Cal first</option>
                            </select>
                        </div>
                        <div class="col-md-4">
                            <h3>Select Equipment Split No</h3>
                            <select class="form-control select2" id="eq_split_select" name="eq_split">
                                <option value="">Select Equipment Split first</option>
                            </select>
                        </div>
                    </div>
                </div>


                {{-- <button class="btn btn-outline-primary m-2" type="submit">Get Equpment Detail</button> --}}


            <div id="equipment-detail">
                <button id="get-equipment-detail" class="btn btn-outline-primary m-2" type="button">Get Equipment Detail</button>
                <table id="si-ref-eq-infos-table" class="table table-bordered table-striped" style="display: none;">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Equipment Name</th>
                            <th>Brand</th>
                            <th>Model</th>
                            <th>Serial No</th>
                            <th>Equipment ID</th>
                            <th>Sensor SN</th>
                            <th>Sensor ID</th>
                            <th>Split No</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody id="si-ref-eq-infos-body">
                        <!-- Table body will be filled with AJAX -->
                    </tbody>
                </table>
            </div>

            <script>
                document.addEventListener('DOMContentLoaded', function() {
                    const getEquipmentDetailBtn = document.getElementById('get-equipment-detail');
                    const table = document.getElementById('si-ref-eq-infos-table');
                    const tbody = document.getElementById('si-ref-eq-infos-body');

                    getEquipmentDetailBtn.addEventListener('click', function() {
                        fetchEquipmentDetail();
                    });

                    function fetchEquipmentDetail() {
                        // Example data to send to the server
                        const data = {
                            eq_name: $("#eq_name_select").val(),
                            eq_sensor: $("#eq_sensor_select").val(),
                            eq_res: $("#eq_res_select").val(),
                            eq_cal: $("#eq_cal_select").val(),
                            eq_split: $("#eq_split_select").val(),
                        };

                        // Perform AJAX request to fetch data
                        fetch('/si-ref-eq-infos', {
                            method: 'POST',
                            headers: {
                                'Content-Type': 'application/json',
                                'X-CSRF-TOKEN': '{{ csrf_token() }}' // Assuming CSRF token is available
                            },
                            body: JSON.stringify(data)
                        })
                        .then(response => response.json())
                        .then(data => {
                            // Clear existing table rows
                            tbody.innerHTML = '';

                            // Populate table with fetched data
                            data.forEach((info, index) => {
                                const row = `
                                    <tr>
                                        <td>${index + 1}</td>
                                        <td>${info.eq_name}</td>
                                        <td>${info.brand}</td>
                                        <td>${info.model}</td>
                                        <td>${info.serial_no}</td>
                                        <td>${info.eq_id}</td>
                                        <td>${info.sensor_sn}</td>
                                        <td>${info.sensor_id}</td>
                                        <td>${info.split_no}</td>
                                        <td>
                                            <a href="/si_ref_eq_infos/${info.id}" class="btn btn-sm btn-outline-primary my-1" title="View">
                                                <i class="fas fa-eye"></i>
                                            </a>
                                            <a href="/si_ref_eq_infos/${info.id}/edit" class="btn btn-sm btn-outline-warning my-1" title="Edit">
                                                <i class="fas fa-edit"></i>
                                            </a>
                                            <form action="/si_ref_eq_infos/${info.id}" method="POST" style="display: inline;">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-sm btn-outline-danger my-1" title="Delete">
                                                    <i class="fas fa-trash-alt"></i>
                                                </button>
                                            </form>
                                        </td>
                                    </tr>
                                `;
                                tbody.innerHTML += row;
                            });

                            // Show the table
                            table.style.display = 'table';
                        })
                        .catch(error => {
                            console.error('Error fetching equipment detail:', error);
                            // Optionally show an error message or handle errors
                        });
                    }
                });
            </script>


            {{-- <div class="d-flex">
                {{ $siRefEqInfos->links('pagination::bootstrap-4') }}
            </div> --}}




        </div>
    </div>
@endsection

@push('scripts')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"
        integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

    <script>
        // Wait for the document to be fully loaded
        document.addEventListener('DOMContentLoaded', function() {
            // Get references to the select elements
            const eqNameSelect = document.getElementById('eq_name_select');
            const sensor_div = document.getElementById('sensor_div');
            const eqSensorSelect = document.getElementById('eq_sensor_select');
            const rowDiv = document.getElementById('row_div');
            // Initially hide the rowDiv
            rowDiv.style.display = 'none';
            sensor_div.style.display = 'none';
            // Event listener for eqNameSelect change
            eqNameSelect.addEventListener('change', function() {
                // Show/hide eqSensorSelect based on selection in eqNameSelect
                if (eqNameSelect.value !== '') {
                    sensor_div.style.display = 'block';
                } else {
                    sensor_div.style.display = 'none';
                    rowDiv.style.display = 'none'; // Also hide rowDiv if eqNameSelect is not selected
                }
            });
            // Event listener for eqSensorSelect change
            eqSensorSelect.addEventListener('change', function() {
                // Show/hide rowDiv based on selection in eqSensorSelect
                if (eqSensorSelect.value !== '') {
                    rowDiv.style.display = 'flex';
                } else {
                    rowDiv.style.display = 'none';
                }
            });
        });
    </script>


    <script>
        $(document).ready(function() {

            $('#eq_name_select').change(function() {
                var selectedEqName = $(this).val();
                $.ajax({
                    url: '{{ route('getSensorIdsByEqName') }}',
                    type: 'GET',
                    data: {
                        eq_name: selectedEqName
                    },
                    success: function(response) {
                        $('#eq_sensor_select').empty();
                        console.log(response);
                        Object.values(response).forEach(function(item) {
                            // alert(item)
                            $('#eq_sensor_select').append(new Option(item, item));
                        });
                    },

                    error: function(xhr) {
                        console.log(xhr.responseText);
                    }
                });
            });
        });

        $(document).ready(function() {

            $('#eq_sensor_select').change(function() {
                var selectedSensorId = $(this).val();
                $.ajax({
                    url: '{{ route('getDivRowIdsByEqName') }}',
                    type: 'GET',
                    data: {
                        eq_name: $('#eq_name_select').val(),
                        eq_sensor: selectedSensorId
                    },
                    success: function(response) {
                        $('#eq_res_select').empty();
                        $('#eq_cal_select').empty();
                        $('#eq_split_select').empty();

                        Object.values(response).forEach(function(item) {
                            $('#eq_res_select').append(new Option(item.res, item.res));
                        });

                        Object.values(response).forEach(function(item) {
                            $('#eq_cal_select').append(new Option(item.cal_date, item
                                .cal_date));
                        });

                        Object.values(response).forEach(function(item) {
                            $('#eq_split_select').append(new Option(item.split_no, item
                                .split_no));
                        });
                    },

                    error: function(xhr) {
                        console.log(xhr.responseText);
                    }
                });
            });
        });
    </script>
@endpush
