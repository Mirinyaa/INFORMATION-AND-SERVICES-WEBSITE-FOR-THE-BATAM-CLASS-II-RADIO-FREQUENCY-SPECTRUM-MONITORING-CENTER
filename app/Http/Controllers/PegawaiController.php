<?php

namespace App\Http\Controllers;
use App\Models\Pegawai;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;

class PegawaiController extends Controller
{
    public function index()
    {
    
        $query = Pegawai::orderBy('created_at', 'desc');
        $pegawai = $query->paginate(5);
        return view('backend.pegawai', [
            'pegawai' => $pegawai      
        ]);
    }

    public function create(Request $request)
    {
      
        $request->validate([
            'photo' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'email' => 'required|email|unique:pegawai,email'
        ]);
    
        $originalName = $request->file('photo')->getClientOriginalName();
        $randomString = Str::random(10);
        $randomName = $randomString . '_' . pathinfo($originalName, PATHINFO_FILENAME);
    
        // Simpan file ke folder public dengan nama yang dihasilkan
        $request->file('photo')->storeAs('public/photos', $randomName . '.' . $request->file('photo')->getClientOriginalExtension());
    
        Pegawai::create([
            'nama' => $request->nama,
            'photo' => $randomName . '.' . $request->file('photo')->getClientOriginalExtension(),
            'email' => $request->email,
            'nip' => $request->nip,
            'role' => $request->role,
            'password' => Hash::make($request->password),
            'posisi' => $request->posisi
        ]);
    
        return redirect('/pegawai')->with('success-add-data', 'Data pegawai berhasil ditambahkan');
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'photo' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048', // Validasi untuk foto baru (opsional)
        ]);

        $pegawai = Pegawai::findOrFail($id);
        $oldPhotoName = $pegawai->photo;
        $pegawai->nama = $request->nama;
        $pegawai->nip = $request->nip;
        $pegawai->email = $request->email;
        $pegawai->posisi = $request->posisi;
        $pegawai->role = $request->role;

            // Cek apakah ada foto baru yang diunggah
        if ($request->hasFile('photo')) {
            // Hapus foto lama (jika ada)
            if ($oldPhotoName) {
                Storage::delete('public/photos/' . $oldPhotoName);
            }

            // Simpan foto baru dengan nama yang unik
            $photoPath = $request->file('photo')->store('public/photos');
            $pegawai->photo = basename($photoPath);
        }

        $pegawai->save();

        return redirect()->back()->with('success', 'Data pegawai berhasil diperbarui.');
        }


        public function destroy($id)
        {
            $delete = Pegawai::find($id);
            $delete->delete();
            return redirect('/pegawai')->with('success-deleted', 'Data berhasil dihapus');
        }


        public function pegawaiSearch(Request $request)
        {
            $search = $request->input('search');
            $query = Pegawai::where('nama', 'LIKE', '%' . $search . '%')
                ->orWhere('email', 'LIKE', '%' . $search . '%')
                ->orderBy('created_at', 'asc');
             
            $pegawai = $query->paginate(5);
            
            return view('backend.pegawai', compact('pegawai')); 
        }
    

    
}
