<table>
    <thead>
        <tr>
            <th>No Id</th>
            <th>Id Jamaah</th>
            <th>Nama Lengkap</th>
            <th>Nominal Tagihan</th>
            <th>Informasi</th>
            <th>No Jurnal</th>
            <th>Tanggal Invoice</th>
            <th>Tanggal Transaksi</th>
            <th>Status Pembayaran</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($data as $item)
            <tr>
                <td>{{ $item->id_invoice }}</td>
                <td>{{ $item->nomor_siswa }}</td>
                <td>{{ $item->nama }}</td>
                <td>{{ $item->nominal_tagihan }}</td>
                <td>{{ $item->informasi }}</td>
                <td>{{ $item->nomor_jurnal_pembukuan }}</td>
                <td>{{ $item->tanggal_invoice }}</td>
                <td>{{ $item->waktu_transaksi }}</td>
                <td>{{ $item->status_pembayaran == 'SUKSES' ? 'sukses' : 'belum bayar' }}</td>
            </tr>
        @endforeach
    </tbody>
</table>
