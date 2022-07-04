<table>
    <tr>
        <th>Станция</th>
        <th>Приб.</th>
        <th>Стоянка</th>
        <th>Отпр.</th>
    </tr>
@forelse($ticket->middle as $track)
        <tr>
            <td>{{$track->station}}</td>
            <td>{{$track->in}}</td>
            <td>{{$track->state}}</td>
            <td>{{$track->out}}</td>
        </tr>
@empty
    ---
@endforelse
</table>
