<?php

namespace App\Http\Controllers;

use App\Classes\BaseResponse\BaseResponse;
use App\Http\Resources\UserResource;
use App\Models\TopUp;
use App\Models\User;
use Illuminate\Http\Request;
use Spatie\QueryBuilder\QueryBuilder;

class UserController extends Controller
{

    public function index()
    {
        return UserResource::collection(
            QueryBuilder::for(User::class)
                ->paginate(10)
        );
    }

    public function topUpForm(Request $request, User $user){
        abort_if($user->id !== auth()->id(), 403);

        $request->validate([
            'amount' => 'required|integer',
            'payment_id' => 'required|exists:payment_method,id',
            'proof' => 'required|image|mimes:jpeg,png,jpg|max:2000'
        ]);

        return BaseResponse::make(TopUp::create([
            'user_id' => auth()->id(),
            'payment_id' => $request->get('payment_id'),
            'amount' => $request->get('amount'),
            'proof' => $request->get('proof')
        ]));
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

    public function show(User $user)
    {

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
