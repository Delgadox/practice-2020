<?php

namespace App\Http\Controllers;

use App\Models\items;
use App\Models\news;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class newsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return news::limit(3)->get();
    }

    public function search(Request $request)
    {

        $key = trim($request->get('q'));

        $items = items::query()
            ->where('name', 'like', "%{$key}%")
            ->orderBy('created_at', 'desc')
            ->get();

        return [
            'key' => $key,
            'items' => $items,
        ];
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function store(Request $request)
    {
        $validator = Validator::make(
            $request->all(),
            [
                'title' => ["required"],
                'text' => ["required"]
            ]
        );
        if ($validator->fails()) {
            return [
                'status' => false,
                'errors'=> $validator->messages()
            ];
        }

        $post = news::create([
            'title' => $request->title,
            'text' => $request->text,
        ]);

        return [
            'status'=>true,
            'post'=>$post
        ];
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\JsonResponse|\Illuminate\Http\Response|object
     */
    public function show($id)
    {
        $news = news::find($id);
        if (!$news){
            return response()->json([
                'status' => false,
                'message'=>'Категория не найдена'
            ])->setStatusCode('404');
        }
        return $news;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
