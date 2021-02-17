<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ExplorersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        /*$client = new \GuzzleHttp\Client();
        $response = $client->request('GET', 'http://112.169.90.130:7070/api/wallet/tbcchannel/all', [
            'query' => [
                'first' => 0,
                'last' => 50,
            ]
        ]);
        $response = $response->getBody()->getContents();
        $resDeArr = json_decode($response);
        $resDeArr = json_decode($resDeArr, true);*/
        $resDeArr = array();


        return view('explorers.index')->with('resDeArr', $resDeArr);
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
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function showblock($id)
    {
        $client = new \GuzzleHttp\Client();
        $response = $client->request('GET', 'http://112.169.90.130:7070/api/block/tbcchannel/'. $id);
        $response = $response->getBody()->getContents();
        $resDeArr = json_decode($response, true);
        return view('explorers.blockview', compact('resDeArr'));
    }

    public function showtrans($id)
    {
        $client = new \GuzzleHttp\Client();
        $response = $client->request('GET', 'http://112.169.90.130:7070/api/transaction/tbcchannel/'. $id);
        $response = $response->getBody()->getContents();
        $resDeArr = json_decode($response, true);
        return view('explorers.transview', compact('resDeArr'));
    }

    public function showwallet($id)
    {
        return view('explorers.walletview')->with('addr', $id);
    }

    public function search(Request $request)
    {
        $this->validate($request, [
            'q' => 'required'
        ]);

        $client = new \GuzzleHttp\Client();
        $response = $client->request('GET', 'http://112.169.90.130:7070/api/query/tbcchannel/'. trim($request->get('q')));
        $response = $response->getBody()->getContents();
        $resDeArr = json_decode($response, true);

        //dd($resDeArr);

        if (isset($resDeArr['status']) && isset($resDeArr['message'])){
            return view('explorers.search');
        }

        if (isset($resDeArr['block_data'])){
            return redirect()->route('explorer.showblock', $request->get('q'));
        }
        if (isset($resDeArr['row_data'])){
            return redirect()->route('explorer.showtrans', $request->get('q'));
        }

        return redirect()->route('explorer.showwallet', $request->get('q'));
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
