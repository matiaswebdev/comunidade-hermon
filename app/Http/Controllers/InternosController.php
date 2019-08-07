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
        // Busca de internos com parametros.
        $internos = Internos::where('nome', 'like', '%'.$request['busca'].'%')->orderby('nome')->get();

        // Transforma datas de 0000-00-00 para 00/00/0000
        function date_transform($val) {
            return (empty($val)) ?  null : implode('/', array_reverse(explode('-', $val)));
        }

        // transforma todas as datas dos registros em formato 00/00/0000
        foreach ($internos as $interno) {
            $interno->data_entrada = date_transform($interno->data_entrada);
            $interno->data_saida = date_transform($interno->data_saida);
            $interno->nascimento = date_transform($interno->nascimento);
        }

        // retorna a view index do modulo internos com dados do usuario e interno
        return view('internos.index')->with('data', [
            'username' => \Auth::user()->name,
            'cargo' => 'Colaborador',
            'internos' => $internos
        ]);
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
        function date_transform($val) {
            if(empty($val)){
                return null;
            }
            return implode('-', array_reverse(explode('/', $val)));
        }

        $data_entrada = date_transform($request['data_entrada']);
        $data_saida = date_transform($request['data_saida']);
        $nascimento = date_transform($request['nascimento']);
        $nome = trim(strtolower($request['nome']));

        

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
            'nome' => $nome,
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
    public function show(Internos $internos, Request $request)
    {
        $search = trim(strtolower($request->search));

        $interno = $internos::where('nome', $search)->first();

        return response()->json($interno);
        
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
