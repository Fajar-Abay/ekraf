<?php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

use App\Models\Slider;
use Illuminate\Http\Request;

class SliderController extends Controller
{
    public function index()
    {
        $sliders = Slider::all();
        return view('admin.slider.index', compact('sliders'));
    }

    public function create()
    {
        return view('admin.slider.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'judul' => 'nullable|string|max:255',
            'deskripsi' => 'nullable|string',
            'gambar' => 'required|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        $path = $request->file('gambar')->store('sliders', 'public');

        Slider::create([
            'judul' => $request->judul,
            'deskripsi' => $request->deskripsi,
            'gambar' => $path,
        ]);

        return redirect()->route('admin.slider.index')->with('success', 'Slider berhasil ditambahkan.');
    }

    public function destroy(Slider $slider)
    {
        if ($slider->gambar && file_exists(storage_path('app/public/' . $slider->gambar))) {
            unlink(storage_path('app/public/' . $slider->gambar));
        }
        $slider->delete();

        return back()->with('success', 'Slider dihapus.');
    }

    public function toggle($id)
    {
        $slider = Slider::findOrFail($id);
        $slider->is_active = !$slider->is_active; // balik status aktif/nonaktif
        $slider->save();

        return redirect()->back()->with('success', 'Status slider berhasil diperbarui!');
    }

}
