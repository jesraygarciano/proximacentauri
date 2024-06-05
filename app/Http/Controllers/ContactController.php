<?php

Namespace App\Http\Controllers;

use App\Notifications\InboxMessage;
use App\Http\Controllers\Controller;
use App\Http\Requests\ContractFormRequest;
use App\Admin;
use Mapper;

Class ContactController extends Controller
{
	public function show() 
	{
        Mapper::map(10.318686,123.90317049999999,['zoom' => 19, 'markers' => ['title' => 'My Location', 'animation' => 'DROP'], 'clusters' => ['size' => 10, 'center' => true, 'zoom' => 30]]);
		
		return view('contact');
	}

	public function mailToAdmin(ContractFormRequest $message, Admin $admin)
	{        //send the admin an notification

		
		$admin->notify(new InboxMessage($message));
		// redirect the user back
		return redirect()->back()->with('message', 'thanks for the message! We will get back to you soon!');
	}
}