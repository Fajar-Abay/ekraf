<?php
namespace App\Http\Controllers\Admin;

use App\Models\Usaha;
use App\Models\Subsektor;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SubsektorController extends Controller
{
    public function index()
    {
        $subsektors = Subsektor::latest()->paginate(12);
        return view('admin.subsektor.index', compact('subsektors'));
    }

    public function create()
    {
        return view('admin.subsektor.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'ikon' => 'nullable|string|max:255',
        ]);

        Subsektor::create($request->only('nama', 'ikon'));
        return redirect()->route('admin.subsektor.index')->with('success', 'Subsektor berhasil ditambahkan!');
    }

    public function edit(Subsektor $subsektor)
    {
        return view('admin.subsektor.edit', compact('subsektor'));
    }

    public function update(Request $request, Subsektor $subsektor)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'ikon' => 'nullable|string|max:255',
        ]);

        $subsektor->update($request->only('nama', 'ikon'));
        return redirect()->route('admin.subsektor.index')->with('success', 'Subsektor berhasil diperbarui!');
    }

    public function destroy(Subsektor $subsektor)
    {
        $subsektor->delete();
        return redirect()->route('admin.subsektor.index')->with('success', 'Subsektor berhasil dihapus!');
    }

    public function detail($id)
    {
        $subsektor = Subsektor::findOrFail($id);

        // Ambil usaha berdasarkan id_subsektor
        $usahas = Usaha::where('subsektor_id', $id)->get();

        // Hitung total dan rata-rata
        $totalUsaha = $usahas->count();
        $rataPendapatan = $usahas->avg('pendapatan_per_bulan');
        $rataTenaga = $usahas->avg('jumlah_tenaga_kerja');
        $totalKecamatan = $usahas->groupBy('id_kecamatan')->count();

        return view('admin.subsektor.detail', compact(
            'subsektor',
            'usahas',
            'totalUsaha',
            'rataPendapatan',
            'rataTenaga',
            'totalKecamatan'
        ));
    }



}
