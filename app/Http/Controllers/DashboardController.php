<?php

namespace App\Http\Controllers;

use App\Models\Biodata;
use App\Models\Biodata_pekerjaan;
use App\Models\Biodata_pelatihan;
use App\Models\Biodata_pendidikan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index(Request $request)
    {
        $keyword = $request->keyword;
        $user = Biodata::with(['pendidikan', 'pelatihan', 'pekerjaan'])->where('nama', 'LIKE', '%' . $keyword . '%')
            ->orWhere('jabatan', $keyword)
            ->orWhereHas('pendidikan', function ($query) use ($keyword) {
                $query->where('jenjang_pendidikan_akhir', 'LIKE', '%' . $keyword . '%');
            })
            ->paginate(15);
        // $user = Biodata::with(['pendidikan', 'pelatihan', 'pekerjaan'])->paginate(15);
        return view('dashboard', ['users' => $user]);
    }

    public function show($id)
    {
        $biodata = Biodata::with(['pendidikan', 'pelatihan', 'pekerjaan'])->where('user_id', $id)->first();

        return view('dashboard-admin-view', compact('biodata'));
    }

    public function destroy($id)
    {
        $pendidikan = Biodata_pendidikan::where('biodata_id', $id)->delete();
        $pekerjaan = Biodata_pekerjaan::where('biodata_id', $id)->delete();
        $pelatihan = Biodata_pelatihan::where('biodata_id', $id)->delete();

        $biodata = Biodata::find($id);
        $biodata->delete();

        return redirect()->route('dashboard.index')->with('message', 'Data berhasil dihapus');
    }
}
