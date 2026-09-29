@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10"> <!-- Diubah ke col-md-10 agar tabel lebih leluasa -->

            <!-- Alert Pesan Berhasil / Sukses -->
            @if (session('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    {{ session('success') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif

            <!-- Alert Pesan Gagal / Error -->
            @if (session('error'))
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    {{ session('error') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif

            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <span>Data Mahasiswa</span>
                    <!-- Tombol Tambah Data (Diubah ke Warna Coklat) -->
                    <a href="{{ route('mahasiswa.create') }}" class="btn text-white btn-sm" style="background-color: #8B4513;">
                        + Tambah Data
                    </a>
                </div>
                <div class="card-body">
                    <table class="table table-striped table-hover align-middle">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>NPM</th>
                                <th>Nama Mahasiswa</th>
                                <th>Program Studi</th>
                                <th>Tahun Masuk</th>
                                <th class="text-center">Aksi</th> <!-- Header Kolom Aksi -->
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($data_mahasiswa as $rs)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $rs->npm }}</td>
                                    <td>{{ $rs->nama }}</td>
                                    <td>{{ $rs->prodi }}</td>
                                    <td>{{ $rs->tahunmasuk }}</td>
                                    <td class="text-center">
                                        <!-- Tombol Edit (Diubah ke Warna Biru / btn-primary) -->
                                        <a href="{{ route('mahasiswa.edit', $rs->npm) }}" class="btn btn-primary btn-sm me-1">
                                            Edit
                                        </a>

                                        <!-- Tombol Hapus (Tetap Warna Merah / btn-danger) -->
                                        <form action="{{ route('mahasiswa.destroy', $rs->npm) }}" method="POST" class="d-inline" onsubmit="return confirm('Apakah Anda yakin ingin menghapus data ini?')">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger btn-sm">
                                                Hapus
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="6" class="text-center">Belum ada data mahasiswa.</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection