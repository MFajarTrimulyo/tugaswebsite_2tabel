<?php

namespace App\Http\Controllers;
use Illuminate\View\View;
use App\Models\LPendings;
use App\Models\Types;

use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;

class LPendingsController extends Controller
{
    /**
     * index
     *
     * @return View
     */
    public function index(): View {
        //GET Records
        $Records = LPendings::with('types')->paginate(5);

        //RENDER VIEW
        return view('pendings.index', compact('Records'));
    }

    /**
     * create
     *
     * @return View
     */

     public function create(): View
     {
        $types = Types::all();
        $pendings = LPendings::all();
        return view('pendings.create', compact('types', 'pendings'));
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
             'image'    => 'required|image|mimes:jpeg,jpg,png|max:2048',
             'typesId'  => 'required|exists:types,id',
             'weight'   => 'required|numeric|between:0,5',
             'owner'    => 'required'
         ]);
 
         // Upload Image
         $image = $request->file('image');
         $image->storeAs('public/laundrys', $image->hashName());
 
         // Create Post
         LPendings::create([
             'image'    => $image->hashName(),
             'typesId'  => $request->typesId,
             'weight'   => $request->weight,
             'owner'    => $request->owner
         ]);
 
         // Redirect to index
         return redirect()->route('pendings.index')->with(['success' => 'Laundry Berhasil Ditambahkan!']);
     }
 
     /**
      * show
      *
      * @param  mixed $id
      * @return View
      */
     public function show(string $id): View
     {
         // Get post by ID
         $record = LPendings::findOrFail($id);
 
         // Render view with post
         return view('pendings.show', compact('record'));
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
         $record = LPendings::findOrFail($id);
         $types = Types::all();
         $pendings = LPendings::all();
         //render view with record
         return view('pendings.edit', compact('record', 'types', 'pendings'));
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
            'image'    => 'image|mimes:jpeg,jpg,png|max:2048',
            'typesId'  => 'required|exists:types,id',
            'weight'   => 'required|numeric|between:0,5',
            'owner'    => 'required'
         ]);
 
         //get record by ID
         $record = LPendings::findOrFail($id);
 
         //check if image is uploaded
         if ($request->hasFile('image')) {
 
             //upload new image
             $image = $request->file('image');
             $image->storeAs('public/laundrys', $image->hashName());
 
             //delete old image
             Storage::delete('public/laundrys/' . $record->image);
 
             //update post with new image
             $record->update([
                'image'    => $image->hashName(),
                'typesId'  => $request->typesId,
                'weight'   => $request->weight,
                'owner'    => $request->owner
             ]);
         } else {
 
             //update post without image
             $record->update([
                'typesId'  => $request->typesId,
                'weight'   => $request->weight,
                'owner'    => $request->owner
             ]);
         }
 
         //redirect to index
         return redirect()->route('pendings.index')->with(['success' => 'Data Laundry Berhasil Diubah!']);
     }
 
     /**
      * destroy
      *
      * @param  mixed $record
      * @return void
      */
     public function destroy($id): RedirectResponse
     {
         // Get record by ID
         $record = LPendings::findOrFail($id);
 
         //  Delete image
         Storage::delete('public/laundrys' . $record->image);
 
         //  Delete record
         $record->delete();
 
         //redirect to index
         return redirect()->route('pendings.index')->with(['success' => 'Laundry Berhasil Dihapus!']);
     }
 }
 

