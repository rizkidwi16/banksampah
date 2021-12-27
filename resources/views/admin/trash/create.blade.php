@extends('admin.layouts.default')
@section('title','Tambah Jenis Sampah')

@section('content')
<div class="card">
    <div class="card-header">
        <strong>Tambah Jenis Sampah</strong>
    </div>
    <div class="card-body card-block">
        <form action="{{ route('trash.store') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="jenis_sampah" class="form-control-label">Jenis Sampah</label>
                <input type="text" name="jenis_sampah" value="{{ old('jenis_sampah') }}"
                    class="form-control @error('jenis_sampah') is-invalid @enderror" />
                @error('jenis_sampah') <div class="text-muted">{{ $message }}</div> @enderror
            </div>
            <div class="form-group">
                <label for="harga" class="form-control-label">Harga</label>
                <input type="number" name="harga" value="{{ old('harga') }}"
                    class="form-control @error('harga') is-invalid @enderror" />
                @error('harga') <div class="text-muted">{{ $message }}</div> @enderror
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
