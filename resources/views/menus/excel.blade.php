<table>
    <thead>
        <tr>
            <th>No</th>
            <th>Nama</th>
            <th>Kategori</th>
            <th>Harga</th>
            <th>Stok</th>
        </tr>
    </thead>
    <tbody>
        @foreach($menus as $menu)
        <tr>
            <td>{{ $loop->iteration }}</td>
            <td>{{ $menu->name }}</td>
            <td>{{ $menu->category->name ?? '-' }}</td>
            <td>{{ number_format($menu->price,0,',','.') }}</td>
            <td>{{ $menu->stock }}</td>
        </tr>
        @endforeach
    </tbody>
</table>
