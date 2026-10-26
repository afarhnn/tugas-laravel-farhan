<?php

namespace App\Http\Controllers;

use App\Models\Dosen;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class DosenController extends Controller
{
    public function index(): View
    {
        $dosens = Dosen::query()->orderBy('nama')->get();

        return view('dosen.index', compact('dosens'));
    }

    public function create(): View
    {
        return view('dosen.form');
    }

    public function store(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'nidn' => ['required', 'string', 'max:20', 'unique:dosens,nidn'],
            'nama' => ['required', 'string', 'max:100'],
            'jabatan' => ['required', 'string', 'max:50'],
            'kepakaran' => ['required', 'string', 'max:100'],
        ]);

        Dosen::create($validated);

        return to_route('home')->with('success', 'Data dosen berhasil ditambahkan.');
    }

    public function edit(Dosen $dosen): View
    {
        return view('dosen.form', compact('dosen'));
    }

    public function update(Request $request, Dosen $dosen): RedirectResponse
    {
        $validated = $request->validate([
            'nama' => ['required', 'string', 'max:100'],
            'jabatan' => ['required', 'string', 'max:50'],
            'kepakaran' => ['required', 'string', 'max:100'],
        ]);

        $dosen->update($validated);

        return to_route('home')->with('success', 'Data dosen berhasil diperbarui.');
    }

    public function destroy(Dosen $dosen): RedirectResponse
    {
        $dosen->delete();

        return to_route('home')->with('success', 'Data dosen berhasil dihapus.');
    }
}
