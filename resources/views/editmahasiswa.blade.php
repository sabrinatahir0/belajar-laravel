@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Edit Data Mahasiswa</div>
                <div class="card-body">

                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul class="mb-0">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <form action="{{ route('mahasiswa.update', $mahasiswa->npm) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="mb-3">
                            <label class="form-label">NPM</label>
                            <input type="text" name="npm" class="form-control" value="{{ old('npm', $mahasiswa->npm) }}" readonly>
                            <small class="text-muted">*NPM tidak dapat diubah</small>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Nama Mahasiswa</label>
                            <input type="text" name="nama" class="form-control @error('nama') is-invalid @enderror" value="{{ old('nama', $mahasiswa->nama) }}">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Program Studi</label>
                            <input type="text" name="prodi" class="form-control @error('prodi') is-invalid @enderror" value="{{ old('prodi', $mahasiswa->prodi) }}">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Tahun Masuk</label>
                            <input type="number" name="tahunmasuk" class="form-control @error('tahunmasuk') is-invalid @enderror" value="{{ old('tahunmasuk', $mahasiswa->tahunmasuk) }}">
                        </div>

                        <a href="{{ route('mahasiswa.index') }}" class="btn btn-secondary">Batal</a>
                        <button type="submit" class="btn btn-warning">Update Data</button>
                    </form>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection