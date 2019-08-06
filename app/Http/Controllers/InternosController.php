<?php

namespace App\Http\Controllers;

use App\Internos;
use Illuminate\Http\Request;
use App\Http\Requests\StoreInternos;

class InternosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $data = [
            'username' => \Auth::user()->name,
            'cargo' => 'Colaborador',
            'internos' => Internos::where('nome', 'like', '%'.$request['busca'].'%')
                          ->orderby('nome')
                          ->get()
        ];

        return view('internos.index')->with('data', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $user = \Auth::user();
        $next_num_vaga = Internos::max('num_vaga') + 1;
        $data = [
            'username' => $user->name,
            'userid' => $user->id,
            'next_num_vaga' => $next_num_vaga,
            'cargo' => 'Colaborador'
        ];

        return view('internos.create')->with('data', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreInternos $request)
    {

        $data_entrada = implode('-', array_reverse(explode('/', $request['data_entrada'])));
        $data_saida = implode('-', array_reverse(explode('/', $request['data_saida'])));
        $nascimento = implode('-', array_reverse(explode('/', $request['nascimento'])));

        $documentosJSON = json_encode([
            ['docs_rg' => $request['docs_rg']],
            ['docs_cpf' => $request['docs_cpf']],
            ['docs_titulo' => $request['docs_titulo']],
            ['docs_cnh' => $request['docs_cnh']],
            ['docs_ctps' => $request['docs_ctps']],
            ['docs_reservista' => $request['docs_reservista']],
            ['docs_c_nascimento' => $request['docs_c_nascimento']]
        ]);

        $internos = Internos::create([
            'num_vaga' => Internos::max('num_vaga') + 1,
            'nome' => $request['nome'],
            //'foto_url' => $request['foto_url'],
            'data_entrada' => $data_entrada,
            'data_saida' => $data_saida,
            'motivo_saida' => $request['motivo_saida'],
            'procedencia' => $request['procedencia'],
            'nascimento' => $nascimento,
            'naturalidade' => $request['naturalidade'],
            'rg' => $request['rg'],
            'cpf' => $request['cpf'],
            'nome_pai' => $request['nome_pai'],
            'nome_mae' => $request['nome_mae'],
            'estado_civil' => $request['estado_civil'],
            'grau_instrucao' => $request['grau_instrucao'],
            'pendencia_judicial' => $request['pendencia_judicial'],
            'motivo_acolhimento' => $request['motivo_acolhimento'],
            'tratamento_medico' => $request['tratamento_medico'],
            'profissao' => $request['profissao'],
            'internamento_anterior' => $request['internamento_anterior'],
            'documentos' => $documentosJSON,
            'contato' => $request['contato'],
            'beneficios' => $request['beneficios'],
            'atendente' => $request['atendente']
        ]);

        dd($internos);

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Internos  $internos
     * @return \Illuminate\Http\Response
     */
    public function show(Internos $internos)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Internos  $internos
     * @return \Illuminate\Http\Response
     */
    public function edit(Internos $internos)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Internos  $internos
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Internos $internos)
    {
        //
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
