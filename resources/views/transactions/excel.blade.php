<table>
    <thead>
        <tr>
            <th>No</th>
            <th>No Struk</th>
            <th>Kasir</th>
            <th>Total</th>
            <th>Diskon</th>
            <th>Pembayaran</th>
            <th>Tanggal</th>
        </tr>
    </thead>
    <tbody>
        @foreach($transactions as $trx)
        <tr>
            <td>{{ $loop->iteration }}</td>
            <td>{{ $trx->receipt_number ?? '-' }}</td>
            <td>{{ $trx->user->name ?? '-' }}</td>
            <td>{{ number_format($trx->total,0,',','.') }}</td>
            <td>{{ number_format($trx->discount,0,',','.') }}</td>
            <td>{{ ucfirst($trx->payment_method ?? '-') }}</td>
            <td>{{ $trx->created_at }}</td>
        </tr>
        @endforeach
    </tbody>
</table>
