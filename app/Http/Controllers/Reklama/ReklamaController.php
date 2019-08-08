<?php

namespace App\Http\Controllers\Reklama;

use App\Reklama;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repository\ReklamaRepository;
use Illuminate\Support\Str;

class ReklamaController extends Controller
{
    private $reklamaRepository;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->reklamaRepository = app(ReklamaRepository::class);
    }
    public function indexDecline()
    {
        $paginator = $this->reklamaRepository->getAllWithPaginate();

        return view('reklama.indexDecline', compact('paginator'));


    }
    public function indexWait()
    {
        $paginator = $this->reklamaRepository->getAllWithPaginate();

        return view('reklama.indexWait', compact('paginator'));


    }
    public function indexAccept()
    {
        $paginator = $this->reklamaRepository->getAllWithPaginate();

        return view('reklama.indexAccept', compact('paginator'));


    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('reklama.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->input();
        $token = '67382ce611099f798d3153780ebe024dce20776bb0fcd82c1754f4503dab0e1fc469cc14b8f30dced18fa';

        $user_slug = Str::after($request->url_vk, 'https://vk.com/id');
        $user_slug = Str::after($user_slug, 'https://vk.com/');

        $GET_getId = [
            'user_ids' => $user_slug,
            'access_token' => $token,
            'v' => 5.101,
        ];

        $response = json_decode(file_get_contents('https://api.vk.com/method/users.get?'.http_build_query($GET_getId)));
        $data['vkId'] = $response->response[0]->id;

        $channel = (new Reklama())->fill($data);

        $channel->save();

        if($channel->exists) {
            return redirect()->route('reklama.indexWait')
                ->with(['succes' => 'Отчёт успешно создан']);
        } else {
            return back()->withErrors(['msg' => 'Отчёт не создался']);
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

        $channel = $this->reklamaRepository->getForShow($id);

        return view('reklama.show',compact('channel'));

    }

    public function message(Request $request){

        $item = $request;
        return view('reklama.message',compact('item'));
    }

    public function messageSend(Request $request){

        $token = '67382ce611099f798d3153780ebe024dce20776bb0fcd82c1754f4503dab0e1fc469cc14b8f30dced18fa';
        //$token = 'd244650d7c0d91ba098fe433c4bdc24e23635f22f5411e813e0a4e96d854c3b595e95fa5d58dd14b40348';

        $GET_messageSend = [
          'user_id' => $request->vkId,
            'message' => $request->message,
            'access_token' => $token,
            'v' => 5.37,
        ];

        $message = json_decode(file_get_contents('https://api.vk.com/method/messages.send?'.http_build_query($GET_messageSend)));

        $this->reklamaRepository->AcceptChannel($request->group_id);
        return redirect('/reklama/indexWait');
    }

    public function declineChannel(Request $request){
        $this->reklamaRepository->DeclineChannel($request->group_id);
        return redirect('/reklama/indexWait');
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
