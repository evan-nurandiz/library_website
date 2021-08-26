<?php

namespace App\Http\Controllers\Web\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\Book;
use Storage;
use Validator;

class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $books = Book::paginate(15);
        return view('auth.admin.book.index',compact('books'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('auth.admin.book.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->all();
        $validator = Validator::make($data,[
            'writter' => 'required',
            'title' => 'required',
            'description' => 'required',
            'release_year' => 'required',
            'barcode' => 'required',
            'stock' => 'required',
            'image' => 'required|max:1024'
        ]);
        
        if ($validator->fails()){
            return redirect()->back()->with('fail','data buku kurang lengkap atau foto terlalu besar');
        } else{
            if($request->hasFile('image')){
                $image = $request->file('image');
                $filename = $image->getClientOriginalName();
                $filenames = date('his').$filename;
                $image->storeAs('book_image/',$filenames,'public');
    
                $data['image'] = $filenames;
                $data['status'] = 'avaible';
            }
            Book::create($data);
            return redirect()->back()->with('status','buku berhasil disimpan');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $book = Book::find($id);
        return view('auth.admin.book.show',compact('book'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $book = Book::find($id);
        return view('auth.admin.book.edit',compact('book'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $data = $request->all();
        $validator = Validator::make($data,[
            'writter' => 'required',
            'title' => 'required',
            'description' => 'required',
            'release_year' => 'required',
            'barcode' => 'required',
            'stock' => 'required',
            'image' => 'required|file|max:200'
        ]);

        if ($validator->fails()){
            return redirect()->back();
        }
        
        $book = Book::find($id);
        if($request->hasFile('image')){
            Storage::disk('public')->delete('book_image/'. $book->image);
            $image = $request->file('image');
            $filename = $image->getClientOriginalName();
            $filenames = date('his').$filename;
            $image->storeAs('book_image/',$filenames,'public');

            $data['image'] = $filenames;
        }else{
            $data['image'] = $book->image;
        }
        $book->update($data);

        return redirect()->back()->with('status','data buku berhasil diubah');
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $book = Book::find($id);
        Storage::disk('public')->delete('book_image/'. $book->image);
        $book->delete();
        return redirect('admin/buku');
    }
}
