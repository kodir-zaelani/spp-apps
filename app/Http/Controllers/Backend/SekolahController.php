<?php

namespace App\Http\Controllers\Backend;

use App\Models\Sekolah;
use Illuminate\Http\Request;
use App\Imports\SekolahimportModel;
use App\Http\Controllers\Controller;
use Maatwebsite\Excel\Facades\Excel;
use App\Imports\SekolahimportCollection;
use App\Http\Requests\SekolahStoreRequest;

class SekolahController extends Controller
{
     protected $uploadPath;
    protected $uploadPathexcel    = 'files/excel/';
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->uploadPath = public_path(config('cms.image.directoryLogo'));
    }


    public static function middleware(): array
    {
        return [
            // examples with aliases, pipe-separated names, guards, etc:
            'permission:sekolah.index|sekolah.create|sekolah.edit|sekolah.delete|sekolah.trash',
        ];
    }
     /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $sekolah= Sekolah::where('status_sekolah_update', '1')->first();

        if (!empty($sekolah)) {
            return redirect()->route('backend.sekolah.edit', $sekolah->id);
        } else {
            return view('backend.sekolah.create', [
                'title' => 'Tambah Data'
            ]);
        }
    }

    public function edit($sekolah)
    {
        return view('backend.sekolah.edit', [
            'title' => 'Edit sekolah',
            'sekolah' => $sekolah
        ]);
    }

    public function store (SekolahStoreRequest $request)
    {

        // Default data
        $data = [
            'nama'                  => $request->input('nama'),
            'alamat'                => $request->input('alamat'),
            'rt'                    => $request->input('rt'),
            'rw'                    => $request->input('rw'),
            'nama_dusun'            => $request->input('nama_dusun'),
            'province_id'              => $request->input('province_id'),
            'city_id'             => $request->input('city_id'),
            'district_id'             => $request->input('district_id'),
            'village_id'        => $request->input('village_id'),
            'kode_pos'              => $request->input('kode_pos'),
            'website'               => $request->input('website'),
            'email'                 => $request->input('email'),
            'maps'                  => $request->input('maps'),
            'lintang'               => $request->input('lintang'),
            'bujur'                 => $request->input('bujur'),
            'nama_pimpinam_yayasan' => $request->input('nama_pimpinam_yayasan'),
            'no_pendirian_yayasan'  => $request->input('no_pendirian_yayasan'),
            'tgl_pendirian_yayasan' => $request->input('tgl_pendirian_yayasan'),
            'status_sekolah_update' => $request->input('status_sekolah_update'),

        ];

        //upload logo_sekolah (cara kedua)
        if ($request->has('logo_sekolah')) {
            # upload with logo_sekolah
            $logo_sekolah = $request->file('logo_sekolah');
            $fileName = 'logo_' . time() . $logo_sekolah->getClientOriginalName();
            $destination = $this->uploadPath;

            $successUploaded = Image::read($logo_sekolah);
            $successUploaded->save($destination . $fileName, 80);

            if ($successUploaded) {
                # script dibawah koneksi ke file App\config\cms.php
                $width = config('cms.image.thumbnaillogo.width');
                $height = config('cms.image.thumbnaillogo.height');
                $extension = $logo_sekolah->getClientOriginalExtension();
                $thumbnail = str_replace(".{$extension}", "_thumb.{$extension}", $fileName);

                Image::read($destination . '/' . $fileName)
                    ->resize($width, $height)
                    ->save($destination . '/' . $thumbnail);
            }

            // Tampung isi image ke variable data
            $image_data = $fileName;
            // This is to save the filename of the image in the database
            $data = array_merge($data, [
                'logo_sekolah' => $image_data
            ]);
        }

        $sekolah = Sekolah::create($data);

        if ($sekolah) {
            //redirect dengan pesan sukses
            return redirect()->route('backend.sekolah.index')->with(['success' => 'Data Sekolah Berhasil Disimpan!']);
        } else {
            //redirect dengan pesan error
            return redirect()->route('backend.sekolah.index')->with(['error' => 'Data Gagal Disimpan!']);
        }
    }

    public function update (SekolahUpdateRequest $request, Sekolah $sekolah)
    {
        //cek gambar lama
        $oldLogo        = $sekolah>logo_sekolah;
        // Default data
        $data = [
            'nama'                  => $request->input('nama'),
            'alamat'                => $request->input('alamat'),
            'rt'                    => $request->input('rt'),
            'rw'                    => $request->input('rw'),
            'nama_dusun'            => $request->input('nama_dusun'),
            'desa_kelurahan'        => $request->input('desa_kelurahan'),
            'kecamatan'             => $request->input('kecamatan'),
            'kabupaten'             => $request->input('kabupaten'),
            'provinsi'              => $request->input('provinsi'),
            'kode_pos'              => $request->input('kode_pos'),
            'website'               => $request->input('website'),
            'email'                 => $request->input('email'),
            'maps'                  => $request->input('maps'),
            'lintang'               => $request->input('lintang'),
            'bujur'                 => $request->input('bujur'),
            'nama_pimpinam_yayasan' => $request->input('nama_pimpinam_yayasan'),
            'no_pendirian_yayasan'  => $request->input('no_pendirian_yayasan'),
            'tgl_pendirian_yayasan' => $request->input('tgl_pendirian_yayasan'),
            'status_sekolah_update' => $request->input('status_sekolah_update'),
        ];


        //upload logo_sekolah (cara kedua)
        if ($request->has('logo_sekolah')) {
            # upload with logo_sekolah
            $logo_sekolah = $request->file('logo_sekolah');
            $fileName = 'logo_' . time() . $logo_sekolah->getClientOriginalName();
            $destination = $this->uploadPath;

            $successUploaded = Image::read($logo_sekolah);
            $successUploaded->save($destination . $fileName, 80);

            if ($successUploaded) {
                # script dibawah koneksi ke file App\config\cms.php
                $width = config('cms.image.thumbnaillogo.width');
                $height = config('cms.image.thumbnaillogo.height');
                $extension = $logo_sekolah->getClientOriginalExtension();
                $thumbnail = str_replace(".{$extension}", "_thumb.{$extension}", $fileName);

                Image::read($destination . '/' . $fileName)
                    ->resize($width, $height)
                    ->save($destination . '/' . $thumbnail);
            }

            // Tampung isi image ke variable data
            $image_data = $fileName;
            // This is to save the filename of the image in the database
            $data = array_merge($data, [
                'logo_sekolah' => $image_data
            ]);
        }



        $sekolah>update($data);

        // Jika gambar lama ada maka lakukan hapus gambar
        if ($oldLogo !== $sekolah>logo_sekolah) {
            $this->removeLogo($oldLogo);
        }

        //redirect dengan pesan sukses
        return redirect()->back()->with(['success' => 'Data sekolah Berhasil Disimpan!']);
    }

    // function remove image
    private function removeLogo($logo_sekolah)
    {
        if (!empty($logo_sekolah)) {
            $imagePath     = $this->uploadPath . '/' . $logo_sekolah;
            $ext           = substr(strrchr($logo_sekolah, '.'), 1);
            $thumbnail     = str_replace(".{$ext}", "_thumb.{$ext}", $logo_sekolah);
            $thumbnailPath = $this->uploadPath . '/' . $thumbnail;

            if (file_exists($imagePath)) unlink($imagePath);
            if (file_exists($thumbnailPath)) unlink($thumbnailPath);
        }
    }

     public function import( Request $request)
    {
        $validated = $request->validate([
            'importfile' => 'required|mimes:xls,xlsx,csv'
        ]);

        $file = $request->file('importfile');

        // dd($request->importfile);

        $nama_file = $file->hashName();

        $destination = $this->uploadPathexcel;

        $path = $file->store($destination);

        // import data
        $import = Excel::import(new SekolahimportModel(), ('uploads/files/excel/'.$nama_file));

        //remove from server
        File::delete('uploads/files/excel/'.$nama_file);

        return redirect()->route('backend.sekolah.index')->with('success', 'Data sekolah berhasil diimport!');
    }
}
