@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">

                <h1>View Equipment Details</h1>

                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                @if ($equipmentDetails->isEmpty())
                    <p>No equipment details found.</p>
                @else
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Equipment ID</th>
                                <th>Equipment Name</th>
                                <th>Brand</th>
                                <th>Model</th>
                                <th>Serial No</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($equipmentDetails as $key => $detail)
                                <tr>
                                    <td>{{ ++$key }}</td>
                                    <td>{{ $detail->eq_id ?? 'N/A' }}</td>
                                    <td>{{ $detail->eq_name ?? 'N/A' }}</td>
                                    <td>{{ $detail->brand ?? 'N/A' }}</td>
                                    <td>{{ $detail->model ?? 'N/A' }}</td>
                                    <td>{{ $detail->serial_no ?? 'N/A' }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                @endif

            </div>
        </div>
    </div>
@endsection
