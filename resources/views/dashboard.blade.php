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

			<h1>Área Restrita</h1>			

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

						<li>Anúncios</li>

						<li>Comentários</li>

						<li>Mensagens</li>

						<li>Perfil</li>						

						<a href="{{ url('/logout') }}">Sair</a>

					</ul>

					<div class="resp-tabs-container hor_1">						

						<div>

							<div class="ads-display col-md-12">

								<div class="wrapper">					

								<div class="bs-example bs-example-tabs" role="tabpanel" data-example-id="togglable-tabs">

								  <ul id="myTab" class="nav nav-tabs nav-tabs-responsive" role="tablist">

									<li role="presentation" class="active">

									  <a href="#home" id="home-tab" role="tab" data-toggle="tab" aria-controls="home" aria-expanded="true">

										<span class="text">Meus Anúncios</span>

									  </a>

									</li>

									<!-- <li role="presentation" class="next">

									  <a href="#profile" role="tab" id="profile-tab" data-toggle="tab" aria-controls="profile">

										<span class="text">Anúncios </span>

									  </a>

									</li>

									<li role="presentation">

									  <a href="#samsa" role="tab" id="samsa-tab" data-toggle="tab" aria-controls="samsa">

										<span class="text">Company</span>

									  </a>

									</li> -->

								  </ul>

								  <div id="myTabContent" class="tab-content">

									<div role="tabpanel" class="tab-pane fade in active" id="home" aria-labelledby="home-tab">

									   <div>

											<div id="container">

											<div class="view-controls-list" id="viewcontrols">

												<h3><a href="{{ url('/anuncio/create') }}"><span class="label label-primary">Criar Novo</span></a></h3>

											</div>
											
											<div class="clearfix"></div>

										<ul class="list">	

												@forelse(Auth::user()->anuncios as $anuncio)										

												<li>

												@if($anuncio->imagens->count() > 0)
													<img src="{{ url('/') }}/uploads/{{ $anuncio->imagens[0]->nome }}" title="" alt="" />
												@else
													<img src="{{ url('/') }}/images/m1.jpg" title="" alt="" />
												@endif

												<section class="list-left">

												<a href="{{ url('/anuncio/show') }}/{{ $anuncio->id }}"><h5 class="title">{{ $anuncio->titulo }}</h5></a>

												<span class="adprice">{{ $anuncio->moeda->cifra }} {{substr_replace($anuncio->valor, ",", strlen($anuncio->valor)-2).substr($anuncio->valor, strlen($anuncio->valor)-2)}}</span>

												<p class="catpath">{{ $anuncio->categoria->nome }}</p>

												</section>

												<section class="list-right">

												<span class="date">{{ $anuncio->created_at}}</span>

												<span class="cityname">{{ $anuncio->cidade->nome }}</span>

												<a href="{{ url('/anuncio/edit') }}/{{ $anuncio->id }}"><span class="label label-success">Editar</span></a>

												<a href="{{ url('/anuncio/destroy') }}/{{ $anuncio->id }}"><span class="label label-danger">Excluir</span></a>

												</section>

												<div class="clearfix"></div>

												</li>

												@empty
													<li>Nenhum anuncio encontrado...</li>

													@endforelse

										</ul>

									</div>

										</div>

									</div>		


								  </div>

								</div>

							</div>

							</div>

				<div class="clearfix"></div>

						</div>

						<div>

							<div class="category">

								 <div class="grid_3 grid_5">

								     <h3 class="head-top">Comentários</h3>								       

									    <div class="col-md-12 page_1">	

									    												

								              <table class="table table-bordered">

												<thead>

													<tr>

														<th width="25%">Produto</th>

														<th width="25%">Comentário</th>

														<th width="25%">Data</th>

														<th width="25%">Ação</th>

													</tr>

												</thead>

												<tbody>

													<tr>

														<td>Produto Teste</td>

														<td>Ótimo Produto</td>

														<td>05/09/2016</td>

														<td><a href="single.html"><span class="label label-primary">Visualizar</span></a>

														<a href="single.html"><span class="label label-danger">Remover</span></a></td>

													</tr>

													<tr>

														<td>Produto Teste</td>

														<td>Ótimo Produto</td>

														<td>05/09/2016</td>

														<td><a href="single.html"><span class="label label-primary">Visualizar</span></a>

														<a href="single.html"><span class="label label-danger">Remover</span></a></td>

													</tr>

													<tr>

														<td>Produto Teste</td>

														<td>Ótimo Produto</td>

														<td>05/09/2016</td>

														<td><a href="single.html"><span class="label label-primary">Visualizar</span></a>

														<a href="single.html"><span class="label label-danger">Remover</span></a></td>

													</tr>

													<tr>

														<td>Produto Teste</td>

														<td>Ótimo Produto</td>

														<td>05/09/2016</td>

														<td><a href="single.html"><span class="label label-primary">Visualizar</span></a>

														<a href="single.html"><span class="label label-danger">Remover</span></a></td>

													</tr>

													<tr>

														<td>Produto Teste</td>

														<td>Ótimo Produto</td>

														<td>05/09/2016</td>

														<td><a href="single.html"><span class="label label-primary">Visualizar</span></a>

														<a href="single.html"><span class="label label-danger">Remover</span></a></td>

													</tr>

													<tr>

														<td>Produto Teste</td>

														<td>Ótimo Produto</td>

														<td>05/09/2016</td>

														<td><a href="single.html"><span class="label label-primary">Visualizar</span></a>

														<a href="single.html"><span class="label label-danger">Remover</span></a></td>

													</tr>

													

												</tbody>

											  </table> 



										</div>										

									   <div class="clearfix"> </div>  

									  

								    </div>									

							</div>							

						</div>

						<div>

							<div class="category">

								 <div class="grid_3 grid_5">

								     <h3 class="head-top">Mensagens</h3>								       

									    <div class="col-md-12 page_1">

									    	<div class="view-controls-list" id="viewcontrols">

													<h3><span class="label label-primary">Nova Mensagem</span></h3>

												</div>											

								              <table class="table table-bordered">

												<thead>

													<tr>

														<th width="20%">De:</th>

														<th width="20%">Para</th>

														<th width="20%">Assunto</th>

														<th width="20%">Data</th>

														<th width="20%">Ação</th>

													</tr>

												</thead>

												<tbody>

													<tr>

														<td>Usuario 1</td>

														<td>Usuario 2</td>

														<td>Compra de Mercadoria</td>

														<td>05/09/2016</td>

														<td><a href="single.html"><span class="label label-primary">Visualizar</span></a></td>

													</tr>

													<tr>

														<td>Usuario 1</td>

														<td>Usuario 2</td>

														<td>Compra de Mercadoria</td>

														<td>05/09/2016</td>

														<td><a href="single.html"><span class="label label-primary">Visualizar</span></a></td>

													</tr>

													<tr>

														<td>Usuario 1</td>

														<td>Usuario 2</td>

														<td>Compra de Mercadoria</td>

														<td>05/09/2016</td>

														<td><a href="single.html"><span class="label label-primary">Visualizar</span></a></td>

													</tr>

													<tr>

														<td>Usuario 1</td>

														<td>Usuario 2</td>

														<td>Compra de Mercadoria</td>

														<td>05/09/2016</td>

														<td><a href="single.html"><span class="label label-primary">Visualizar</span></a></td>

													</tr>

													<tr>

														<td>Usuario 1</td>

														<td>Usuario 2</td>

														<td>Compra de Mercadoria</td>

														<td>05/09/2016</td>

														<td><a href="single.html"><span class="label label-primary">Visualizar</span></a></td>

													</tr>

													<tr>

														<td>Usuario 1</td>

														<td>Usuario 2</td>

														<td>Compra de Mercadoria</td>

														<td>05/09/2016</td>

														<td><a href="single.html"><span class="label label-primary">Visualizar</span></a>

														</td>

													</tr>

													

													

												</tbody>

											  </table> 

											                   

										</div>										

									   <div class="clearfix"> </div>  

									  

								    </div>									

							</div>								

						</div>



						

						

						<div>

							<div class="category">

								<form class="form-horizontal">

										<div class="form-group">

											<label for="focusedinput" class="col-sm-2 control-label">Nome</label>

											<div class="col-sm-8">

												<input type="text" class="form-control1" id="focusedinput" placeholder="Default Input">

											</div>

											<div class="col-sm-2 jlkdfj1">

												<p class="help-block">...!</p>

											</div>

										</div>

										<div class="form-group">

											<label for="focusedinput" class="col-sm-2 control-label">Email</label>

											<div class="col-sm-8">

												<input type="text" class="form-control1" id="focusedinput" placeholder="Default Input">

											</div>

											<div class="col-sm-2 jlkdfj1">

												<p class="help-block">...!</p>

											</div>

										</div>

										<div class="form-group">

											<label for="focusedinput" class="col-sm-2 control-label">Senha</label>

											<div class="col-sm-8">

												<input type="text" class="form-control1" id="focusedinput" placeholder="Default Input">

											</div>

											<div class="col-sm-2 jlkdfj1">

												<p class="help-block">...!</p>

											</div>

										</div>

										<div class="form-group">

											<label for="focusedinput" class="col-sm-2 control-label">Confirmar Senha</label>

											<div class="col-sm-8">

												<input type="text" class="form-control1" id="focusedinput" placeholder="Default Input">

											</div>

											<div class="col-sm-2 jlkdfj1">

												<p class="help-block">...!</p>

											</div>

										</div>	

										<div class="form-group">

											<label for="focusedinput" class="col-sm-2 control-label">CPF:</label>

											<div class="col-sm-8">

												<input type="text" class="form-control1" id="focusedinput" placeholder="Default Input">

											</div>

											<div class="col-sm-2 jlkdfj1">

												<p class="help-block">...!</p>

											</div>

										</div>	

										<div class="form-group">

											<label for="focusedinput" class="col-sm-2 control-label">Telefone 1:</label>

											<div class="col-sm-8">

												<input type="text" class="form-control1" id="focusedinput" placeholder="Default Input">

											</div>

											<div class="col-sm-2 jlkdfj1">

												<p class="help-block">...!</p>

											</div>

										</div>	

										<div class="form-group">

											<label for="focusedinput" class="col-sm-2 control-label">Telefone 2:</label>

											<div class="col-sm-8">

												<input type="text" class="form-control1" id="focusedinput" placeholder="Default Input">

											</div>

											<div class="col-sm-2 jlkdfj1">

												<p class="help-block">...!</p>

											</div>

										</div>	

										<div class="form-group">

											<label for="focusedinput" class="col-sm-2 control-label">Telefone 3:</label>

											<div class="col-sm-8">

												<input type="text" class="form-control1" id="focusedinput" placeholder="Default Input">

											</div>

											<div class="col-sm-2 jlkdfj1">

												<p class="help-block">...!</p>

											</div>

										</div>

										<div class="form-group">

											<label for="focusedinput" class="col-sm-2 control-label">CEP:</label>

											<div class="col-sm-8">

												<input type="text" class="form-control1" id="focusedinput" placeholder="Default Input">

											</div>

											<div class="col-sm-2 jlkdfj1">

												<p class="help-block">...!</p>

											</div>

										</div>

										<div class="form-group">

											<label for="selector1" class="col-sm-2 control-label">Estado</label>

											<div class="col-sm-8"><select name="selector1" id="selector1" class="form-control1">

												<option>Lorem ipsum dolor sit amet.</option>

												<option>Dolore, ab unde modi est!</option>

												<option>Illum, fuga minus sit eaque.</option>

												<option>Consequatur ducimus maiores voluptatum minima.</option>

											</select></div>

										</div>

										<div class="form-group">

											<label for="selector1" class="col-sm-2 control-label">Cidade</label>

											<div class="col-sm-8"><select name="selector1" id="selector1" class="form-control1">

												<option>Lorem ipsum dolor sit amet.</option>

												<option>Dolore, ab unde modi est!</option>

												<option>Illum, fuga minus sit eaque.</option>

												<option>Consequatur ducimus maiores voluptatum minima.</option>

											</select></div>

										</div>

										<div class="form-group">

											<label for="focusedinput" class="col-sm-2 control-label">Logradouro:</label>

											<div class="col-sm-8">

												<input type="text" class="form-control1" id="focusedinput" placeholder="Default Input">

											</div>

											<div class="col-sm-2 jlkdfj1">

												<p class="help-block">...!</p>

											</div>

										</div>

										<div class="form-group">

											<label for="focusedinput" class="col-sm-2 control-label">Número:</label>

											<div class="col-sm-8">

												<input type="text" class="form-control1" id="focusedinput" placeholder="Default Input">

											</div>

											<div class="col-sm-2 jlkdfj1">

												<p class="help-block">...!</p>

											</div>

										</div>

										<div class="form-group">

											<label for="focusedinput" class="col-sm-2 control-label">Complemento:</label>

											<div class="col-sm-8">

												<input type="text" class="form-control1" id="focusedinput" placeholder="Default Input">

											</div>

											<div class="col-sm-2 jlkdfj1">

												<p class="help-block">...!</p>

											</div>

										</div>

										<div class="form-group">

											<label for="focusedinput" class="col-sm-2 control-label">Bairro:</label>

											<div class="col-sm-8">

												<input type="text" class="form-control1" id="focusedinput" placeholder="Default Input">

											</div>

											<div class="col-sm-2 jlkdfj1">

												<p class="help-block">...!</p>

											</div>

										</div>	

										<div class="form-group">

											<label for="focusedinput" class="col-sm-2 control-label">Facebook:</label>

											<div class="col-sm-8">

												<input type="text" class="form-control1" id="focusedinput" placeholder="Default Input">

											</div>

											<div class="col-sm-2 jlkdfj1">

												<p class="help-block">...!</p>

											</div>

										</div>

										<div class="form-group">

											<label for="focusedinput" class="col-sm-2 control-label">LinkedIn:</label>

											<div class="col-sm-8">

												<input type="text" class="form-control1" id="focusedinput" placeholder="Default Input">

											</div>

											<div class="col-sm-2 jlkdfj1">

												<p class="help-block">...!</p>

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

            activate: function(event) { // Callback function if tab is switched

                var $tab = $(this);

                var $info = $('#nested-tabInfo2');

                var $name = $('span', $info);

                $name.text($tab.text());

                $info.show();

            }

        });

    });

</script>

	<!-- //Categories -->





@endsection