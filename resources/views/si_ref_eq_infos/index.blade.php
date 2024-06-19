@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">

            <!-- Success Message Div -->
            {{-- <div class="alert alert-success alert-dismissible fade show" role="alert">
                <strong>Success!</strong> Your action was completed successfully.
                <button type="button" class="close btn-success" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">X</span>
                </button>
            </div> --}}
            <div class="col-md-12">

                <div class="d-flex justify-content-between align-items-center my-2">
                    <h1 class="mb-0">SI Reference Equipment Info</h1>
                    <a class="btn btn-outline-primary" href="{{ route('si_ref_eq_infos.create') }}">Create New</a>
                </div>

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
                <button id="get-equipment-detail" class="btn btn-outline-primary m-2" type="button">Get Equipment
                    Detail</button>
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

                                <tr>
                                    <td colspan="10">
                                        <div class="row">
                                            <div class="col-md-3">
                                                <label for="c0-${info.id}">C0:</label>
                                                <input type="number" id="c0-${info.id}" name="c0-${info.id}" value="${info.c0}" class="form-control">
                                            </div>
                                            <div class="col-md-3">
                                                <label for="c1-${info.id}">C1:</label>
                                                <input type="number" id="c1-${info.id}" name="c1-${info.id}" value="${info.c1}" class="form-control">
                                            </div>
                                            <div class="col-md-3">
                                                <label for="c2-${info.id}">C2:</label>
                                                <input type="number" id="c2-${info.id}" name="c2-${info.id}" value="${info.c2}" class="form-control">
                                            </div>
                                            <div class="col-md-3">
                                                <label for="c3-${info.id}">C3:</label>
                                                <input type="number" id="c3-${info.id}" name="c3-${info.id}" value="${info.c3}" class="form-control">
                                            </div>
                                            <div class="col-md-3">
                                                <label for="c4-${info.id}">C4:</label>
                                                <input type="number" id="c4-${info.id}" name="c4-${info.id}" value="${info.c4}" class="form-control">
                                            </div>
                                            <div class="col-md-3">
                                                <label for="serr-${info.id}">Serr:</label>
                                                <input type="text" id="serr-${info.id}" name="serr-${info.id}" value="${info.Serr}" class="form-control">
                                            </div>

                                            <div class="col-md-3">
                                                <button class="btn btn-outline-primary my-4 update-button" data-info-id="${info.id}">Update</button>
                                            </div>


                                        </div>

                                    </td>
                                </tr>


                                <button class="btn btn-outline-primary m-2 get-point-button">Get Equipment Points</button>


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


            <table id="points-table" class="table table-bordered table-striped d-none m-3">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Equipment ID</th>
                        <th>Sensor ID</th>
                        <th>Split No</th>
                        <th>Point No</th>
                        <th>Reference Value</th>
                        <th>Value</th>
                        <th>Uncertainty</th>
                        <th>Calibration Date</th>
                    </tr>
                </thead>
                <tbody class="points-table-body">
                    <!-- Data will be inserted here by JavaScript -->
                </tbody>
            </table>



            {{-- script to fetch points start --}}
            <script>
                document.addEventListener('DOMContentLoaded', function() {
                    document.body.addEventListener('click', function(event) {
                        if (event.target.classList.contains('get-point-button')) {


                            const data = {
                                eq_name: $("#eq_name_select").val(),
                                eq_sensor: $("#eq_sensor_select").val(),
                                eq_cal: $("#eq_cal_select").val(),
                                eq_split: $("#eq_split_select").val(),
                            };

                            const eq_name = data.eq_name; // Ensure you have input fields with these IDs
                            const sensor_id = data.eq_sensor;
                            const cal_date = data.eq_cal;
                            const split_no = data.eq_split;

                            fetch(
                                    `/get_equipment_points?eq_name=${eq_name}&sensor_id=${sensor_id}&cal_date=${cal_date}&split_no=${split_no}`
                                    )
                                .then(response => response.json())
                                .then(data => {
                                    // Clear existing table rows
                                    const tableBody = document.querySelector('.points-table-body');
                                    if (tableBody) {
                                        tableBody.innerHTML = '';

                                        // Populate table with fetched data
                                        data.forEach((point, index) => {
                                            const row = `
                                <tr>
                                    <td>${index + 1}</td>
                                    <td>${point.sensor_id}</td>
                                    <td>${point.split_no}</td>
                                    <td>${point.point_no}</td>
                                    <td>${point.ref_val}</td>
                                    <td>${point.value}</td>
                                    <td>${point.p_uncert}</td>
                                    <td>${point.cal_date}</td>
                                </tr>
                            `;
                                            tableBody.insertAdjacentHTML('beforeend', row);
                                        });

                                        // Make the table visible
                                        document.getElementById('points-table').classList.remove('d-none');
                                    }
                                })
                                .catch(error => {
                                    console.error('Error fetching data:', error);
                                });
                        }
                    });
                });
            </script>
            {{-- script to fetch points start --}}




        </div>
    </div>
@endsection

@push('scripts')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"
        integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>

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
                const loader = document.getElementById('loading');

                $.ajax({
                    url: '{{ route('getSensorIdsByEqName') }}',
                    type: 'GET',
                    data: {
                        eq_name: selectedEqName
                    },
                    beforeSend: function(){
                        loader.style.display = 'block';
                    },
                    success: function(response) {
                        // loader.style.display = 'none';
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



        // update button start
        document.addEventListener('DOMContentLoaded', function() {
            // Use event delegation to handle clicks on dynamically generated buttons
            document.body.addEventListener('click', function(event) {
                if (event.target.classList.contains('update-button')) {
                    const button = event.target;
                    const infoId = button.getAttribute('data-info-id');
                    const data = {
                        c0: document.getElementById(`c0-${infoId}`).value,
                        c1: document.getElementById(`c1-${infoId}`).value,
                        c2: document.getElementById(`c2-${infoId}`).value,
                        c3: document.getElementById(`c3-${infoId}`).value,
                        c4: document.getElementById(`c4-${infoId}`).value,
                        serr: document.getElementById(`serr-${infoId}`).value
                    };

                    fetch(`/update_info_button/${infoId}`, {
                            method: 'PUT',
                            headers: {
                                'Content-Type': 'application/json',
                                'X-CSRF-TOKEN': '{{ csrf_token() }}'
                            },
                            body: JSON.stringify(data)
                        })
                        .then(response => response.json())
                        .then(data => {
                            // Handle the response data
                            // alert('Information updated successfully');
                        })
                        .catch(error => {
                            console.error('Error updating information:', error);
                            // Optionally show an error message or handle errors
                        });
                }
            });
        });
        //update button end
    </script>
@endpush
