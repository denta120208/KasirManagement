<table>
    <thead>
        <tr>
            <th>No</th>
            <th>Nama</th>
        </tr>
    </thead>
    <tbody>
        @foreach($categories as $category)
        <tr>
            <td>{{ $loop->iteration }}</td>
            <td>{{ $category->name }}</td>
        </tr>
        @endforeach
    </tbody>
</table>
