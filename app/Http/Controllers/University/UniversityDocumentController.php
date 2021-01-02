<?php

namespace App\Http\Controllers\University;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\University;
use Illuminate\Support\Carbon;

class UniversityDocumentController extends Controller
{
    public function index()
    {
        $docs = auth()->user()->university->default_documents;
        $documents = json_decode($docs);
        return view('university.document.index')->with('documents',$documents);
    }

    public function add()
    {

        return view('university.advertisement.advertisement_add');
    }

    public function store(Request $request)
    {
// dd($request->all());
        $jsonDocument = $request->document;
        $jsonDocumentStore = json_encode($jsonDocument);
        // dd($jsonDocumentStore);
        $id = auth()->user()->university->id;
        $document = University::find($id);
        $document->default_documents = $jsonDocumentStore;
        $document->save();
        return redirect()->back()->with('success','Document Added Successfully');
    }

}
