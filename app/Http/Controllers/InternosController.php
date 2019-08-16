<?php

namespace App\Http\Controllers;

use App\Internos;
use Illuminate\Http\Request;
use App\Http\Requests\StoreInternos;
use App\Events\SaidaDeInterno;
use App\Http\Requests\UpdateInternos;

class InternosController extends Controller
{
    

    /**
     * Retorna página inicial da area de trabalho com uma listagem de internos
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        
        $internos = Internos::where('nome', 'like', '%'.$request['busca'].'%')
        ->orderby('nome')
        ->paginate(15);

        return view('internos.index')->with('data', [
            'username' => \Auth::user()->name,
            'cargo' => 'Colaborador',
            'internos' => $internos
        ]);
    }

    /**
     * Retorna o formulário para a criação de um internos
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $user = \Auth::user();
        $next_num_vaga = Internos::max('num_vaga') + 1;

        return view('internos.create')->with('data', [
            'username' => $user->name,
            'userid' => $user->id,
            'next_num_vaga' => $next_num_vaga,
            'cargo' => 'Colaborador'
        ]);
    }

    /**
     *  Armazena um interno na base de dados e retorna o registro criado para conferência
     *  com uma mensagem de successo.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreInternos $request)
    {
    
        $internos = new Internos();
        $internos->fill($request->all())->save();

        return redirect()->route('internos.interno', ['id' => $internos->id])
        ->with('success', 'Registro criado com sucesso!');

    }

    /**
     * Busca registro no banco de dados conforme critérios de pesquisa.
     *
     * @param  \App\Internos  $internos
     * @return \Illuminate\Http\Response
     */
    public function buscar(Internos $internos, Request $request)
    {

        $search = trim(strtolower($request->search));
        $interno = $internos::where('nome', $search)->first();

        return response()->json($interno);
        
    }

    /**
     * Retorna dados de um interno para conferência.
     *
     * @param  \App\Internos  $internos
     * @return \Illuminate\Http\Response
     */
    public function interno(Internos $internos, Request $request)
    {
        
        $interno = Internos::find($request->id);
        $internamentos = \App\Internamentos::where('internos_id', $request->id)
        ->orderby('data_entrada')
        ->get();
        
        $interno->atendente = \App\User::find($interno->atendente)->name;

        return view('internos.single')->with('data', [
            'username' => \Auth::user()->name,
            'cargo' => 'Colaborador',
            'interno' => $interno,
            'internamentos' => $internamentos
        ]);
        
    }

    /**
     * Mostra o formulário de cadastro de saida para um interno.
     *
     * @param  \App\Internos  $internos
     * @return \Illuminate\Http\Response
     */
    public function saidaform(Internos $internos, Request $request)
    {   

        $interno = Internos::find($request->id);

        return view('internos.saida')->with('data', [
            'username' => \Auth::user()->name,
            'cargo' => 'Colaborador',
            'interno' => $interno
        ]);
    }

    /**
     * Salva a data de saída de um interno no banco de dados e cria um 
     * evento para salvar registro no histórico.
     *
     * @param  \App\Internos  $internos
     * @return \Illuminate\Http\Response
     */
    public function saidaupdate(Internos $internos, Request $request)
    {

        $interno = Internos::find($request->id);
        $interno->data_saida = $request->data_saida;
        $interno->motivo_saida = $request->motivo_saida;
        $interno->save();

        // Grava o último internamento no histórico.
        event(new SaidaDeInterno(Internos::find($request->id)));

        return redirect()->route('internos.interno', ['id' => $request->id])->with('success', 'Saída registrada com sucesso!');
    }


    /**
     * Mostra o formulário para nova entrada de um interno
     *
     * @param  \App\Internos  $internos
     * @return \Illuminate\Http\Response
     */
    public function edit(Internos $internos, Request $request)
    {
        $user = \Auth::user();
        $interno = $internos::find($request->id);

        return view('internos.edit')->with('data', [
            'username' => $user->name,
            'userid' => $user->id,
            'cargo' => 'Colaborador',
            'interno' => $interno
        ]);
    }

    /**
     * Mostra o formulário para editar um registro.
     *
     * @param  \App\Internos  $internos
     * @return \Illuminate\Http\Response
     */
    public function editall(Internos $internos, Request $request)
    {
        $user = \Auth::user();
        $interno = $internos::find($request->id);

        return view('internos.editall')->with('data', [
            'username' => $user->name,
            'userid' => $user->id,
            'cargo' => 'Colaborador',
            'interno' => $interno
        ]);
    }

    /**
     * Realiza as alterações no registro quando criado um novo internamento
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Internos  $internos
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateInternos $request, Internos $internos)
    {

        $internos = Internos::find($request->id)->update($request->all());

        return redirect()->route('internos.interno', ['id' => $request->id])->with('success', 'Reentrada registrada com sucesso!');
    }


    /**
     * Salva as alterações no registro.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Internos  $internos
     * @return \Illuminate\Http\Response
     */
    public function updateall(UpdateInternos $request, Internos $internos)
    {
        
        // Salva as alterações do registro.
        $internos = Internos::find($request->id)->update($request->all());

        return redirect()->route('internos.interno', ['id' => $request->id])
        ->with('success', 'Registro editado com sucesso!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Internos  $internos
     * @return \Illuminate\Http\Response
     */
    public function destroy(Internos $internos)
    {
        //
    }
}
