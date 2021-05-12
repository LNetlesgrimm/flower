<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreFlowerRequest;
use App\Models\Flower;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class FlowerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $flowers = Flower::all();
        return view('flowers.flowers-list', ['flowers' => $flowers]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('flowers.create-flower');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreFlowerRequest $request)
    {
        // validations
        $request->validated();
        
        // function to be called when you submit the form
        // dd($request); // dd is the var dump of Laravel
        /* DB::insert('INSERT INTO flowers(name, price) 
        VALUES(?, ?)', [$request->name, $request->price]); */
        
        // using mass assignment in the Model
        // easy way, no need the $fillable in the Model
        /* $flower = new Flower;
        $flower->name = $request->name;
        $flower->price = $request->price;
        $flower->save(); */
        if ($request->poster) {
            $fileName = time() . '.' . $request->poster->extension();
            
            $publicPath = public_path('uploads');
            
            $request->poster->move($publicPath, $fileName);

            Flower::create([
                'name' => $request->name,
                'price' => $request->price,
                'type' => $request->type,
                'poster' => $fileName
            ]);
            return redirect('flowers')->with('success', 'Flower uploaded successfully with picture.');
        
        } else {
            Flower::create([
                'name' => $request->name,
                'price' => $request->price,
                'type' => $request->type,
            ]); 
            return redirect('flowers')->with('success', $request->name . ' was created successfully.');
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
        $flower = Flower::find($id);
        if ($flower)
            return view('flowers.flower-details', ['flower' => $flower]);
        else
            return 'Flower not found';
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $flower = Flower::find($id);

        return view('flowers.update-flower', ['flower' => $flower]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(StoreFlowerRequest $request, $id)
    {
        $request->validated();
        
        // DB::update('UPDATE flowers SET name=?, price=? 
        // WHERE id=?', [$request->name, $request->price, $id]);

        Flower::where('id', $id)->update([
            'name' => $request->name,
            'price' => $request->price,
            'type' => $request->type
        ]);
        return redirect('flowers')->with('success', $request->name . ' was updated.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // $result = DB::delete('DELETE FROM flowers WHERE id = ?', [$id]);
        
        $result = Flower::destroy($id);

        if ($result)
            return redirect('flowers')->with('success', 'Flower deleted');
    }

}
