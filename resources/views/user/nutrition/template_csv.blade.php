<table>
<thead>
<tr>
    @foreach(ARRAY_COLUMN_CSV[$tableType] as $title)
    <th>{{ $title }}</th>
    @endforeach
</tr>
</thead>
<tbody>
    <tr>
        @foreach(ARRAY_COLUMN_CSV[$tableType] as $title)
            <th>0</th>
        @endforeach
    </tr>
</tbody>
</table>
