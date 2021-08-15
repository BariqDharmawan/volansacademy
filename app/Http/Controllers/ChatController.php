<?php

namespace App\Http\Controllers;

use App\Http\Requests\ChatFormRequest;
use App\Subclass;
use App\Chat;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Yajra\DataTables\Facades\DataTables;
use Validator;

class ChatController extends Controller
{

    public function index(Subclass $subclass, Request $request)
    {
        if ($request->ajax()) {
            $chats = $subclass->chats;
            return DataTables::of($chats)
                ->addIndexColumn()
                ->addColumn('action', function ($chat) {
                    $subclass = $chat->subclass;
                    $action = view('pages.chats.action', compact('chat', 'subclass'));;
                    return $action;
                })
                ->rawColumns(['action'])
                ->make(true);
        }
        return redirect('/');
    }

    public function create(Subclass $subclass)
    {
		return view('pages.chats.create', compact('subclass'));
    }

    public function store(Subclass $subclass, ChatFormRequest $request)
    {
		$input = $request->all();
        
		$chat = Chat::create($input  + ['subclass_id' => $subclass->id]);
		
		//move 
		if ($request->hasFile('chat')) {
            $resource   = $request->file('chat');
            $name       = 'chat' . '.' . $resource->getClientOriginalExtension();
            $resource->move(\base_path() . "/public/subclasschatalumni/".$chat->id."", $name);
            $chat->chat = $name;
            $chat->save();
        }
		
        return redirect()->route('classes.subclasses.chat', $subclass->id)
            ->with('success', 'Chat Alumni Sub Class Berhasil Dibuat');
    }

    public function show(Subclass $subclass, Chat $chat)
    {
        return view('pages.chats.show', compact('subclass', 'chat'));
    }

    public function edit(Subclass $subclass, Chat $chat)
    {
        return view('pages.chats.edit', compact('subclass', 'chat'));
    }

    public function update(Subclass $subclass, ChatFormRequest $request, Chat $chat)
    {
		$chat->update($request->all());
        
        //move 
		if ($request->hasFile('chat')) {
            $resource   = $request->file('chat');
            $name       = 'chat' . '.' . $resource->getClientOriginalExtension();
            $resource->move(\base_path() . "/public/subclasschatalumni/".$chat->id."", $name);
            $chat->chat = $name;
            $chat->save();
        }
		
		
		return redirect()->route('classes.subclasses.chat', $subclass->id)
            ->with('success', 'Chat ALumni Sub Class Berhasil Diperbarui');
    }

    public function destroy(Subclass $subclass, Chat $chat)
    {
		$file = $chat->chat;
        if($chat->delete()){
			if(file_exists(\base_path() . "/public/subclasschatalumni/".$file))
				unlink(\base_path() . "/public/subclasschatalumni/".$file);	
		}
		
        return redirect()->route('classes.subclasses.chat', $subclass->id)
            ->with('success', 'Chat ALumni Sub Class Berhasil Dihapus');
    }
}
