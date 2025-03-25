<?php
namespace App\Http\Controllers;
use Illuminate\Support\Facades\Http;
use Illuminate\Http\Request;
use App\Models\Peminjaman;
use App\Models\Pegawai;
use App\Models\Barang;
use App\Models\Pengembalian;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
class DashboardController extends Controller
{
    public function index()
    {


        $countPegawaiPinjam = Peminjaman::where('status', 'Borrowed')
        ->groupBy('id_pegawai')
        ->distinct()
        ->count('id_pegawai');

        $countPegawaiPengajuanPinjam = Peminjaman::where('status', 'Menunggu Persetujuan')->count();

        $countPegawai = Pegawai::count();   

 
        return view('backend.index', compact('countPegawaiPinjam', 'countPegawaiPengajuanPinjam', 'countPegawai'));
    }


    public function edit_profile($username)
    {
        $user = User::where('nama', $username)->first();

        if (!$user) {
            abort(404); // Pengguna tidak ditemukan, Anda dapat menangani ini sesuai kebutuhan Anda.
        }
        return view('backend.edit_profile', [
            'user' => $user
        ]);
    }

    public function personal_details()
    {
        return view('backend.personal_details');
    }

    public function updateProfile(Request $request, $id)
    {

      
       // Find the user by ID
    $user = User::findOrFail($id);

    // Validate the current password if it is provided
    if ($request->filled('current_password')) {
        if (!Hash::check($request->current_password, $user->password)) {
            return redirect()->back()->with('current_password', 'The current password is incorrect.');
        }
    }

    // Update name and email
    $user->nama = $request->input('name');
    $user->email = $request->input('email');

    // Update password if a new one is provided
    if ($request->filled('new_password')) {
        $user->password = Hash::make($request->new_password);
    }

    // Save the updated user
    $user->save();

    return redirect()->back()->with('success', 'Profile has been successfully updated.');
        // // Perbarui kata sandi jika diinput
        // if ($request->filled('new_password')) {
        //     // Verifikasi kata sandi saat ini
        //     if (!Hash::check($request->current_password, $user->password)) {
        //         return redirect()->back()->withErrors(['current_password' => 'Kata sandi saat ini salah.'])->withInput();
        //     }
    
        //     $user->password = Hash::make($request->new_password);
        // }
    
        // $user->save();
    
        // return redirect()->back()->with('success', 'Profil berhasil diperbarui.');
    }
    public function errorpage()
    {
        return view('backend.errorpage');

    }

    public function searchBarang(Request $request)
    {

    $keyword = $request->input('search');
    $barang = Barang::where('nama', 'LIKE', '%' . $keyword . '%')->get();

    return view('backend.user.barang', compact('barang'));

    }
}
