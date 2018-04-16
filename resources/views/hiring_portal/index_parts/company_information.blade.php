<div style ="margin-top:20px;" >

    @if ($companies_show)
        <form class="form-horizontal" role="form" method="POST" action="/auth/register/hiring">
          {{-- CSRF対策--}}
          <input type="hidden" name="_token" value="{{ csrf_token() }}">

          <div class="form-group">
            <div class="row">
              <div class="col-md-3">
                <span class="round-tab-company col-md-3">
                      <i class="fa fa-line-chart" aria-hidden="true"></i>
                </span>
              </div>
              <div class="col-md-7">
                <h3>General information</h3>
              </div>
            </div>
          </div>

          <div class="form-group">
              {!! Form::label('company_name', 'Company Name', ['class' => 'col-md-3 control-label']) !!}
              <div class = "col-md-7">
                {!! Form::text('company_name', old('company_name'), ['class' => 'form-control', 'placeholder'=>$companies_show->company_name]) !!}
              </div>
          </div>

          <div class="form-group">
              {!! Form::label('email', 'E-Mail Address', ['class' => 'col-md-3 control-label']) !!}
              <div class = "col-md-7">
                {!! Form::email('email', old('email'), ['class' => 'form-control', 'placeholder'=>$companies_show->email]) !!}
              </div>
          </div>

          <div class="form-group">
              {!! Form::label('number_of_employee', 'Number of Employees', ['class' => 'col-md-3 control-label']) !!}
              <div class = "col-md-7">
                {!! Form::text('number_of_employee', old('number_of_employee'), ['class' => 'form-control', 'placeholder'=>$companies_show->number_of_employee]) !!}
              </div>
          </div>


          <div class="form-group">
              {!! Form::label('company_size', 'Company size', ['class' => 'col-md-3 control-label']) !!}
              <div class = "col-md-7">
                {!! Form::text('company_size', old('company_size'), ['class' => 'form-control', 'placeholder'=>$companies_show->company_size]) !!}
              </div>
          </div>


          <div class="form-group">
              {!! Form::label('company_logo', 'Company Logo', ['class' => 'col-md-3 control-label']) !!}
              <div class = "col-md-7">
                <div class="crop-control" style="height: 200px; width: 200px;">
                  <div class="image-container">
                    <img src="https://grangeprint.com/image/cache/placeholder-750x750-nofill-255255255.png">
                    <label for="photo" class="input-trigger hover-div">
                      <p>
                        <i class="fa fa-file-image-o fa-5x" aria-hidden="true"></i>
                        <br>
                        Upload
                      </p>
                    </label>
                  </div>
                  <div class="input-container">
                    <input type="file" id="photo" name="photo" accept="image/*" />
                  </div>
                </div>
              </div>
          </div>

          <div class="form-group">
              {!! Form::label('address1', 'Primary address:', ['class' => 'col-md-3 control-label']) !!}
              <div class = "col-md-7">
                {!! Form::text('address1', old('address1'), ['class' => 'form-control', 'placeholder'=>$companies_show->address1]) !!}

              </div>
          </div>

          <div class="form-group">
              {!! Form::label('address2', 'Secondary address:', ['class' => 'col-md-3 control-label']) !!}
              <div class = "col-md-7">
                {!! Form::text('address2', old('address2'), ['class' => 'form-control', 'placeholder'=>$companies_show->address2]) !!}
              </div>
          </div>

          <div class="form-group">
              {!! Form::label('what', 'Company details', ['class' => 'col-md-3 control-label']) !!}
            <div class = "row">
            {{-- <div class="page-header"> --}}
                <div class="col-md-offset-3 col-md-9">
                    <div class="col-md-6">
                        <div class="form-group">
                            {!!Form::textarea('what', old('what'), ['class' => 'form-control'])!!}
                        </div>
                    </div>
                </div>
            </div>
          </div>
          <div class="form-group">
              {!! Form::label('established_at', 'Company established:', ['class' => 'col-md-3 control-label']) !!}
              <div class = "col-md-7">
                {!! Form::date('established_at', old('established_at'), ['class' => 'form-control', 'placeholder'=>$companies_show->established_at, 'onfocus' => "(this.type='established_at')", 'onblur' => "(this.type='established_at')"]) !!}
              </div>
          </div>

          <div class="form-group">
              {!! Form::label('postal', 'Post Code', ['class' => 'col-md-3 control-label']) !!}
              <div class = "col-md-7">
                {!! Form::text('postal', old('postal'), ['class' => 'form-control', 'placeholder'=>$companies_show->postal]) !!}
              </div>
          </div>

          <div class="form-group">
            <div class="row">
              <div class="col-md-3">
                <span class="round-tab-company col-md-3">
                  <i class="fa fa-plus-square" aria-hidden="true"></i>
                </span>
              </div>
              <div class="col-md-7">
                <h3>Secondary information</h3>
              </div>
            </div>
          </div>


          <div class="form-group">
              {!! Form::label('ceo_name', 'CEO name:', ['class' => 'col-md-3 control-label']) !!}
              <div class = "col-md-7">
                {!! Form::text('ceo_name', old('ceo_name'), ['class' => 'form-control', 'placeholder'=>$companies_show->ceo_name]) !!}
              </div>
          </div>

          <div class="form-group">
              {!! Form::label('tel', 'Company contact number ', ['class' => 'col-md-3 control-label']) !!}
              <div class = "col-md-7">
                {!! Form::text('tel', old('tel'), ['class' => 'form-control', 'placeholder'=>$companies_show->tel]) !!}
              </div>
          </div>

          <div class="form-group">
              {!! Form::label('url', 'Company website URL', ['class' => 'col-md-3 control-label']) !!}
              <div class = "col-md-7">
                {!! Form::text('url', old('url'), ['class' => 'form-control', 'placeholder'=>$companies_show->url]) !!}
              </div>
          </div>

          <div class="form-group">
              {!! Form::label('facebook_url', 'Company Facebook URL', ['class' => 'col-md-3 control-label']) !!}
              <div class = "col-md-7">
                {!! Form::text('facebook_url', old('facebook_url'), ['class' => 'form-control', 'placeholder'=>$companies_show->facebook_url]) !!}
              </div>
          </div>

          <div class="form-group">
              {!! Form::label('twitter_url', 'Company Twitter URL', ['class' => 'col-md-3 control-label']) !!}
              <div class = "col-md-7">
                {!! Form::text('twitter_url', old('twitter_url'), ['class' => 'form-control', 'placeholder'=>$companies_show->twitter_url]) !!}
              </div>
          </div>

          <div class="form-group">
              {!! Form::label('in_charge', 'Company person incharge ', ['class' => 'col-md-3 control-label']) !!}
              <div class = "col-md-7">
                {!! Form::text('in_charge', old('in_charge'), ['class' => 'form-control', 'placeholder'=>$companies_show->in_charge]) !!}
              </div>
          </div>

          <div class="form-group">
              {!! Form::label('city', 'City', ['class' => 'col-md-3 control-label']) !!}
              <div class = "col-md-7">
                {!! Form::text('city', old('city'), ['class' => 'form-control', 'placeholder'=>$companies_show->city]) !!}
              </div>
          </div>

          <div class="form-group">
              {!! Form::label('country', 'Country', ['class' => 'col-md-3 control-label']) !!}
              <div class = "col-md-7">
                {!! Form::text('country', old('country'), ['class' => 'form-control', 'placeholder'=>$companies_show->country]) !!}
              </div>
          </div>

          <div class="form-group">
              {!! Form::label('background_photo', 'Company cover photo', ['class' => 'col-md-3 control-label']) !!}
            <div class = "row">
            {{-- <div class="page-header"> --}}
                <div class="col-md-offset-3 col-md-8">
                    <div class="col-md-6">
                        <div class="form-group">
                            {{-- {!!Form::file('photo')!!} --}}
                            <div class="imagePreview"></div>
                            <div class="input-group">
                                <label class="input-group-btn">
                                    <span class="btn btn-primary">
                                        Choose File<input type="file" name="background_photo" style="display:none" class="uploadFile">
                                    </span>
                                </label>
                                <input type="text" class="form-control" readonly="">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
          </div>

          <div class="form-group">
            <div class="row">
              <div class="col-md-3">
                <span class="round-tab-company col-md-3">
                  <i class="fa fa-pie-chart" aria-hidden="true"></i>
                </span>
              </div>
              <div class="col-md-7">
                <h3>Supplementary information</h3>
              </div>
            </div>
          </div>

          <div class="form-group">
              {!! Form::label('bill_company_name', 'Bill company name', ['class' => 'col-md-3 control-label']) !!}
              <div class = "col-md-7">
                {!! Form::text('bill_company_name', old('bill_company_name'), ['class' => 'form-control', 'placeholder'=>$companies_show->bill_company_name]) !!}
              </div>
          </div>

          <div class="form-group">
              {!! Form::label('bill_postal', 'Bill Post Code', ['class' => 'col-md-3 control-label']) !!}
              <div class = "col-md-7">
                {!! Form::text('bill_postal', old('bill_postal'), ['class' => 'form-control', 'placeholder'=>$companies_show->bill_postal]) !!}
              </div>
          </div>

          <div class="form-group">
              {!! Form::label('bill_address1', 'Primary bill address:', ['class' => 'col-md-3 control-label']) !!}
              <div class = "col-md-7">
                {!! Form::text('bill_address1', old('bill_address1'), ['class' => 'form-control', 'placeholder'=>$companies_show->bill_address1]) !!}
              </div>
          </div>

          <div class="form-group">
              {!! Form::label('what_photo1_explanation', 'Company addons details', ['class' => 'col-md-3 control-label']) !!}
            <div class = "row">
            {{-- <div class="page-header"> --}}
                <div class="col-md-offset-3 col-md-9">
                    <div class="col-md-6">
                        <div class="form-group">
                            {!!Form::textarea('what_photo1_explanation', old('what_photo1_explanation'), ['class' => 'form-control'])!!}
                        </div>
                    </div>
                </div>
            </div>
          </div>

          <div class="form-group">
              {!! Form::label('what_photo1', 'Company details photo', ['class' => 'col-md-3 control-label']) !!}
            <div class = "row">
            {{-- <div class="page-header"> --}}
                <div class="col-md-offset-3 col-md-8">
                    <div class="col-md-6">
                        <div class="form-group">
                            {{-- {!!Form::file('photo')!!} --}}
                            <div class="imagePreview"></div>
                            <div class="input-group">
                                <label class="input-group-btn">
                                    <span class="btn btn-primary">
                                        Choose File<input type="file" name="what_photo1" style="display:none" class="uploadFile">
                                    </span>
                                </label>
                                <input type="text" class="form-control" readonly="">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
          </div>



          <div class="form-group">
              {!! Form::label('what_photo2_explaination', 'Company addons details', ['class' => 'col-md-3 control-label']) !!}
            <div class = "row">
            {{-- <div class="page-header"> --}}
                <div class="col-md-offset-3 col-md-9">
                    <div class="col-md-6">
                        <div class="form-group">
                            {!!Form::textarea('what_photo2_explaination', old('what_photo2_explaination'), ['class' => 'form-control'])!!}
                        </div>
                    </div>
                </div>
            </div>
          </div>

          <div class="form-group">
              {!! Form::label('what_photo2', 'Company details photo', ['class' => 'col-md-3 control-label']) !!}
            <div class = "row">
            {{-- <div class="page-header"> --}}
                <div class="col-md-offset-3 col-md-8">
                    <div class="col-md-6">
                        <div class="form-group">
                            {{-- {!!Form::file('photo')!!} --}}
                            <div class="imagePreview"></div>
                            <div class="input-group">
                                <label class="input-group-btn">
                                    <span class="btn btn-primary">
                                        Choose File<input type="file" name="what_photo2" style="display:none" class="uploadFile">
                                    </span>
                                </label>
                                <input type="text" class="form-control" readonly="">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
          </div>

          <div class="form-group">
              {!! Form::label('bill_address2', 'Primary bill address:', ['class' => 'col-md-3 control-label']) !!}
              <div class = "col-md-7">
                {!! Form::text('bill_address2', old('bill_address2'), ['class' => 'form-control', 'placeholder'=>$companies_show->bill_address2]) !!}
              </div>
          </div>

          <div class="form-group">
              {!! Form::label('bill_city', 'Bill City', ['class' => 'col-md-3 control-label']) !!}
              <div class = "col-md-7">
                {!! Form::text('bill_city', old('bill_city'), ['class' => 'form-control', 'placeholder'=>$companies_show->bill_city]) !!}
              </div>
          </div>

          <div class="form-group">
            <div class="row">
              <div class="col-md-3">
                <span class="round-tab-company col-md-3">
                  <i class="fa fa-unlock-alt" aria-hidden="true"></i>
                </span>
              </div>
              <div class="col-md-7">
                <h3>Confidential information</h3>
              </div>
            </div>
          </div>

          <div class="form-group">
              {!! Form::label('password', 'Password', ['class' => 'col-md-3 control-label']) !!}
              <div class = "col-md-7">
                {!! Form::password('password', ['class' => 'form-control', 'placeholder'=>$companies_show->password]) !!}
              </div>
          </div>

          <div class="form-group">
              {!! Form::label('password_confirmation', 'Confirm Password', ['class' => 'col-md-3 control-label']) !!}
              <div class = "col-md-7">
                {!! Form::password('password_confirmation', ['class' => 'form-control']) !!}
              </div>
          </div>

          {!! Form::hidden('role', '0') !!}

          <div class="form-group">
            <div class="col-md-7 col-md-offset-4">
              <button type="submit" class="btn btn-primary">
                Update
              </button>
            </div>
          </div>
        </form>
    @else
        There are no companies.
    @endif

</div>
