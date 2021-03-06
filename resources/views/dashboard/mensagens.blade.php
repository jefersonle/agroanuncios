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
								 <div class="grid_3 grid_5">			     						       
									    <div class="col-md-12 page_1">									    		
											@if(session()->has('msg'))
												<div class="clearfix"></div>
												
													<div class="alert alert-success" role="alert">{{session('msg')}}
												</div>
												
												
												{{session()->forget('msg')}}
												@endif

								              <table class="table table-bordered">
												<thead>
													<tr>														
														<th>De</th>
														<th>Mensagem</th>
														<th width="25%">Data</th>
														<th width="21%">Ação</th>
													</tr>
												</thead>
												<div class="clearfix"></div>
												<h3>Mensagens Recebidas</h3>
												<tbody>
													@forelse(Auth::user()->mensagensrecebidas as $mensagem)
													<tr>
														<td>{{$mensagem->de->name}}</td>
														<td>{{substr($mensagem->msg, 0, 5)}}...</td>
														<td>{{$mensagem->created_at}}</td>
														<td><a href="javascript:void;" 
														onclick="mostrarMensagem('{{$mensagem->id}}','{{$mensagem->de->name}}','{{$mensagem->para->name}}','{{$mensagem->msg}}', '{{$mensagem->created_at}}','{{$mensagem->de_user_id}}');">
														<span class="label label-primary">Visualizar</span></a>
														<a href="{{url('/dashboard/mensagens/destroy')}}/{{$mensagem->id}}"><span class="label label-danger"  onclick="if(!confirm('Tem certeza que deseja excluir esta mensagem?')) return false;">Escluir</span></a></td>
													</tr>													
													@empty
														<tr>
															<td colspan="5">Nenhuma mensagem encontrada</td>
														</tr>
													@endforelse
													
												</tbody>
											  </table> 
											 	<div class="clearfix"></div>
												<h3>Mensagens Enviadas</h3>											  <table class="table table-bordered">
												<thead>
													<tr>														
														<th>Para</th>
														<th>Mensagem</th>
														<th width="10%">Data</th>
														<th width="21%">Ação</th>
													</tr>
												</thead>
												<tbody>
													@forelse(Auth::user()->mensagensenviadas as $mensagem)
													<tr>														
														<td>{{$mensagem->para->name}}</td>
														<td>{{substr($mensagem->msg, 0, 5)}}...</td>
														<td>{{$mensagem->created_at}}</td>
														<td><a href="javascript:void;" 
														onclick="mostrarMensagem('{{$mensagem->id}}','{{$mensagem->de->name}}','{{$mensagem->para->name}}','{{$mensagem->msg}}', '{{$mensagem->created_at}}', '{{$mensagem->de_user_id}}');">
														<span class="label label-primary">Visualizar</span></a>
														<a href="{{url('/dashboard/mensagens/destroy')}}/{{$mensagem->id}}"><span class="label label-danger"  onclick="if(!confirm('Tem certeza que deseja excluir esta mensagem?')) return false;">Escluir</span></a></td>
													</tr>													
													@empty
														<tr>
															<td colspan="5">Nenhuma mensagem encontrada</td>
														</tr>
													@endforelse
													
												</tbody>
											  </table>
											  
											                   
										</div>										
									   <div class="clearfix"> </div>  
									  
								    </div>									
							</div>								
						</div>
						
			
					</div>
					<div class="clearfix"></div>
				</div>
			</div>
		</div>
	</div>

	<div class="modal fade" id="myModal" tabindex="-1" role="dialog">
		  <div class="modal-dialog" role="document">
		    <div class="modal-content">
		      <div class="modal-header">
		        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
		        <h4 class="modal-title">Visualizar Mensagem</h4>
		      </div>
		      <div class="modal-body">
		        <p><strong>De: </strong><span id="deNome"></span></p>
		        <br>
		        <p><strong>Para: </strong><span id="paraNome"></span></p>
		        <br>
		        <p><strong>Data: </strong><span id="dataMsg"></span></p>
		        <br>
		        <p><strong>Mensagem:</strong></p>		        
		        <p id="msg"></p>
		      </div>
		      <div class="modal-footer">
		        <button type="button" class="btn btn-default" data-dismiss="modal">Fechar</button>
		        <button id="responder" type="button" class="btn btn-danger" onclick="window.location.href = '{{url('/dashboard/mensagens/create')}}/'+globalId">Responder</button>
		      </div>
		    </div><!-- /.modal-content -->
		  </div><!-- /.modal-dialog -->
		</div><!-- /.modal -->

	<!--Plug-in Initialisation-->
	<script type="text/javascript">
	var globalId

	function mostrarMensagem(mensagem_id, de, para, msg, datamsg, de_id){	
			
			$("#deNome").html(de);
			$("#paraNome").html(para);
			$("#msg").html(msg);
			$("#dataMsg").html(datamsg);
			
			globalId = mensagem_id; 

			$('#myModal').modal('show');

			if (de_id == {{Auth::user()->id}}) {
				$("#responder").hide();
			}else{
				$("#responder").show();
			}

	}
	

    $(document).ready(function() {

        //Vertical Tab
        $('#parentVerticalTab').easyResponsiveTabs({
            type: 'vertical', //Types: default, vertical, accordion
            width: 'auto', //auto or any width like 600px
            fit: true, // 100% fit in a container
            closed: 'accordion', // Start closed if in accordion view
            tabidentify: 'hor_1', // The tab groups identifier
            activate: function(event) { // Callback function if tab is switched
                var $tab = $(this);
                var $info = $('#nested-tabInfo2');
                var $name = $('span', $info);
                $name.text($tab.text());
                $info.show();
            }
        });

        $("#anunciosLink").removeClass("active resp-tab-active");
        $(".resp-tabs-list li").attr("aria-controls", "");        

    });
</script>
	<!-- //Categories -->


@endsection