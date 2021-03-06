<?php

namespace App\Http\Controllers\Admin\Dosen;

use App\Models\Dosen;
use App\Http\Controllers\Controller;
use App\Http\Requests\DosenRequest;
use App\Http\Resources\DosenResource;
use Exception;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Request;
use Inertia\Inertia;
use Inertia\Response as InertiaResponse;

class DosenController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return InertiaResponse
     */
    public function index(): InertiaResponse
    {
        return Inertia::render('Admin/Dosen/Index', [
            'filters' => Request::all(['search', 'trashed']),
            'dosen' => Dosen::orderBy('created_at', 'desc')
                ->filter(Request::only(['search', 'trashed']))
                ->paginate()
                ->transform(function ($dosen) {
                    return [
                        'id' => $dosen->id,
                        'nama_dosen' => $dosen->nama_dosen,
                        'nidn' => $dosen->nidn,
                        'deleted_at' => $dosen->deleted_at
                    ];
                })
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return InertiaResponse
     */
    public function create(): InertiaResponse
    {
        return Inertia::render('Admin/Dosen/Create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param DosenRequest $request
     * @return RedirectResponse
     */
    public function store(DosenRequest $request): ?RedirectResponse
    {
        try {
            Dosen::create($request->validated());
            return Redirect::route('Dosen.index')
                ->with([
                    'name' => 'Data Dosen',
                    'success' => 'Berhasil Ditambahkan!'
                ]);
        } catch (Exception $exception) {
            return Redirect::route('Dosen.index')
                ->with([
                    'name' => 'Data Dosen',
                    'error' => "Gagal Ditambahkan! {$exception->getMessage()}"]);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param Dosen $Dosen
     * @return DosenResource
     */
    public function show(Dosen $Dosen): DosenResource
    {
        return new DosenResource($Dosen);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Dosen $Dosen
     * @return InertiaResponse
     */
    public function edit(Dosen $Dosen): InertiaResponse
    {
        return Inertia::render('Admin/Dosen/Edit', [
            'dosen' => [
                'id' => $Dosen->id,
                'nama_dosen' => $Dosen->nama_dosen,
                'nidn' => $Dosen->nidn,
                'deleted_at' => $Dosen->deleted_at
            ]
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param DosenRequest $request
     * @param Dosen $Dosen
     * @return RedirectResponse
     */
    public function update(DosenRequest $request, Dosen $Dosen): ?RedirectResponse
    {
        try {
            $Dosen->update($request->validated());
            return Redirect::route('Dosen.index')
                ->with([
                    'name' => 'Data Dosen',
                    'success' => "Berhasil Diubah!"]);
        } catch (Exception $exception) {
            return Redirect::route('Dosen.index')
                ->with([
                    'name' => 'Data Dosen',
                    'error' => "Gagal Diubah! {$exception->getMessage()}"
                ]);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Dosen $Dosen
     * @return RedirectResponse
     */
    public function destroy(Dosen $Dosen): ?RedirectResponse
    {
        try {
            $this->authorize('delete-data');
            $Dosen->delete();
            return Redirect::route('Dosen.index')
                ->with([
                    'name' => 'Data Dosen',
                    'success' => "Berhasil Dihapus!"]);
        } catch (Exception $exception) {
            return Redirect::route('Dosen.index')
                ->with([
                    'name' => 'Data Dosen',
                    'error' => "Gagal Dihapus! {$exception->getMessage()}"
                ]);
        }
    }

    /**
     * @param Dosen $Dosen
     * @return RedirectResponse
     */
    public function restore(Dosen $Dosen): RedirectResponse
    {
        $Dosen->restore();
        return Redirect::route('Dosen.index')
            ->with([
                'name' => 'Data Dosen',
                'success' => 'Berhasil Dipulihkan!',
            ]);
    }
}
