@extends("template.master")

@section("titulo", "Cadastro de Jogadores")

@section("cadastro")

	<FORM method= "POST" action="/jogador"  class="row">
		
		@csrf 
		<INPUT type="hidden" id="id" name="id" value="{{ $jogador->id }}"/>
		
				<H1> Cadastro de Jogadores </H1>
			
			<DIV class="form-group col-6" >
				<LABEL for="nome_jogador">Nome do Jogador: </LABEL> 
				<INPUT type="text" id="nome_jogador" name="nome_jogador" value="{{ $jogador->nome_jogador }}" class="form-control" />
			</DIV>
			<DIV class="form-group col-6" >
				<LABEL for="data_nascimento">Data de Nascimento: </LABEL> 
				<INPUT type="date" id="data_nascimento" name="data_nascimento" value="{{ $jogador->data_nascimento }}" class="form-control" />
			</DIV>
			
			<DIV class="form-group col-6">
			<LABEL for="posicao">Posicao:</LABEL>
			<SELECT name="posicao" class="form-control">
				<OPTION value=""></OPTION>
				@foreach($posicoes as $posicao)
					@if ($posicao->id == $jogador->posicao)
						<OPTION value="{{ $posicao->id }}" selected="selected">{{ $posicao->descricao }}</OPTION>
					@else
						<OPTION value="{{ $posicao->id }}">{{ $posicao->descricao }}</OPTION>
					@endif
				@endforeach				
			</SELECT>
		</DIV>

        <DIV class="form-group col-6">
			<LABEL for="clube">Clube:</LABEL>
			<SELECT name="clube" class="form-control">
				<OPTION value=""></OPTION>
				@foreach($clubes as $clube)
					@if ($clube->id == $jogador->clube)
						<OPTION value="{{ $clube->id }}" selected="selected">{{ $clube->nome_clube }}</OPTION>
					@else
						<OPTION value="{{ $clube->id }}">{{ $clube->nome_clube }}</OPTION>
					@endif
				@endforeach				
			</SELECT>
		</DIV>
		
			<DIV class="form-group col-6" >
				<BUTTON type="submit" class="btn btn-info bottom">Salvar</BUTTON>
			<a href="/jogador" class="btn btn-info bottom">Novo</a>
			</DIV>
	</FORM>
	
@endsection
		
@section("listagem")	
			
				<H2>Listagem</H2>	
		
				<TABLE class="table table-striped">
					<THEAD>
						<TR>
							<TH>Nome Jogador</TH>
							<TH>Posição</TH>
							<TH>Editar</TH>
							<TH>Excluir</TH>
						</TR>
					</THEAD>
					<TBODY>
					@Foreach($jogadores as $jogador)
				<TR>
					<TD>{{ $jogador->nome_jogador }}</TD>
					<TD>{{ $jogador->posicao }}</TD>
					<TD>
						<a href="/jogador/{{ $jogador->id }}/edit"><BUTTON class="btn btn-dark" >EDITAR</BUTTON></a>
					</TD>
					<TD>
						<FORM action="/jogador/{{ $jogador->id }}" method="POST">
							@csrf
							<INPUT type="hidden" name="_method" value="DELETE" />
							<BUTTON type="submit"  class="btn btn-dark" onclick="return confirm('Deseja excluir?');" >EXCLUIR</BUTTON>
						</FORM>	
					</TD>
				</TR>
					@endforeach
				</TBODY>
				</TABLE>
@endsection