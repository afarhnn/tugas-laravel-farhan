@extends('layouts.dosen')

@section('title', isset($dosen) ? 'Edit Dosen' : 'Tambah Dosen')

@section('content')
    <a href="{{ route('home') }}" class="mb-5 inline-block text-sm text-slate-600 hover:text-slate-900">
        &larr; Kembali ke daftar
    </a>

    <section class="mx-auto max-w-2xl rounded-lg border border-slate-200 bg-white p-5 shadow-sm sm:p-7">
        <div class="mb-6 border-b border-slate-200 pb-5">
            <p class="text-sm text-slate-500">Data dosen pembimbing</p>
            <h1 class="mt-1 text-2xl font-bold text-slate-900">
                {{ isset($dosen) ? 'Edit Data Dosen' : 'Tambah Data Dosen' }}
            </h1>
        </div>

        @if ($errors->any())
            <div class="mb-5 rounded-md border border-red-200 bg-red-50 px-4 py-3 text-sm text-red-700">
                Periksa kembali data yang masih salah.
            </div>
        @endif

        <form
            action="{{ isset($dosen) ? route('dosen.update', $dosen->nidn) : route('dosen.store') }}"
            method="POST"
            class="grid gap-5"
        >
            @csrf
            @if (isset($dosen))
                @method('PUT')
            @endif

            <div class="grid gap-2">
                <label for="nidn" class="text-sm font-medium text-slate-700">NIDN</label>
                <input
                    id="nidn"
                    name="nidn"
                    type="text"
                    value="{{ isset($dosen) ? $dosen->nidn : old('nidn') }}"
                    maxlength="20"
                    required
                    @if (isset($dosen)) readonly @endif
                    class="rounded-md border border-slate-300 px-3 py-2 focus:border-slate-500 focus:outline-none"
                >
                @error('nidn')
                    <p class="text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>

            <div class="grid gap-2">
                <label for="nama" class="text-sm font-medium text-slate-700">Nama Lengkap</label>
                <input
                    id="nama"
                    name="nama"
                    type="text"
                    value="{{ isset($dosen) ? $dosen->nama : old('nama') }}"
                    maxlength="100"
                    required
                    placeholder="Masukkan nama lengkap"
                    class="rounded-md border border-slate-300 px-3 py-2 focus:border-slate-500 focus:outline-none"
                >
                @error('nama')
                    <p class="text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>

            <div class="grid gap-2">
                <label for="jabatan" class="text-sm font-medium text-slate-700">Jabatan Fungsional</label>
                <input
                    id="jabatan"
                    name="jabatan"
                    type="text"
                    value="{{ isset($dosen) ? $dosen->jabatan : old('jabatan') }}"
                    maxlength="50"
                    required
                    placeholder="Contoh: Dosen atau Profesor"
                    class="rounded-md border border-slate-300 px-3 py-2 focus:border-slate-500 focus:outline-none"
                >
                @error('jabatan')
                    <p class="text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>

            <div class="grid gap-2">
                <label for="kepakaran" class="text-sm font-medium text-slate-700">Kepakaran Riset</label>
                <input
                    id="kepakaran"
                    name="kepakaran"
                    type="text"
                    value="{{ isset($dosen) ? $dosen->kepakaran : old('kepakaran') }}"
                    maxlength="100"
                    required
                    placeholder="Contoh: Sistem Basis Data"
                    class="rounded-md border border-slate-300 px-3 py-2 focus:border-slate-500 focus:outline-none"
                >
                @error('kepakaran')
                    <p class="text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>

            <div class="mt-2 flex justify-end gap-2">
                <a href="{{ route('home') }}" class="rounded-md border border-slate-300 px-4 py-2 text-sm font-medium text-slate-700 hover:bg-slate-100">
                    Batal
                </a>
                <button type="submit" class="rounded-md bg-slate-900 px-4 py-2 text-sm font-medium text-white hover:bg-slate-700">
                    Simpan Data
                </button>
            </div>
        </form>
    </section>
@endsection
