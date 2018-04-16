<div>
    <div style="font-size:28px; margin-bottom:10px;" class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        {{ $openings[$i]->title }}
    </div>
    <form class="form-horizontal" role="form" method="POST" action="/auth/register/hiring">
      {{-- CSRF対策--}}
      <input type="hidden" name="_token" value="{{ csrf_token() }}">

      <div class="form-group">
          {!! Form::label('title', 'Title', ['class' => 'col-md-3 control-label']) !!}
          <div class = "col-md-7">
            {!! Form::text('title', old('title'), ['class' => 'form-control', 'placeholder'=>$openings[$i]->title]) !!}
          </div>
      </div>

      <div class="form-group">
          {!! Form::label('requirements', 'Requirements', ['class' => 'col-md-3 control-label']) !!}
          <div class = "col-md-7">
            {!! Form::text('requirements', old('requirements'), ['class' => 'form-control', 'placeholder'=>$openings[$i]->requirements]) !!}
          </div>
      </div>

      <div class="form-group">
          {!! Form::label('details', 'Details', ['class' => 'col-md-3 control-label']) !!}
          <div class = "col-md-7">
            {!! Form::text('details', old('details'), ['class' => 'form-control', 'placeholder'=>$openings[$i]->details]) !!}
          </div>
      </div>

      <div class="form-group">
          {!! Form::label('picture', 'Job Cover Photo', ['class' => 'col-md-3 control-label']) !!}
          <div class = "col-md-7">
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

      <div class="form-group">
          {!! Form::label('other', 'Other', ['class' => 'col-md-3 control-label']) !!}
          <div class = "col-md-7">
            {!! Form::text('other', old('other'), ['class' => 'form-control', 'placeholder'=>$openings[$i]->other]) !!}
          </div>
      </div>

      <div class="form-group">
          {!! Form::label('start_at', 'Start Date of Internship', ['class' => 'col-md-3 control-label']) !!}
          <div class = "col-md-7">
            {!! Form::date('start_at', old('start_at'), ['class' => 'form-control', 'placeholder'=>$openings[$i]->start_at, 'onfocus' => "(this.type='start_at')", 'onblur' => "(this.type='start_at')"]) !!}
          </div>
      </div>

      <div class="form-group">
          {!! Form::label('end_at', 'End Date of Internship', ['class' => 'col-md-3 control-label']) !!}
          <div class = "col-md-7">
            {!! Form::date('end_at', old('end_at'), ['class' => 'form-control', 'placeholder'=>$openings[$i]->end_at, 'onfocus' => "(this.type='end_at')", 'onblur' => "(this.type='end_at')"]) !!}
          </div>
      </div>

      <div class="form-group">
        <div class="col-md-7 col-md-offset-4">
          <button type="submit" class="btn btn-primary">
            Update
          </button>
        </div>
      </div>
    </form>
</div>
