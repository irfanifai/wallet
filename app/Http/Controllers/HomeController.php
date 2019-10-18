<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $balance = auth()->user()->balance;
        $amount = $balance ? $balance->amount : 0;

        $history = auth()->user()->historie()->get();

        return view('home', compact('amount', 'history'));
    }

    public function deposit()
    {
        return view('deposit');
    }

    public function depositStore(Request $request)
    {
        $balance = auth()->user()->balance()->firstOrCreate([]);
        $balance->deposit($request->value);

        return redirect()->back()
            ->with('status', 'deposit success');
    }

    public function transfer()
    {
        return view('transfer');
    }

    public function confirmTransfer(Request $request, User $user)
    {
        if (!$sender = $user->getSender($request->sender))
            return redirect()
                ->back()
                ->with('status', 'email tidak terdaftar');

        if ($sender->id === auth()->user()->id)
            return redirect()
                ->back()
                ->with('status', 'tidak dapat mentransfer ke diri sendiri');

        $balance = auth()->user()->balance;

        return view('transfer-confirm', compact('sender', 'balance'));
    }

    public function transferStore(Request $request, User $user)
    {
        if(!$sender = $user->find($request->sender_id))
            return redirect()->back()
                ->with('status', 'penerima tidak ditemukan');

        $balance = auth()->user()->balance()->firstOrCreate([]);
        $balance->transfer($request->value, $sender);

        return redirect()->back()
            ->with('status', 'transfer success');
    }

    public function history()
    {
        $history = auth()->user()->historie()->get();

        return view('history', compact('history'));
    }

}
