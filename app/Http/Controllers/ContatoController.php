<?php

namespace App\Http\Controllers;

use App\Mail\ContatoMail;
use App\Models\Message;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class ContatoController extends Controller
{

    private $contato;

    public function __construct(Message $contato)
    {
        $this->contato = $contato;
    }

    public function index()
    {
 
        return view('contato.index');
  
    }
	
	public function sendMail(Request $request) 
    {
        $data = $request->all();

        //Mail::to('alexandre.xavier@outlook.com')->send(new ContatoMail($data));

        if($this->contato->create($data)){
            $response = array('success' => 'Contato enviado com sucesso!');
        }else{
            $response = array('erro' => 'Ocorreu um erro, tente novamente.');
        }

        echo json_encode($response);
    }


}
