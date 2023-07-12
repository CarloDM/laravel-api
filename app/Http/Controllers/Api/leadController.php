<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Mail;
use App\Models\Lead;
use App\Mail\NewContact;

class leadController extends Controller
{
    public function store(Request $request){
      // ricevo dai dati dal form in post
      $data = $request->all();

      // verifico la validità dei dati - non deve avvenire nessun reindirizzamento passare il data a validator
      $validator = Validator::make( $data,
        [
          'name' => 'required',
          'email' => 'required',
          'message' => 'required',
        ],
        // messaggi d errore, aggiungere min max
        [
          'name.required' => ' il nome è obbligatorio ',
          'email.required' => ' il email è obbligatorio ',
          'message.required' => ' il message è obbligatorio ',
        ]
      );

      // e non sono validi restituisco un json con success = false e lista di errori
      if($validator->fails()){
        $success = false;
        $errors = $validator->errors();
        return response()->json(compact('success','errors'));
      }
      // se sono validi salvo i dati nel db
      $new_lead = new Lead();
      $new_lead->fill($data);
      $new_lead->save();

      // invio la mail
      Mail::to('info@bool.com')->send(new NewContact($new_lead));
      // restiutisco un kso con succes = true


      // cosi dovrei ricevere e rispondere il json nel result del then di axios
      $success = true;
      return response()->json($data);





    }
}
