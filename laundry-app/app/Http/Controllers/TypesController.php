<?php

namespace App\Http\Controllers;

use App\Models\Types;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class TypesController extends Controller
 {
    /**
     * index
     *
     * @return View
     */
    public function index(): View
    {
        //get records
        $Records = Types::oldest()->paginate(5);

        //render view with records
        return view('types.index', compact('Records'));
    }

    /**
     * create
     *
     * @return View
     */

    public function create(): View
    {
        return view('types.create');
    }

    /**
     * store
     *
     * @param  mixed $request
     * @return RedirectResponse
     */

    public function store(Request $request): RedirectResponse
    {
        // Validate Form
        $this->validate($request, [
            'nama'     => 'required',
        ]);

        // Create Records
        Types::create([
            'nama'     => $request->nama,
        ]);

        // Redirect to index
        return redirect()->route('types.index')->with(['success' => 'Data Berhasil Tersimpan!']);
    }


    /**
     * edit
     *
     * @param  mixed $id
     * @return View
     */
    public function edit(string $id): View
    {
        //get record by ID
        $record = Types::findOrFail($id);

        //render view with post
        return view('types.edit', compact('record'));
    }

    /**
     * update
     *
     * @param  mixed $request
     * @param  mixed $id
     * @return RedirectResponse
     */
    public function update(Request $request, $id): RedirectResponse
    {
        //validate form
        $this->validate($request, [
            'nama'     => 'required',
        ]);

        //get record by ID
        $record = Types::findOrFail($id);

        //update record
        $record->update([
            'nama'     => 'required',
        ]);
    
    //redirect to index
    return redirect()->route('types.index')->with(['success' => 'Data Berhasil Diubah!']);
    }

    /**
     * destroy
     *
     * @param  mixed $post
     * @return void
     */
    public function destroy($id): RedirectResponse
    {
        // Get post by ID
        $record = Types::findOrFail($id);

        //  Delete Post
        $record->delete();

        //redirect to index
        return redirect()->route('types.index')->with(['success' => 'Data Berhasil Dihapus!']);
    } 
}  
