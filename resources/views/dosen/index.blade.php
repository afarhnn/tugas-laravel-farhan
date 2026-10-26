@extends('layouts.dosen')

@section('title', 'Daftar Dosen Pembimbing')

@section('content')
    <header class="mb-6 flex flex-col gap-4 border-b border-slate-200 pb-5 sm:flex-row sm:items-end sm:justify-between">
        <div>
            <p class="mb-1 text-sm font-medium text-emerald-700">
                Sistem Informasi Tugas Akhir dan Skripsi
            </p>
            <h1 class="text-3xl font-bold text-slate-900">Daftar Dosen Pembimbing</h1>
        </div>

        <a href="{{ route('dosen.create') }}" class="rounded-md bg-slate-900 px-4 py-2 text-sm font-medium text-white hover:bg-slate-700">
            Tambah Dosen
        </a>
    </header>

    @if (session('success'))
        <div class="mb-4 rounded-md border border-emerald-200 bg-emerald-50 px-4 py-3 text-sm text-emerald-800">
            {{ session('success') }}
        </div>
    @endif

    <div class="overflow-hidden rounded-lg border border-slate-200 bg-white shadow-sm">
        <div class="overflow-x-auto">
            <table class="w-full min-w-[760px] text-left text-sm">
                <thead class="border-b border-slate-200 bg-slate-100 text-xs uppercase text-slate-600">
                    <tr>
                        <th class="px-4 py-3">NIDN</th>
                        <th class="px-4 py-3">Nama Lengkap</th>
                        <th class="px-4 py-3">Jabatan</th>
                        <th class="px-4 py-3">Kepakaran Riset</th>
                        <th class="px-4 py-3 text-right">Aksi</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-slate-200">
                    @forelse ($dosens as $dosen)
                        <tr class="hover:bg-slate-50">
                            <td class="px-4 py-4 font-mono font-medium">{{ $dosen->nidn }}</td>
                            <td class="px-4 py-4 font-medium">{{ $dosen->nama }}</td>
                            <td class="px-4 py-4">{{ $dosen->jabatan }}</td>
                            <td class="px-4 py-4 text-slate-600">{{ $dosen->kepakaran }}</td>
                            <td class="px-4 py-4">
                                <div class="flex justify-end gap-2">
                                    <a href="{{ route('dosen.edit', $dosen->nidn) }}" class="rounded-md border border-slate-300 px-3 py-1.5 text-sm font-medium text-slate-700 hover:bg-slate-100">
                                        Edit
                                    </a>
                                    <form action="{{ route('dosen.destroy', $dosen->nidn) }}" method="POST" onsubmit="return confirm('Yakin ingin menghapus dosen ini?')">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="rounded-md border border-red-200 px-3 py-1.5 text-sm font-medium text-red-700 hover:bg-red-50">
                                            Hapus
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5" class="px-4 py-12 text-center text-slate-500">
                                Belum ada data dosen.
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
@endsection
