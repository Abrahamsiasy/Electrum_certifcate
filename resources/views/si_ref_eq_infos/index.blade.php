@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h1>SI Reference Equipment Info</h1>
                <table class="table table-bordered table-striped">
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
                            {{-- <th>C0</th>
                            <th>C1</th>
                            <th>C2</th>
                            <th>C3</th>
                            <th>C4</th>
                            <th>Serr</th>
                            <th>Range Min</th>
                            <th>Range Max</th>
                            <th>Calibration Date</th>
                            <th>Uncertainty</th>
                            <th>CMC</th>
                            <th>Resolution</th>
                            <th>Unit</th> --}}
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($siRefEqInfos as $key => $info)
                            <tr>
                                <td>{{ $siRefEqInfos->firstItem() + $key }}</td>
                                <td>{{ $info->eq_name }}</td>
                                <td>{{ $info->brand }}</td>
                                <td>{{ $info->model }}</td>
                                <td>{{ $info->serial_no }}</td>
                                <td>{{ $info->eq_id }}</td>
                                <td>{{ $info->sensor_sn }}</td>
                                <td>{{ $info->sensor_id }}</td>
                                <td>{{ $info->split_no }}</td>
                                {{-- <td>{{ $info->c0 }}</td>
                            <td>{{ $info->c1 }}</td>
                            <td>{{ $info->c2 }}</td>
                            <td>{{ $info->c3 }}</td>
                            <td>{{ $info->c4 }}</td>
                            <td>{{ $info->Serr }}</td>
                            <td>{{ $info->range_min }}</td>
                            <td>{{ $info->range_max }}</td>
                            <td>{{ $info->cal_date }}</td>
                            <td>{{ $info->uncert }}</td>
                            <td>{{ $info->cmc }}</td>
                            <td>{{ $info->res }}</td>
                            <td>{{ $info->unit }}</td> --}}
                                <td>
                                    <a href="{{ route('si_ref_eq_infos.show', $info->id) }}" class="btn btn-sm btn-outline-primary my-1"
                                        title="View">
                                        <i class="fas fa-eye"></i>
                                    </a>
                                    <a href="{{ route('si_ref_eq_infos.edit', $info->id) }}" class="btn btn-sm btn-outline-warning my-1"
                                        title="Edit">
                                        <i class="fas fa-edit"></i>
                                    </a>
                                    <form action="{{ route('si_ref_eq_infos.destroy', $info->id) }}" method="POST"
                                        style="display: inline;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-outline-danger my-1" title="Delete">
                                            <i class="fas fa-trash-alt"></i>
                                        </button>
                                    </form>
                                </td>

                            </tr>
                        @endforeach
                    </tbody>
                </table>

                <div class="d-flex">
                    {{ $siRefEqInfos->links('pagination::bootstrap-4') }}
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script>
        $(document).ready(function() {
            $('.select2').select2();
        });
    </script>
@endsection
