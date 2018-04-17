@extends('layouts.app')

@section('content')

<div class="container">
    <h1>Scouting</h1>
    <hr/>

    {!!Form::open(['action' => 'ScoutsController@store', 'method' => 'POST']) !!}

        <div class="form-row">
            <div class="form-group col-md-12">
                {!!Form::label('description', 'Description:')!!}
                {!!Form::textarea('description', null, ['class' => 'form-control'])!!}
            </div>
        </div>

        <div class = "form-row">
            <div class="form-group col-md-12">
                @if (count($companies) > 0)
                    {{-- {!! Form::open(['url' => 'hiring_portal/show', 'method' => 'get']) !!} --}}
                    {!!Form::label('company_id', 'Select the company that you scout the user as:')!!}
                    <br>
                    <select name="company_id" style="width:200px;height:30px;margin-top:-20px;">
                        @for ($i=0; $i < count($companies); $i++)
                            <option value="{{$companies[$i]->id}}">{{$companies[$i]->company_name}}</option>
                        @endfor
                    </select>
                    <br>
                    <br>
                @endif
            </div>
        </div>

        <div class="form-group col-md-12">
            {!!Form::submit('Scout', ['class' => 'btn btn-primary form-control'])!!}
        </div>

        {!! Form::hidden('user_id', $scout_user_id, ['id' => 'invisible_id']) !!}

    {!!Form::close()!!}
</div>

    
@endsection
