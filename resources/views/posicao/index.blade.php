@extends("template.master")

@section("titulo", "Posição do Jogador")

@section("cadastro")
	
	<FORM action="/posicao" method="POST" class="row">
		
		@csrf
		<INPUT type="hidden" name="id" value="{{ $posicao->id }}" />
		
		<H1>Posição</H1>
		
		<DIV class="form-group col-6">
			<LABEL for="descricao">Descrição:</LABEL>
			<INPUT type="text" name="descricao" value="{{ $posicao->descricao }}" class="form-control" />
		</DIV>
		<DIV class="form-group col-6">
			<BUTTON type="submit" class="btn btn-info bottom">Salvar</BUTTON>
			<a href="/jogador" class="btn btn-info bottom">Novo</a>
		</DIV>		
		
	</FORM>
	
@endsection

@section("listagem")
		
	<H1>Listagem</H1>
	
	<TABLE class="table table-striped">
		<THEAD>
			<TR>
				<TH>Descrição</TH>
				<TH>Editar</TH>
				<TH>Excluir</TH>
			</TR>
		</THEAD>
		<TBODY>
			@foreach($posicoes as $posicao)
				<TR>
					<TD>{{ $posicao->descricao }}</TD>
					<TD>
						<a href="/posicao/{{ $posicao->id }}/edit" class="btn btn-dark">Editar</a>
					</TD>
					<TD>
						<FORM action="/posicao/{{ $posicao->id }}" method="POST">
							@csrf
							<INPUT type="hidden" name="_method" value="DELETE" />
							<BUTTON type="submit" class="btn btn-dark" onclick="return confirm('Deseja excluir?');">Excluir</BUTTON>
						</FORM>
					</TD>
				</TR>
			@endforeach
		</TBODY>
	</TABLE>

@endsection