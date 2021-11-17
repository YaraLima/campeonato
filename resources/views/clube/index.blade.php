@extends("template.master")

@section("titulo", "Clube")

@section("cadastro")
	
	<FORM action="/clube" method="POST" class="row">
		
		@csrf
		<INPUT type="hidden" name="id" value="{{ $clube->id }}" />
		
		<H1>Clube</H1>
		
		<DIV class="form-group col-6">
			<LABEL for="nome_clube">Nome do Clube:</LABEL>
			<INPUT type="text" name="nome_clube" value="{{ $clube->nome_clube }}" class="form-control" />
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
				<TH>Nome</TH>
				<TH>Editar</TH>
				<TH>Excluir</TH>
			</TR>
		</THEAD>
		<TBODY>
			@foreach($clubes as $clube)
				<TR>
					<TD>{{ $clube->nome_clube }}</TD>
					<TD>
						<a href="/clube/{{ $clube->id }}/edit" class="btn btn-dark">Editar</a>
					</TD>
					<TD>
						<FORM action="/clube/{{ $clube->id }}" method="POST">
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