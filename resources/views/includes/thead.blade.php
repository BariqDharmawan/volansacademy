@php
    if (!isset($type)) {
        $type = 'thead';
    }
@endphp

@if ($type == 'thead')
<thead>
@else
<tfoot>
@endif
    <tr>
        <td>No</td>
        @foreach ($tds as $td)
            <td>{{ $td }}</td>
        @endforeach
    </tr>
@if ($type == 'thead')
</thead>
@else
</tfoot>
@endif