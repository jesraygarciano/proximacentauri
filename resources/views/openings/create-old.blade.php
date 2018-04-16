@extends('layouts.app')

@section('content')

<div class="container">
    <h1>Write a New Openings</h1>

    <hr/>

    @include('errors.form_errors')

    {{-- {!!Form::open(['action' => 'ResumesController@store', 'method' => 'POST']) !!} --}}
    {!!Form::open(['route' => 'openings.store', 'method' => 'POST', 'enctype' => 'multipart/form-data']) !!}

        <div class="form-row">
            <div class="form-group col-md-12">
                {!!Form::label('title', 'Title:')!!}
                {!!Form::text('title', null, ['class' => 'form-control'])!!}
            </div>
        </div>

        <div class="form-row">
            <div class="form-group col-md-12">
                {!!Form::label('picture', 'Opening Photo Cover:')!!}
                <div class="crop-control" style="height: 200px; width: 200px;">
                  <div class="image-container">
                    <img src="https://grangeprint.com/image/cache/placeholder-750x750-nofill-255255255.png">
                    <label for="picture" class="input-trigger hover-div">
                      <p>
                        <i class="fa fa-file-image-o fa-5x" aria-hidden="true"></i>
                        <br>
                        Upload
                      </p>
                    </label>
                  </div>
                  <div class="input-container">
                    <input type="file" id="picture" name="picture" accept="image/*" />
                  </div>
                </div>
            </div>
        </div>

        <br />
        <br />

        <div class="form-row">
            <div class="form-group col-md-6">
                {!!Form::label('country', 'Place(Country):')!!}
                {!!Form::select('country', $country_array, null, ['class' => 'field'])!!}
            </div>

            <div class="form-group col-md-6">
                {!!Form::label('city', 'Place(City):')!!}
                {!!Form::select('city', $country_array, null, ['class' => 'field'])!!}
            </div>
        </div>

        <div class="form-row">
            <div class="form-group col-md-12">
                {!!Form::label('allownace', 'Allowance:')!!}
                <div class="" style="margin-bottom:5px;">
                    {!!Form::checkbox('allownace', 0, null)!!}&nbsp;&nbsp;non-paid&nbsp;&nbsp;&nbsp;

                    {!!Form::checkbox('allownace', 1, null)!!}&nbsp;&nbsp;paid&nbsp;&nbsp;&nbsp;

                    {!!Form::checkbox('allownace', 2, null)!!}&nbsp;&nbsp;applicant pay&nbsp;&nbsp;&nbsp;
                </div>
            </div>
        </div>

        <div class="form-group">
            <div class="col-md-6">
                <div class="form-group">
                    {!!Form::label('skills[]', 'PHP:')!!}
                    <div class="" style="margin-bottom:5px;">
                        {!!Form::checkbox('skills[]', 1, null, ['class' => 'custom-control-input'])!!}&nbsp;&nbsp;without framework&nbsp;&nbsp;&nbsp;

                        {!!Form::checkbox('skills[]', 2, null)!!}&nbsp;&nbsp;laravel&nbsp;&nbsp;&nbsp;

                        {!!Form::checkbox('skills[]', 3, null)!!}&nbsp;&nbsp;cake&nbsp;&nbsp;&nbsp;
                    </div>
                </div>


                <div class="form-group">
                    {!!Form::label('skills[]', 'JAVA:')!!}
                    <div class="" style="margin-bottom:5px;">
                        {!!Form::checkbox('skills[]', 4, null)!!}&nbsp;&nbsp;without framework&nbsp;&nbsp;&nbsp;

                        {!!Form::checkbox('skills[]', 5, null)!!}&nbsp;&nbsp;struts&nbsp;&nbsp;&nbsp;

                        {!!Form::checkbox('skills[]', 6, null)!!}&nbsp;&nbsp;jsf&nbsp;&nbsp;&nbsp;
                    </div>
                </div>
            </div>

            <div class="col-md-6">
                <div class="form-group">
                    {!!Form::label('skills[]', 'Ruby:')!!}
                    <div class="" style="margin-bottom:5px;">
                        {!!Form::checkbox('skills[]', 7, null)!!}&nbsp;&nbsp;without framework&nbsp;&nbsp;&nbsp;

                        {!!Form::checkbox('skills[]', 8, null)!!}&nbsp;&nbsp;rails&nbsp;&nbsp;&nbsp;

                        {!!Form::checkbox('skills[]', 9, null)!!}&nbsp;&nbsp;other&nbsp;&nbsp;&nbsp;
                    </div>
                </div>

                <div class="form-group">
                    {!!Form::label('skills[]', 'python:')!!}
                    <div class="" style="margin-bottom:5px;">
                        {!!Form::checkbox('skills[]', 10, null)!!}&nbsp;&nbsp;without framework&nbsp;&nbsp;&nbsp;

                        {!!Form::checkbox('skills[]', 11, null)!!}&nbsp;&nbsp;bottle&nbsp;&nbsp;&nbsp;

                        {!!Form::checkbox('skills[]', 12, null)!!}&nbsp;&nbsp;other&nbsp;&nbsp;&nbsp;
                    </div>
                </div>
            </div>
        </div>

        <div class="form-row">
            <div class="form-group col-md-12">
                {!!Form::label('requirements', 'Requirements:')!!}
                {!!Form::textarea('requirements', null, ['class' => 'form-control'])!!}
            </div>
        </div>

        <div class="form-row">
            <div class="form-group col-md-12">
                {!!Form::label('other', 'Other:')!!}
                {!!Form::textarea('other', null, ['class' => 'form-control'])!!}
            </div>
        </div>

        {{-- <div class="form-group">
            {!!Form::label('term', 'Term:')!!}
            {!!Form::select('term', [1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11], null, ['class' => 'field'])!!}
            {!!Form::select('term', ["day", "week", "month", "year"], null, ['class' => 'field'])!!}
        </div> --}}
        <div class="form-group col-md-12">
            {!!Form::submit('Register Opening', ['class' => 'btn btn-primary form-control'])!!}
        </div>

        {!! Form::hidden('company_id', $company_id) !!}

    {!!Form::close()!!}
</div>

@endsection
