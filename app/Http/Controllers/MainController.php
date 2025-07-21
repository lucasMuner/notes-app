<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Note;
use App\Services\Operations;
use Illuminate\Contracts\Encryption\DecryptException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;

class MainController extends Controller
{
    public function index()
    {
        //load users notes
        $userId = session('user.id');
        $notes = User::find($userId)
                ->notes()
                ->whereNull('deleted_at')
                ->get()
                ->toArray();

        //show home view
        return view('home', ['notes' => $notes]);
        
    }

    public function newNote()
    {
        // show newNote view
        return view('new_note');
    }

    public function newNoteSubmit(Request $request)
    {
        $request->validate(
            [
                'title' => ['required','min:3','max:200'],
                'text' => ['required','min:6','max:3000']
            ],
            [
                'title.required' => 'O título é obrigatório!',
                'text.required' => 'O texto é obrigatório!',
                'title.min' => 'O título precisa ter no mínimo :min caractéres!',
                'title.max' => 'O título só pode ter no máximo :max caractéres!',
                'text.min' => 'O texto precisa ter no mínimo :min caractéres!',
                'text.max' => 'O texto só pode ter no máximo :max caractéres!',
            ]
        );

        // create note
        $note = new Note();
        $note->user_id = session('user.id');
        $note->title = $request->title;
        $note->text = $request->text;
        $note->save();

        //redirect to home
        return redirect()->route('home');

    }

    public function editNote($id)
    {
        $id = Operations::descryptId($id);

        $note = Note::find($id);

        return view('edit_note', ['note' => $note]);
    }

    public function editNoteSubmit(Request $request)
    {
        $request->validate(
            [
                'title' => ['required','min:3','max:200'],
                'text' => ['required','min:6','max:3000']
            ],
            [
                'title.required' => 'O título é obrigatório!',
                'text.required' => 'O texto é obrigatório!',
                'title.min' => 'O título precisa ter no mínimo :min caractéres!',
                'title.max' => 'O título só pode ter no máximo :max caractéres!',
                'text.min' => 'O texto precisa ter no mínimo :min caractéres!',
                'text.max' => 'O texto só pode ter no máximo :max caractéres!',
            ]
        );

        if($request->note_id === null){
            return redirect()->route('home');
        }

        $id = Operations::descryptId($request->note_id);
        $note = Note::find($id);
        $note->title = $request->title;
        $note->text = $request->text;
        $note->save();
        
        return redirect()->route('home');
    }

    public function deleteNote($id)
    {
        $id = Operations::descryptId($id);

        $note = Note::find($id);

        return view('delete_note', ['note' => $note]);
    }

    public function deleteNoteConfirm($id)
    {
        $id = Operations::descryptId($id);
        $note = Note::find($id);
        
        // hard delete
        $note->delete();

        // soft delete
        // $note->deleted_at = date('Y-m-d H:i:s');
        // $note->save();

        return redirect()->route('home');
    }
}
