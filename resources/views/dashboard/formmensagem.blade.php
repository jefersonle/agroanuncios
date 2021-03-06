@extends('layouts.portal')

@section('scripts')


<link href='//fonts.googleapis.com/css?family=Ubuntu+Condensed' rel='stylesheet' type='text/css'>
<link href='//fonts.googleapis.com/css?family=Open+Sans:400,300,300italic,400italic,600,600italic,700,700italic,800,800italic' rel='stylesheet' type='text/css'>
<!--//fonts-->	
<!-- js -->
<script type="text/javascript" src="{{ url('/') }}/js/jquery.min.js"></script>
<!-- js -->
<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="{{ url('/') }}/js/bootstrap.min.js"></script>
<script src="{{ url('/') }}/js/bootstrap-select.js"></script>
<script>
  $(document).ready(function () {
    var mySelect = $('#first-disabled2');

    $('#special').on('click', function () {
      mySelect.find('option:selected').prop('disabled', true);
      mySelect.selectpicker('refresh');
    });

    $('#special2').on('click', function () {
      mySelect.find('option:disabled').prop('disabled', false);
      mySelect.selectpicker('refresh');
    });

    $('#basic2').selectpicker({
      liveSearch: true,
      maxOptions: 1
    });
  });
</script>
<script type="text/javascript" src="{{ url('/') }}/js/jquery.leanModal.min.js"></script>
<link href="{{ url('/') }}/css/jquery.uls.css" rel="stylesheet"/>
<link href="{{ url('/') }}/css/jquery.uls.grid.css" rel="stylesheet"/>
<link href="{{ url('/') }}/css/jquery.uls.lcd.css" rel="stylesheet"/>
<!-- Source -->
<script src="{{ url('/') }}/js/jquery.uls.data.js"></script>
<script src="{{ url('/') }}/js/jquery.uls.data.utils.js"></script>
<script src="{{ url('/') }}/js/jquery.uls.lcd.js"></script>
<script src="{{ url('/') }}/js/jquery.uls.languagefilter.js"></script>
<script src="{{ url('/') }}/js/jquery.uls.regionfilter.js"></script>
<script src="{{ url('/') }}/js/jquery.uls.core.js"></script>
<script>
			$( document ).ready( function() {
				$( '.uls-trigger' ).uls( {
					onSelect : function( language ) {
						var languageName = $.uls.data.getAutonym( language );
						$( '.uls-trigger' ).text( languageName );
					},
					quickList: ['en', 'hi', 'he', 'ml', 'ta', 'fr'] //FIXME
				} );
			} );
		</script>
		<link rel="stylesheet" type="text/css" href="{{ url('/') }}/css/easy-responsive-tabs.css " />
    <script src="{{ url('/') }}/js/easyResponsiveTabs.js"></script>
    
@endsection

@section('banner')

<div class="banner-agro text-center">
	  <div class="container">    
			<h1>Área Administrativa</h1>			
	  </div>
	</div>

@endsection

@section('content')


<!-- Categories -->
	<!--Vertical Tab-->
	<div class="categories-section main-grid-border">
		<div class="container">
			<div class="space-top"></div>
			<div class="category-list">
				<div id="parentVerticalTab">
					<ul class="resp-tabs-list hor_1">						
						<li id="anunciosLink" onclick="location.href = '{{url("/dashboard/anuncios")}}';">Anúncios</li>	
						<li id="comentariosLink" onclick="location.href = '{{url("/dashboard/comentarios")}}';">Comentários</li>
						<li id="mensagensLink" class="active resp-tab-active" onclick="location.href = '{{url("/dashboard/mensagens")}}';">Mensagens</li>						
						<li onclick="location.href = '{{url("/dashboard/perfil")}}';">Perfil</li>						
						<a href="{{ url('/logout') }}">Sair</a>

					</ul>
					<div class="resp-tabs-container hor_1">					
						
						<div>
							<div class="category">
								<h3 class="head-top">Enviar Mensagem</h3>
								@if(session()->has('msg'))
									<div class="clearfix"></div>
												
										<div class="alert alert-success" role="alert">{{session('msg')}}
									</div>	
									{{session()->forget('msg')}}
								@endif		

								@foreach ($errors->all() as $message) 
									<div class="clearfix"></div>
									<div class="alert alert-danger" role="alert">{{$message}}</div>
								@endforeach
								<form class="form-horizontal" method="POST" action="{{url('/dashboard/mensagens/store')}}">
								{{ csrf_field() }}								
										<div class="form-group">
											<label for="selector1" class="col-sm-3 control-label">Para</label>
											<div class="col-sm-9"><select name="para_user_id" id="paraUser" class="form-control1">
												<option value="">Selecione um destinatário...</option>
												@forelse($usuarios as $usuario)
												<option value="{{$usuario->id}}">{{$usuario->name}}</option>
												@empty
												<option value="">Nenhum usuário encontrado.</option>
												@endforelse

											</select></div>
										</div>
										@if(isset($respostapara))
											<div class="form-group">
											<label for="focusedinput" class="col-sm-3 control-label">Mensagem Recebida:</label>											
											<div class="col-sm-9 jlkdfj1">
												<p class="help-block">{{$respostapara->msg}}</p>
											</div>
										</div>
										@endif
										<div class="form-group">
											<label for="focusedinput" class="col-sm-3 control-label">
											@if(isset($respostapara))
												Resposta:
											@else
												Mensagem:
											@endif
											</label>
											<div class="col-sm-9">
												<textarea rows="10" name="msg" class="mess form-control1"></textarea>
											</div>
											
										</div>
										
										<div class="form-group">											
											<div class="col-sm-12">
												<input type="submit" class="btn btn-block" value="Salvar Alterações">
											</div>											
										</div>
									</form>
								<div class="clearfix"></div>
							</div>
							
						</div>
			
					</div>
					<div class="clearfix"></div>
				</div>
			</div>
		</div>
	</div>
	<!--Plug-in Initialisation-->
	<script type="text/javascript">
    $(document).ready(function() {

        //Vertical Tab
        $('#parentVerticalTab').easyResponsiveTabs({
            type: 'vertical', //Types: default, vertical, accordion
            width: 'auto', //auto or any width like 600px
            fit: true, // 100% fit in a container
            closed: 'accordion', // Start closed if in accordion view
            tabidentify: 'hor_1', // The tab groups identifier
            
        });

        $("#anunciosLink").removeClass("active resp-tab-active");

        $(".resp-tabs-list li").attr("aria-controls", "");

        @if(isset($respostapara))
			$("#paraUser").val({{$respostapara->de_user_id}});
			$("#paraUser").css('pointer-events','none');
			
			
		@endif

    });
</script>
	<!-- //Categories -->


@endsection