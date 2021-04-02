<link rel="stylesheet" type="text/css" href="{{ url('/css/modal.css') }}">
<div class="mod-fade" id="cadastrarEditarContato">
	<div class="row justify-content-center">
		<div class="modal-content col-md-8">
			<div class="modal-header">
				@switch($action)
					@case('/cadastrar')
					<h4 class="modal-title pb-3">Criar Contato</h4>
					@break
					@case('/editar/')
					<h4 class="modal-title pb-3">Atualizar Contato</h4>
					@break
					@case('/deletar/')
					<h4 class="modal-title pb-3">Deletar Contato</h4>
					@break
				@endswitch			
				
				<button type="button" class="btn-modal-close" data-dismiss="modal" aria-label="Close"><span>x</span></button>		
			</div>
			<div class="modal-body">
				<form class="form-horizontal" method="post" action="{{url('api/contatos')}}{{$action}}{{$id}}">
					<input type="hidden" name="_method" value="{{$verb}}">
					<input type="hidden" name="_token" value="{{ csrf_token() }}">

					<!-- Text input-->
					<div class="form-group">
						<label class="col-md-4 control-label" for="nome">Nome:</label>
						<div class="col-md-5">
							@if(!empty($id))
							<input type="text" id="nome" name="nome" value="{{$contato->nome}}" class="form-control"  minlength="3" maxlength="80" placeholder="Nome" required>
							@else
							<input type="text" id="nome" name="nome" class="form-control"  minlength="3" maxlength="80" placeholder="Nome" required>
							@endif							
						</div>
					</div>

					<!-- Text input-->
					<div class="form-group">
						<label class="col-md-4 control-label" for="telefone">Telefone:</label>  
						<div class="col-md-5">
							@if(!empty($id))
							<input type="text" id="telefone" name="telefone" value="{{$contato->telefone}}" class="form-control"  minlength="11" maxlength="12" placeholder="Telefone" required>
							@else
							<input type="text" id="telefone" name="telefone" class="form-control"  minlength="11" maxlength="12" placeholder="Telefone" required>
							@endif
						</div>
					</div>

					<!-- Text input-->
					<div class="form-group">
						<label class="col-md-4 control-label" for="email">E-mail:</label>  
						<div class="col-md-5">
							@if(!empty($id))
							<input type="email" id="email" name="email" value="{{$contato->email}}" class="form-control"  placeholder="E-mail" required>
							@else
							<input type="email" id="email" name="email" class="form-control"  placeholder="E-mail" required>
							@endif

						</div>
					</div>

					<div class="form-group">
						<div class="col-md-3">
							@switch($action)
								@case('/cadastrar')
								<button type="submit">Cadastrar</button>
								@break
								@case('/editar/')
								<button type="submit">Editar</button>
								@break
								@case('/deletar/')
								<button type="submit">Deletar</button>
								@break
							@endswitch								
						</div>
					</div>


				</form>
			</div>
		</div>	
	</div>
	
</div>