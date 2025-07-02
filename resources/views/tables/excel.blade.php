<table>
    <thead>
        <tr>
            <th>No</th>
            <th>Nomor Meja</th>
            <th>Status</th>
        </tr>
    </thead>
    <tbody>
        @foreach($tables as $table)
        <tr>
            <td>{{ $loop->iteration }}</td>
            <td>{{ $table->number }}</td>
            <td>{{ ucfirst($table->status) }}</td>
        </tr>
        @endforeach
    </tbody>
</table>
