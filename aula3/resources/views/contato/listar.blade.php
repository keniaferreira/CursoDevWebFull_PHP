@extends('layouts.app')
@section('content')

<div class="container">
	<div class="row justify-content-center">
		<div class="col-md-8">
			<div class="card">
				<div class="card-header">Lista</div>
				<div class="card-body">
					<div class="row inline">
						<div class="col-md-1">
							<button rota="{{url('/')}}/contato/cadastrar" title="Cadastrar" class="rotaModal" idModal="cadastrarEditarContato">+</button>
						</div>
						<div class="col-md-4">
							<h3>Contatos:</h3>
						</div>
					</div>
					<hr>
					@if (count($contatos)>0)
					@foreach ($contatos as $contato)
					<h4>{{$contato->nome}}</h4> <button rota="{{url('/')}}/contato/editar/{{$contato->id}}" title="Editar" class="rotaModal" idModal="cadastrarEditarContato">Editar</button> | <button rota="{{url('/')}}/contato/deletar/{{$contato->id}}" title="Deletar" class="rotaModal" idModal="cadastrarEditarContato">Deletar</button> 
					@endforeach
					@else
					<h5>Você ainda não possui nenhum contato cadastrado.</h5>
					@endif
					<hr>	
					
				</div>
			</div>
		</div>
		
	</div>	
</div>
@endsection