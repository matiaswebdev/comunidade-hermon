<?php

namespace App\Http\Controllers;

use App\Internos;
use Illuminate\Http\Request;
use App\Http\Requests\StoreInternos;
use App\Events\SaidaDeInterno;
use App\Http\Requests\UpdateInternos;

class InternosController extends Controller
{
    // /**
    //  * Transforma data de 0000-00-00 para 00/00/0000
    //  *
    //  * @return transformed date
    //  */
    // private function date_transform_out($val) {
    //     return (empty($val)) ?  null : implode('/', array_reverse(explode('-', $val)));
    // }


    // /**
    //  * Transforma data de 0000-00-00 para 00/00/0000
    //  *
    //  * @return transformed date
    //  */
    // private function date_transform_in($val) {
    //     if(empty($val)){
    //         return null;
    //     }
    //     return implode('-', array_reverse(explode('/', $val)));
    // }


    /**
     * Retorna página inicial da area de trabalho com uma listagem de internos
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        // Busca de internos com parametros.
        $internos = Internos::where('nome', 'like', '%'.$request['busca'].'%')->orderby('nome')->paginate(15);

        // transforma todas as datas dos registros em formato 00/00/0000
        foreach ($internos as $interno) {
            //$interno->data_entrada::createFromFormat('');
            //$interno->data_saida = $this->date_transform_out($interno->data_saida);
            //$interno->nascimento = $this->date_transform_out($interno->nascimento);
        }

        // retorna a view index do modulo internos com dados do usuario e interno
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
        $data = [
            'username' => $user->name,
            'userid' => $user->id,
            'next_num_vaga' => $next_num_vaga,
            'cargo' => 'Colaborador'
        ];

        return view('internos.create')->with('data', $data);
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
        // Transforma datas para o formato aceito para o banco de dados
        //$data_entrada = $this->date_transform_in($request['data_entrada']);
        //$data_saida = $this->date_transform_in($request['data_saida']);
        //$nascimento = $this->date_transform_in($request['nascimento']);

        // Codifica a lista de documentos para uma string json.
        $documentosJSON = json_encode([
            ['docs_rg' => $request['docs_rg']],
            ['docs_cpf' => $request['docs_cpf']],
            ['docs_titulo' => $request['docs_titulo']],
            ['docs_cnh' => $request['docs_cnh']],
            ['docs_ctps' => $request['docs_ctps']],
            ['docs_reservista' => $request['docs_reservista']],
            ['docs_c_nascimento' => $request['docs_c_nascimento']]
        ]);

        // Armazena o registro no banco de dados
        $internos = Internos::create([
            'num_vaga' => Internos::max('num_vaga') + 1,
            'nome' => $request['nome'],
            //'foto_url' => $request['foto_url'],
            'data_entrada' => $request['data_entrada'],
            'data_saida' => $request['data_saida'],
            'motivo_saida' => $request['motivo_saida'],
            'procedencia' => $request['procedencia'],
            'nascimento' => $request['nascimento'],
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

        // Após armazenamento redireciona para a rota interno/internos/ com id do interno recem criado.
        return redirect()->route('internos.interno', ['id' => $internos->id])->with('success', 'Registro criado com sucesso!');

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
        $internamentos = \App\Internamentos::where('internos_id', $request->id)->orderby('data_entrada')->get();
        // transforma datas do banco para o fomato padrão brasileiro.
        //$interno->data_entrada = $this->date_transform_out($interno->data_entrada);
        //$interno->data_saida = $this->date_transform_out($interno->data_saida);
        //$interno->nascimento = $this->date_transform_out($interno->nascimento);

        // transforma datas de todos os registros de internamentos para o formato brasileiro
        foreach ($internamentos as $internamento) {
           // $internamento->data_entrada = $this->date_transform_out($internamento->data_entrada);
           // $internamento->data_saida = $this->date_transform_out($internamento->data_saida);
        }

        // Converte json para string em array php.
        $interno->documentos = json_decode($interno->documentos, true);
        $interno->atendente = \App\User::find($interno->atendente)->name;

        // Retorna para view interno com dados do internamento e interno.
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
        // busca o registro que irá ser alterado e altera o campo data para formata amigável.
        $interno = Internos::find($request->id);
        //$interno->data_entrada = $this->date_transform_out($interno->data_entrada);

        // Retorna a view internos/saída
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
        //$interno->data_saida = $this->date_transform_in($request->data_saida);
        $interno->motivo_saida = $request->motivo_saida;
        $interno->save();


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
        $interno->documentos = json_decode($interno->documentos, true);

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
        // Convert JSON string to Array
        $interno->documentos = json_decode($interno->documentos, true);

        $data = [
            'username' => $user->name,
            'userid' => $user->id,
            'cargo' => 'Colaborador',
            'interno' => $interno
        ];

        return view('internos.editall')->with('data', $data);
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

        //$data_entrada = $this->date_transform_in($request['data_entrada']);
        //$data_saida = $this->date_transform_in($request['data_saida']);
        //$nascimento = $this->date_transform_in($request['nascimento']);

        

        $documentosJSON = json_encode([
            ['docs_rg' => $request['docs_rg']],
            ['docs_cpf' => $request['docs_cpf']],
            ['docs_titulo' => $request['docs_titulo']],
            ['docs_cnh' => $request['docs_cnh']],
            ['docs_ctps' => $request['docs_ctps']],
            ['docs_reservista' => $request['docs_reservista']],
            ['docs_c_nascimento' => $request['docs_c_nascimento']]
        ]);

        $internos = Internos::where('id', $request->id)->update([
            //'num_vaga' => Internos::max('num_vaga') + 1,
            'nome' => $request['nome'],
            //'foto_url' => $request['foto_url'],
            'data_entrada' => $request['data_entrada'],
            'data_saida' => NULL,
            'motivo_saida' => '',
            'procedencia' => $request['procedencia'],
            'nascimento' => $request['nascimento'],
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
        // Transforma datas para o padrão do mysql
        // $data_entrada = $this->date_transform_in($request['data_entrada']);
        // $data_saida = $this->date_transform_in($request['data_saida']);
        // $nascimento = $this->date_transform_in($request['nascimento']);

        // Transforma dados em uma string json.
        $documentosJSON = json_encode([
            ['docs_rg' => $request['docs_rg']],
            ['docs_cpf' => $request['docs_cpf']],
            ['docs_titulo' => $request['docs_titulo']],
            ['docs_cnh' => $request['docs_cnh']],
            ['docs_ctps' => $request['docs_ctps']],
            ['docs_reservista' => $request['docs_reservista']],
            ['docs_c_nascimento' => $request['docs_c_nascimento']]
        ]);

        // Salva as alterações do registro.
        $internos = Internos::where('id', $request->id)->update([

            'nome' => $request['nome'],
            //'foto_url' => $request['foto_url'],
            'data_entrada' => $request['data_entrada'],
            'data_saida' => $request['data_saida'],
            'motivo_saida' => $request->motivo_saida,
            'procedencia' => $request['procedencia'],
            'nascimento' => $request['nascimento'],
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

        return redirect()->route('internos.interno', ['id' => $request->id])->with('success', 'Registro editado com sucesso!');
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
