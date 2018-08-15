<?php

namespace App\Http\Controllers;

use App\Author;
use App\Magazine;
use Illuminate\Http\Request;

class MagazineController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $magazines = Magazine::orderBy('name')->paginate(5);

        return view('magazines.index', ['magazines' => $magazines]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('magazines.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $file = $request->file('file');
//        dd($request->all());
        $data = $request->except('_token', 'file');



        $tmp = \Storage::put('public', $file);
        $newName = str_replace("public", 'storage', $tmp);
        $data['img'] = $newName;

        Magazine::create($data);
        return redirect('magazine')->with(['status' => 'Файл успешно сохранен']);

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Magazine  $magazine
     * @return \Illuminate\Http\Response
     */
    public function show(Magazine $magazine)
    {
        //
        $authors = $magazine->authors;
//        dd($authors);

        return view('magazines.show', ['magazine' => $magazine, 'authors'  => $authors]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Magazine  $magazine
     * @return \Illuminate\Http\Response
     */
    public function edit(Magazine $magazine)
    {
        //
        $authors = $magazine->authors;
        $allAuthors = Author::all();
        $selected = [];
        foreach ($authors as $item) {
            $selected[] = $item->id;

        }
        $result = [];
        foreach ($allAuthors as $author) {
            $result[$author->id] = $author->lastName.' '.$author->firstName;
        }
//        dd($result);


        return view('magazines.edit', ['magazine' => $magazine, 'authors' => $result, 'selected' => $selected]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Magazine  $magazine
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Magazine $magazine)
    {
        //

//        dd($request->all());
        $data = $request->except('_token', 'file');
        $data['img'] = $magazine->img;
        $authors = $request->input('authors');

        //на всякий сохраним
        $oldAuthors = $magazine->authors;

        //отцепим старых авторов
        $magazine->authors()->detach();

        foreach ($authors as $author) {
//            Author::find($author);
            $magazine->authors()->attach($author);
        }

//        dd($request->all());


        if ($request->hasFile('file')){
            $file = $request->file('file');
            $tmp = \Storage::put('public', $file);
            $newName = str_replace("public", 'storage', $tmp);
            $data['img'] = $newName;
        }

//        $magazine->update($data);
        return redirect('magazine')->with(['status' => 'Файл успешно сохранен']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Magazine  $magazine
     * @return \Illuminate\Http\Response
     */
    public function destroy(Magazine $magazine)
    {
        //
        $oldAuthors = $magazine->authors;
        $magazine->authors()->detach();
        try {
            $magazine->delete();
        } catch (\Exception $e) {
            foreach ($oldAuthors as $author) {
                $magazine->authors()->attach($author);
            }
            return back()->with(['status' => 'Удаление не пошло']);
        }
        return redirect('magazine')->with(['status' => 'Удаление завершено']);
    }
}
