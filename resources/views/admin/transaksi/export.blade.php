                <table>
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Nama Nasabah</th>
                            <th>Jenis Sampah</th>
                            <th>Berat</th>
                            <th>Total</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($items as $item)
                        <tr>
                            <td>{{ $item->id }}</td>
                            <td>{{ $item->nasabah->nama}}</td>
                            <td>{{ $item->sampah->jenis_sampah }}</td>
                            <td>{{ $item->berat }}</td>
                            <td>{{ $item->total }}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>

