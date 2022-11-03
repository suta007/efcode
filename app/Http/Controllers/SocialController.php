<?php

namespace App\Http\Controllers;

use App\Models\Social;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Laravel\Socialite\Facades\Socialite;
use Illuminate\Support\Facades\Auth;

class SocialController extends Controller
{

    public function redirect($provider)
    {
        session(['url.back' => url()->previous()]);
        return Socialite::driver($provider)->redirect();
    }

    public function Callback($provider)
    {
        $userSocial =   Socialite::driver($provider)->user();
        /*         $localuser       =   Social::where(['email' => $userSocial->getEmail()])->first();
        if ($localuser) {
            Auth::guard('social')->login($localuser);
            return redirect('/');
        } else {
            $user = Social::create([
                'name'          => $userSocial->getName(),
                'email'         => $userSocial->getEmail(),
                'image'         => $userSocial->getAvatar(),
                'provider_id'   => $userSocial->getId(),
                'provider'      => $provider,
            ]);
            Auth::guard('social')->login($user);
            return redirect()->route('home');
        } */

        $user = Social::updateOrCreate([
            'provider_id'   => $userSocial->getId(),
            'provider'      => $provider,
        ], [
            'name'          => $userSocial->getName(),
            'email'         => $userSocial->getEmail(),
            'image'         => $userSocial->getAvatar(),
        ]);

        if ($user) {
            Auth::guard('social')->login($user);
            //return redirect('/');
            return redirect(session('url.back'));
        } else {
            //
        }
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
     * @param  \App\Models\Social  $social
     * @return \Illuminate\Http\Response
     */
    public function show(Social $social)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Social  $social
     * @return \Illuminate\Http\Response
     */
    public function edit(Social $social)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Social  $social
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Social $social)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Social  $social
     * @return \Illuminate\Http\Response
     */
    public function destroy(Social $social)
    {
        //
    }
}
