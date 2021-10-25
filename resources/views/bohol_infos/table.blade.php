<div class="table-responsive">
    <table class="table" id="boholInfos-table">
        <thead>
            <tr>
                <th>Barangay</th>
        <th>Town</th>
        <th>Province</th>
        <th>Code</th>
        <th>Population</th>
                <th colspan="3">Action</th>
            </tr>
        </thead>
        <tbody>
        @foreach($boholInfos as $boholInfo)
            <tr>
                <td>{{ $boholInfo->barangay }}</td>
            <td>{{ $boholInfo->town }}</td>
            <td>{{ $boholInfo->province }}</td>
            <td>{{ $boholInfo->code }}</td>
            <td>{{ $boholInfo->population }}</td>
                <td width="120">
                    {!! Form::open(['route' => ['boholInfos.destroy', $boholInfo->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{{ route('boholInfos.show', [$boholInfo->id]) }}" class='btn btn-default btn-xs'>
                            <i class="far fa-eye"></i>
                        </a>
                        <a href="{{ route('boholInfos.edit', [$boholInfo->id]) }}" class='btn btn-default btn-xs'>
                            <i class="far fa-edit"></i>
                        </a>
                        {!! Form::button('<i class="far fa-trash-alt"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                    </div>
                    {!! Form::close() !!}
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
