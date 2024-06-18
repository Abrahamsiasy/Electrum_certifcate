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
            <td>
                <a href="{{ route('si_ref_eq_infos.show', $info->id) }}" class="btn btn-sm btn-outline-primary my-1" title="View">
                    <i class="fas fa-eye"></i>
                </a>
                <a href="{{ route('si_ref_eq_infos.edit', $info->id) }}" class="btn btn-sm btn-outline-warning my-1" title="Edit">
                    <i class="fas fa-edit"></i>
                </a>
                <form action="{{ route('si_ref_eq_infos.destroy', $info->id) }}" method="POST" style="display: inline;">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-sm btn-outline-danger my-1" title="Delete">
                        <i class="fas fa-trash-alt"></i>
                    </button>
                </form>
            </td>
        </tr>
    @endforeach
