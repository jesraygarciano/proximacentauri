@extends('layouts.app')

@section('content')

	<div class="general_portal">
        <div id="carousel">
          <img src="{{ asset('img/portal_banner.png') }}" />
        </div>

        <h3>Search jobs by:</h3>
        <hr />
        <div class="row" id="">
        	<div class="col-md-6">
        		<div class="row">
        			<div class="col-xs-4">
                        <hr class="hr">
        			</div>
        			<div class="col-xs-4">
        				<h4 class="text-center">
                        <i class="fa fa-code fa-lg" aria-hidden="true"></i>
                        Programming languages
                        </h4>
        			</div>
        			<div class="col-xs-4">
                        <hr class="hr">
        			</div>
        		</div>

                <div id="prog-lang" class="row text-center">
                    <div class="col-xs-2">
                        <a href="">
                          <img src="{{ asset('img/laravel.png') }}" />
                        </a>
                      <h4>PHP</h4>
                    </div>

                    <div class="col-xs-2">
                        <a href="#">
                          <img src="{{ asset('img/python.png') }}" />
                        </a>
                      <h4>Python</h4>
                    </div>

                    <div class="col-xs-2">
                        <a href="#">
                          <img src="{{ asset('img/nodejs.png') }}" />
                        </a>
                      <h4>NodeJS</h4>
                    </div>

                    <div class="col-xs-2">
                    <a href="#">
                      <img src="{{ asset('img/ruby.png') }}" />
                    </a>
                      <h4>Ruby</h4>
                    </div>

                </div>
        	</div>

        	<div class="col-md-6">
                <div class="row">
                    <div class="col-xs-4">
                        <hr class="hr">
                    </div>
                    <div class="col-xs-4">
                        <h4 class="text-center">
                        <i class="fa fa-building-o fa-lg" aria-hidden="true"></i>
                        Companies
                        </h4>
                    </div>
                    <div class="col-xs-4">
                        <hr class="hr">
                    </div>
                </div>

        <div class="row general_companies">
            <div class="col-xs-6">
                    @if (count($companies) > 0)
                    @foreach ($companies as $company)
                    <div class="row well">
                        <div class="col-xs-5">
                                        <img src="{{ asset('img/gen_com_logo.png') }}" />
                        </div>
                        <div class="col-xs-5">
                                <h4>
                                    <a href="{{ url('companies', $company['id']) }}">
                                        {{ $company['company_name'] }}
                                        <br>
                                        {{-- {{ dd($company)}} --}}
                                    </a>
                                </h4>
                        </div>
                    </div>
                    @endforeach

                 {!! $companies->render() !!}
                @endif

            </div>


            <div class="col-xs-6">
                    @if (count($companies) > 0)
                    @foreach ($companies as $company)
                    <div class="row well">
                        <div class="col-xs-5">
                                        <img src="{{ asset('img/gen_com_logo.png') }}" />
                        </div>
                        <div class="col-xs-5">
                                <h4>
                                    <a href="{{ url('companies', $company['id']) }}">
                                        {{ $company['company_name'] }}
                                        <br>
                                        {{-- {{ dd($company)}} --}}
                                    </a>
                                </h4>
                        </div>
                    </div>
                    @endforeach
                @endif

            </div>



        </div>

        	</div>

        </div>

        <div class="row">
	    	<div class="col-md-12 text-center">
                <div class="row">
                    <div class="col-xs-5">
                        <hr class="hr">
                    </div>
                    <div class="col-xs-2">
                        <h4 class="text-center">
                        <i class="fa fa-flag fa-lg" aria-hidden="true"></i>
                        Countries
                        </h4>
                    </div>
                    <div class="col-xs-5">
                        <hr class="hr">
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <h3>Domestic</h3>

                        <!--LUZON-->
                            <div class="row">
                                <div class="col-xs-2 archipelago">
                                    <h4>Luzon</h4>
                                </div>
                                <div class="col-xs-10">
                                    <hr />
                                </div>
                            </div>


                            <div class="row">
                                <div class="col-xs-6">
                <button type="button" class="btn btn-primary">Cebu</button>
                <br />
                <button type="button" class="btn btn-primary">Manila</button>
                <br />
                <button type="button" class="btn btn-primary">Davao</button>
                <br />
                <button type="button" class="btn btn-primary">Negros</button>
                <br />
                                </div>
                                <div class="col-xs-6">
                <button type="button" class="btn btn-primary">Leyte</button>
                <br />
                <button type="button" class="btn btn-primary">Bohol</button>
                <br />
                <button type="button" class="btn btn-primary">Siquijor</button>
                <br />
                <button type="button" class="btn btn-primary">Albay</button>

                                </div>
                            </div>

                        <!--END LUZON-->

                        <!--VISAYAS-->
                            <div class="row">
                                <div class="col-xs-2 archipelago">
                                    <h4>Visayas</h4>
                                </div>
                                <div class="col-xs-10">
                                    <hr />
                                </div>
                            </div>


                            <div class="row">
                                <div class="col-xs-6">
                <button type="button" class="btn btn-primary">Cebu</button>
                <br />
                <button type="button" class="btn btn-primary">Manila</button>
                <br />
                <button type="button" class="btn btn-primary">Davao</button>
                <br />
                <button type="button" class="btn btn-primary">Negros</button>
                <br />
                                </div>
                                <div class="col-xs-6">
                <button type="button" class="btn btn-primary">Leyte</button>
                <br />
                <button type="button" class="btn btn-primary">Bohol</button>
                <br />
                <button type="button" class="btn btn-primary">Siquijor</button>
                <br />
                <button type="button" class="btn btn-primary">Albay</button>

                                </div>
                            </div>

                        <!--END VISAYAS-->

                        <!--Mindanao-->
                            <div class="row">
                                <div class="col-xs-2 archipelago">
                                    <h4>Mindanao</h4>
                                </div>
                                <div class="col-xs-10">
                                    <hr />
                                </div>
                            </div>


                            <div class="row">
                                <div class="col-xs-6">
                <button type="button" class="btn btn-primary">Cebu</button>
                <br />
                <button type="button" class="btn btn-primary">Manila</button>
                <br />
                <button type="button" class="btn btn-primary">Davao</button>
                <br />
                <button type="button" class="btn btn-primary">Negros</button>
                <br />
                                </div>
                                <div class="col-xs-6">
                <button type="button" class="btn btn-primary">Leyte</button>
                <br />
                <button type="button" class="btn btn-primary">Bohol</button>
                <br />
                <button type="button" class="btn btn-primary">Siquijor</button>
                <br />
                <button type="button" class="btn btn-primary">Albay</button>

                                </div>
                            </div>

                        <!--END Mindanao-->


                    </div>

                    <div class="col-md-6">
                        <h3>International</h3>
                        <hr />
                <button type="button" class="btn btn-primary">Canada</button>
                <button type="button" class="btn btn-primary">Japan</button>
                <button type="button" class="btn btn-primary">North America</button>
                <button type="button" class="btn btn-primary">South America</button>
                <button type="button" class="btn btn-primary">Singapore</button>
                <button type="button" class="btn btn-primary">Malaysia</button>
                <button type="button" class="btn btn-primary">China</button>
                <button type="button" class="btn btn-primary">Italy</button>
                <button type="button" class="btn btn-primary">France</button>
                <button type="button" class="btn btn-primary">Australia</button>
                <button type="button" class="btn btn-primary">Netherlands</button>
                <button type="button" class="btn btn-primary">England</button>
                <button type="button" class="btn btn-primary">United Kingdom</button>
                    </div>

                </div>


        	</div>

        </div>


    </div>

@endsection
