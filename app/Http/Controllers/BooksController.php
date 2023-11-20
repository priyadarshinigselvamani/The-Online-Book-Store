<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Books;
use Carbon\Carbon;
use Auth;
use App\Models\CartItems;
class BooksController extends Controller
{
    public function addBookForm()
    {
        if(Auth::user()->role == "admin"){
            return view("Books.addbook");
        }else{
            return redirect("/home");
        }
            
        
    }

    public function insertBook(Request $request)
    {
        if(Auth::user()->role == "admin"){
            $file = $request->file('image');
            if ($request->hasfile('image')) {
                $fileName = $file->getClientOriginalName();
                $filePath = $file->storeAs('public/books/', $fileName);
            } else {
                $fileName = '';
            }
            $books = Books::create([
                'title' => $request->title,
                'author' => $request->author,
                'description' => $request->description,
                'genre' => $request->genre,
                'isbn' => $request->isbn,
                'published_on' => $request->publishedon,
                'publisher' => $request->publisher,
                'image' => $fileName,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ]);

            return redirect('/books_list');
        }else{
            return redirect("/home");
        }

    }

    public function booksList(Request $request)
    {
        $data = $request->all();
        $author = $request->author;
        $genre = $request->genre;
        $from_date = $request->fromdate;
        $from_date_new =Carbon::parse($from_date)->toDatetimeString();
        $to_date = $request->todate;
        $to_date_new = Carbon::parse($to_date)->toDatetimeString();

        $books = Books::withTrashed()
                        ->select('*')
                        ->when($author, function (
                            $query
                        ) use (
                            $author,
                        )  {
                            return $query->where('author',$author);
                        })
                        ->when($genre, function (
                            $query
                        ) use(
                            $genre,
                        ) {
                            return $query->where('genre',$genre);
                        })
                        ->when($from_date, function (
                            $query
                        ) use (
                            $from_date_new,
                        ) {
                            return $query->where("published_on", '>=',$from_date_new);
                        })
                        ->when($to_date, function (
                            $query
                        ) use (
                            $to_date_new,
                        ) {
                            return $query->where("published_on", '<=',$to_date_new);
                        })
                        ->paginate(10);
        $authors = Books::select('author')->distinct()->pluck('author')->toArray();
        $genres = Books::select('genre')->distinct()->pluck('genre')->toArray();
        $data = $request->all();

        return view('Books.booklist',compact('books','data','authors','genres'));
    }

    public function deleteBook($id)
    {
        if(Auth::user()->role == "admin"){
            Books::where('id', $id)->delete();
            return redirect('/books_list');
        }else{
            return redirect("/home");
        }
        
    }

    public function restoreBook($id)
    {
        if(Auth::user()->role == "admin"){
            Books::withTrashed()->find($id)->restore();
            return redirect('/books_list');
        }else{
            return redirect("/home");
        }
    }

    public function showBookEditForm($id)
    {
        $book = Books::where('id',$id)->first();
        return view('Books.editbook',compact('book'));
    }

    public function updateBook(Request $request,$id)
    {
        $book = Books::where('id',$id)->first();
        $file = $request->file('image');
        if ($request->hasfile('image')) {
            $fileName = $file->getClientOriginalName();
            $filePath = $file->storeAs('public/books/', $fileName);
        } else {
            $fileName = $book->image;
        }
        $books = Books::where('id',$id)->update([
            'title' => $request->title,
            'author' => $request->author,
            'description' => $request->description,
            'genre' => $request->genre,
            'isbn' => $request->isbn,
            'published_on' => $request->publishedon,
            'publisher' => $request->publisher,
            'image' => $fileName,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);

        return redirect('/books_list');
    }

    public function viewBookDetails($id)
    {
        $book = Books::where('id',$id)->first();
        return view('Books.viewbookdetails',compact('book'));
    }

    public function filteredBooks(Request $request)
    {
        $books = Books::select('*')->get();
        if($request->search != ''){
            $books = Books::where('title','like','%'.$request->search.'%')
                    ->orWhere('author','like','%'.$request->search.'%')
                    ->orWhere('genre','like','%'.$request->search.'%')
                    ->select('*')->get();
        }
        return $books;
    }

    public function addBookToCart($id,Request $request)
    {
        $cart_item = CartItems::create([
            'user_id' => Auth::id(),
            'book_id' => $id,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);

        return redirect('/home');
    }

    public function viewCart()
    {
        $data = CartItems::where('user_id',Auth::id())->get();
        foreach($data as $dt){
            $books[] = Books::where('id',$dt->book_id)->first();
        }
        return view('Books.viewcart',compact('books'));
    }
}
