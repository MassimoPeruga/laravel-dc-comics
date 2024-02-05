<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Comic;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class ComicsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $comics = Comic::all();

        return view('comics.index', compact('comics'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('comics.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $request->validate([
            'title' => 'required|max:200',
            'description' => 'nullable|max:500',
            'thumb' => 'nullable|url',
            'price' => 'nullable|numeric|between:0,999.99',
            'series' => 'nullable|max:100',
            'sale_date' => 'nullable|date',
            'type' => [
                'nullable',
                Rule::in(['comic book', 'graphic novel']),
            ],
            'artists' => 'nullable|alpha|max:200',
            'writers' => 'nullable|alpha|max:200',
        ]);

        $data = $request->all();
        $new_comic = new Comic();
        $new_comic->fill($data);
        $new_comic->save();

        return redirect()->route('comics.show', $new_comic->id);
    }

    /**
     * Display the specified resource.
     */
    public function show(Comic $comic)
    {
        return view('comics.show', compact('comic'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Comic $comic)
    {
        return view('comics.edit', compact('comic'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Comic $comic)
    {
        $request->validate([
            'title' => 'required|max:200',
            'description' => 'nullable|max:500',
            'thumb' => 'nullable|url',
            'price' => 'nullable|numeric|between:0,999.99',
            'series' => 'nullable|max:100',
            'sale_date' => 'nullable|date',
            'type' => [
                'nullable',
                Rule::in(['comic book', 'graphic novel']),
            ],
            'artists' => 'nullable|string|max:200',
            'writers' => 'nullable|string|max:200',
        ]);

        $data = request()->all();
        $comic->update($data);
        return redirect()->route('comics.show', $comic->id);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Comic $comic)
    {
        $comic->delete();
        return redirect()->route('comics.index');
    }
}
