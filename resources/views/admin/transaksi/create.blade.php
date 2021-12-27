@extends('admin.layouts.default')
@section('title','Tambah Transaksi')

@push('after-style')
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/css/select2.min.css" rel="stylesheet" />
@endpush
@section('content')
<div class="card">
    <div class="card-header">
        <strong>Tambah Transaksi</strong>
    </div>
    <div class="card-body card-block">
        <form action="{{ route('transaksi.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="name" class="form-control-label">Nama Nasabah</label>
                <select name="nasabah_id" id="nasabah"
                    class="form-control cariNasabah  @error('sampah') is-invalid @enderror">
                </select>
                @error('nasabah') <div class="text-muted">{{ $message }}</div> @enderror
            </div>
            <div class="form-group">
                <label for="name" class="form-control-label">Jenis Sampah</label>
                <select name="sampah_id" id="sampah" class="form-control @error('sampah') is-invalid @enderror">
                    <option value="">Pilih Jenis Sampah</option>
                    @foreach ($sampahs as $sampah)
                    <option value="{{ $sampah->id }}">{{ $sampah->jenis_sampah }}</option>
                    @endforeach
                </select>
                @error('sampah') <div class="text-muted">{{ $message }}</div> @enderror
            </div>
            <div class="form-group">
                <label for="harga" class="form-control-label">Harga</label>
                <input type="text" name="harga" class="harga form-control @error('harga') is-invalid @enderror"
                    id="harga" readonly />
                @error('harga') <div class="text-muted">{{ $message }}</div> @enderror
            </div>
            <div class="form-group">
                <label for="berat" class="form-control-label">Berat</label>
                <input type="text" name="berat" class="form-control @error('berat') is-invalid @enderror" id="berat" />
                @error('berat') <div class="text-muted">{{ $message }}</div> @enderror
            </div>
            <div class="form-group">
                <label for="total" class="form-control-label">Total</label>
                <input type="text" name="total" class="form-control @error('total') is-invalid @enderror" id="total"
                    readonly />
                @error('total') <div class="text-muted">{{ $message }}</div> @enderror
            </div>

            <div class="form-group">
                <button class="btn btn-primary btn-block" type="submit">
                    Submit
                </button>
            </div>
        </form>
    </div>
</div>

@endsection
@push('after-script')
<script type="text/javascript">
    $("#sampah").change(function() {
        placeholder: 'Pilih Jenis Sampah',
                $.ajax({
                  url: '/getSampah/' + $(this).val(),
                  type: 'GET',
                  dataType: 'JSON',
                  success: function(data)
                  {
                    $("#harga").val(data[0].harga);
                  },
                  error: function(jqXHR, textStatus, errorThrown) {}
                });
              });
</script>
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/js/select2.min.js"></script>
<script type="text/javascript">
    $('.cariNasabah').select2({
        placeholder: 'Pilih Nama Nasabah',
        ajax: {
            url: '/getNasabah',
            dataType: 'json',
            delay: 250,
            processResults: function (data) {
                return {
                    results: $.map(data, function (item) {
                        return {
                            text: item.nama,
                            id: item.id
                        }
                    })
                };
            },
            cache: true
        }
    });
</script>

<script type="text/javascript">
    $(document).ready(function() {
        $("#berat, #harga").keyup(function() {
            var harga  = $("#harga").val();
            var berat = $("#berat").val();

            var total = parseInt(harga) * parseFloat(berat);
            $("#total").val(total);
        });
    });
</script>
@endpush
