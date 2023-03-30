<?php


// namespace App\Http\Controllers;

// use Illuminate\Http\Request;

// class UserController extends Controller
// {
//     /**definiamo il tipo request */
//     public function test(Request $request) {

//         /**cosi ti risponde ciao postman */
//         //echo 'ciao';

//         /**response è una funzione helper perchè fornisce la classe senza creare oggetti 
//          * a due parametri, il primo è l'output (ciao è come echo ciao)
//          * il secondo è lo status cioè dei codici che siano errori o risposte positive
//          * (204 è no content quindi la rsposta sarà vuota)
//          * return response('ciao', 201);
//         */
//         $demo = [
//             'name'=>'Davide',
//             'surname' => 'Giasotti',
//             'active' => true
//         ];
//          /**con questa funziona fornisco json ma ancora in formato text */
//         //return response(json_encode($demo), 200);

//         /**con il terzo parametro gli dici al client che non è testo ma è json e quindi lo colorerà come se fosse codice (metodo manuali) 
//         return response(json_encode($demo), 
//                         200,
//                         [
//                             'Content-Type' => 'application/json'
//                         ]
//                         );
//                         */

//         /**metodo automatizzato utilizzo il metodo json sull' oggetto response, gli passiamo l'array come argomento */
//         return response()->json($demo);
//     }
// }


namespace App\Http\Controllers;

use App\Http\Controllers\ErrorController;
use App\Http\Controllers\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\User;

class UserController extends Controller
{
    public function create(Request $request)
    {

        //https://laravel.com/docs/10.x/validation
        $validator = Validator::make($request->all(), [
            'name' => ['required', 'max:255'],
            'surname' => ['required', 'max:255'],
            'email' => ['required', 'max:255', 'email'],
            'age' => ['required', 'integer'],
            'title' => ['max:255']
        ]);

        if ($validator->fails()) {
            return response()->json([
                'errors' => $validator->errors()
            ], 400);
        }

        //Qui dovrò agire su DB facendo un INSERT
        // $user = new User();
        // $user->username = $request;
        // $user->name = 'Prova nome';
        // $user->surname = 'Prova cognome';
        // $user->email = 'prova@example.com';
        // $user->age = 22;
        // $user->save();

        /**sostituisco i valori con dei valori dinamici */
        $user = new User();
        $user->username = $request->input('username');
        $user->name = $request->input('name');
        $user->surname = $request->input('surname');
        $user->email = $request->input('email');
        $user->age = $request->input('age');
        $user->save();
        /**lobiettivo della validazione è il controllo dell'input, è impotante quando modifichi il db */
        
        return response()->json($user, 201);
    }


    public function delete(Request $request, $id)
    {
        //DELETE http://localhost:8000/api/users/7
        //$id = 7

        //Operazione di DELETE su DB
    }

    public function read(Request $request, $id)
    {
        //GET http://localhost:8000/api/users/3
        //$id=3

        //Operazione di SELECT su DB
        /**attraverso la rotta gli dico quale utente voglio */
        /**laprima ria è una scorciatoia della seconda, entrambe fanno la stessa cosa*/
        
        /*$user = User::findOrFail($id); 
        $user = User::where('id', '=', $id)->firstOrFail();*/

        $user = User::where('id', '=', $id)->firstOrFail();

        return response()->json($user);

    }

    public function readAll(Request $request)
    {
        //Operazione di SELECT su DB
    }

    public function update(Request $request, $id)
    {
        //PUT http://localhost:8000/api/users/22
        //$id=22     

        //https://laravel.com/docs/10.x/validation
        $validator = Validator::make($request->all(), [
            'name' => ['required', 'max:255'],
            'surname' => ['required', 'max:255'],
            'email' => ['required', 'max:255', 'email'],
            'age' => ['required', 'integer'],
            'title' => ['max:255']
        ]);

        if ($validator->fails()) {
            return response()->json([
                'errors' => $validator->errors()
            ], 400);
        }

        //Ora eseguo la UPDATE su database


    }
}

