<table class="table table-bordered table-striped border-0 m0">
    <thead>
    <tr>
        <th>No</th>
        @foreach($header as $title)
            <th>{{ $title }}</th>
        @endforeach
    </tr>
    </thead>
    <tbody>
    @foreach($data as $key => $row)
        <tr>
            <td>{{ $key }}</td>
            @foreach($row as $key => $item)
                <td class="@if(($key != count($row)-1 && $key != count($row)-2) && (empty($item) || $item == 0)) csv-cell-error @endif">{{ $item }}</td>
            @endforeach
        </tr>
    @endforeach
    </tbody>
</table>
