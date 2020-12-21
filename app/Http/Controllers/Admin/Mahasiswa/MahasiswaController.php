<?php

namespace App\Http\Controllers\Admin\Mahasiswa;

use App\Http\Controllers\Controller;
use App\Http\Requests\MahasiswaRequest;
use App\Http\Resources\MahasiswaResource;
use App\Models\Mahasiswa;
use App\Models\Prodi;
use Exception;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Request;
use Illuminate\View\View;
use Inertia\Inertia;
use Inertia\Response;

class MahasiswaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index(): Response
    {
        return Inertia::render('Mahasiswa/Index', [
            'filters' => Request::all(['search', 'trashed']),
            'mahasiswa' => Mahasiswa::with(['prodi'])
                ->orderBy('created_at', 'desc')
                ->filter(Request::only(['search', 'trashed']))
                ->paginate()
                ->transform(function ($mahasiswa) {
                    return [
                        'nama_mahasiswa' => $mahasiswa->nama_mahasiswa,
                        'nim' => $mahasiswa->nim,
                        'jenis_kelamin' => $mahasiswa->jenis_kelamin,
                        'kelas' => $mahasiswa->kelas,
                        'prodi' => $mahasiswa->prodi ? $mahasiswa->prodi->only('nama_prodi') : null,
                        'angkatan' => $mahasiswa->angkatan,
                        'no_hp' => $mahasiswa->no_hp,
                        'email' => $mahasiswa->email,
                    ];
                })
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create(): Response
    {
        return Inertia::render('Mahasiswa/Create', [
            'prodi' => Prodi::orderBy('nama_prodi', 'asc')
                ->get()
                ->map
                ->only('id_prodi', 'nama_prodi')
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param MahasiswaRequest $request
     * @return RedirectResponse
     */
    public function store(MahasiswaRequest $request): RedirectResponse
    {

        try {
            Mahasiswa::create($request->validated());
            return Redirect::route('Mahasiswa.index')->with('success', 'Berhasil Ditambahkan!');
        } catch (Exception $exception) {
            return redirect()->route('Mahasiswa.index')
                ->with('danger',"Gagal Ditambahkan! {$exception->getMessage()}");
        }
    }

    /**
     * Display the specified resource.
     *
     * @param Mahasiswa $Mahasiswa
     * @return MahasiswaResource
     */
    public function show(Mahasiswa $Mahasiswa): MahasiswaResource
    {
        return new MahasiswaResource($Mahasiswa::with(['prodi'])
            ->firstWhere('id', $Mahasiswa->id));
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param Mahasiswa $Mahasiswa
     * @return Application|Factory|RedirectResponse|View
     */
    public function edit(Mahasiswa $Mahasiswa)
    {
        try {
            $data = [
                'Mahasiswa' => $Mahasiswa::with(['prodi'])
                    ->firstWhere('id', $Mahasiswa->id),
                'Prodi' => Prodi::orderBy('nama_prodi','asc')->get()
            ];
            return view('Mahasiswa.edit', $data);
        } catch (Exception $exception) {
            return redirect()->route('Mahasiswa.index')
                ->with('warning', "Silakan Coba Beberapa Saat Lagi! {$exception->getMessage()}");
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param MahasiswaRequest $request
     * @param Mahasiswa $Mahasiswa
     * @return RedirectResponse
     */
    public function update(MahasiswaRequest $request, Mahasiswa $Mahasiswa): ?RedirectResponse
    {
        try {
            $Mahasiswa->update($request->validated());
            return redirect()->route('Mahasiswa.index')
                ->with('success', "Berhasil Diupdate!");
        } catch (Exception $exception) {
            return redirect()->route('Mahasiswa.index')
                ->with('danger',"Gagal Diupdate! {$exception->getMessage()}");
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Mahasiswa $Mahasiswa
     * @return RedirectResponse
     */
    public function destroy(Mahasiswa $Mahasiswa): ?RedirectResponse
    {
        try {
            $this->authorize('delete-data');
            Mahasiswa::destroy($Mahasiswa->id);
            return redirect()->route('Mahasiswa.index')
                ->with('success', 'Berhasil Dihapus!');
        } catch (Exception $exception) {
            return redirect()->route('Mahasiswa.index')
                ->with('danger',"Gagal Dihapus! {$exception->getMessage()}");
        }
    }
}
