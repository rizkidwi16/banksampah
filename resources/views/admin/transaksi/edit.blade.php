@extends('admin.layouts.default')
@section('title','Ubah Data Nasabah')

@section('content')
<div class="card">
    <div class="card-header">
        <strong>Ubah Data Nasabah</strong>

    </div>
    <div class="card-body card-block">
        <form action="{{ route('nasabah.update',$item->id) }}" method="POST">
            @method('PUT')
            @csrf
            <div class="form-group">
                <label for="nama" class="form-control-label">Nama Nasabah</label>
                <input type="text" name="nama" value="{{ old('nama') ? old('nama') : $item->nama }}"
                    class="form-control @error('nama') is-invalid @enderror" />
                @error('nama') <div class="text-muted">{{ $message }}</div> @enderror
            </div>
            <div class="form-group">
                <label for="alamat" class="form-control-label">Alamat</label>
                <input type="text" name="alamat" value="{{ old('alamat') ? old('alamat') : $item->alamat }}"
                    class="form-control @error('alamat') is-invalid @enderror" />
                @error('alamat') <div class="text-muted">{{ $message }}</div> @enderror
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
