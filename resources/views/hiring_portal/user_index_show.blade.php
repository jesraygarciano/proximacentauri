@extends('layouts.app')

@section('content')

@include('inc.message')


<div class="container">
@if (count($companies_array)>0)
    @foreach ($companies_array as $company_information)
        <div class="alert alert-success">
            You scouted this user already as
            <strong>{{ $company_information->company_name }}</strong>
        </div>
    @endforeach
@endif

<style type="text/css">
  .user-cover-info{
      height: 350px;
      background-image: url('{{ asset('img/user-cover.jpg') }}');
      background-repeat: no-repeat;
      background-position: center;
      background-attachment: fixed;
      background-size: 100%;  
  }
  .user-cover-info img{
    width: 100%;
  }
  .user-wrapper .bg-img{
    opacity: 0;
    z-index: -11;
    width: 100%;    
  }
  .user-wrapper ._image{
      width: 100%;
      top:50%;
      left: 0px;
      position: absolute;
      transform:translateY(-50%);
  }
 .user-info .user-photo{
    padding: 5px;
    background: white;
    border: 1px solid #cecece;
    position: relative;
  }

.user-info .user-photo img{
    width: 100%;
  }

.user-info img{
    border:none!important;
  }

.user-wrapper{
    position: relative;
    overflow: hidden;
}

.user-wrapper .bg-img{
    opacity: 0;
    z-index: -11;
    width: 100%;
}

.user-wrapper ._image{
    width: 100%;
    top:50%;
    left: 0px;
    position: absolute;
    transform:translateY(-50%);
}

.infra-user-photo{
  /*background: #ececec;*/
  padding-top: 5px;
  border: 1px solid #ddd;
  box-shadow: 2px 2px 4px 0 rgba(0,0,0,0.16),0 2px 3px 0 rgba(0,0,0,0.12)!important;
}

.main-name-info h2{
  font-weight: 600;
}
#infra-user-about{
  padding: 20px 20px 0 20px;
  font-weight: 600;
}
#infra-user-cont{
  padding: 20px 20px 0 20px;
  font-weight: 600;
}
.infra-user-photo p{
  padding: 0 20px 20px 20px;
}
.infra-user-photo h5{
  font-weight: 600;
  padding: 0 20px 20px 20px;
}
.user-main-name{
  padding: 10px;
}
.user-cont-info{
padding: 5px;
}
.infra-user-photo ul{
  list-style: none;
}
.infra-user-photo ul li{
  list-style: none;
  padding: 5px;
}
.infra-user-cont-tag{
  font-weight: 600;
}

</style>
  <div class="row">
    <div class="col-md-12 user-cover-info">
    </div>
    <div class="row user-info">
      <div class="col-md-3"  style="margin:-200px 0 0 100px;">
        <div class="user-photo">
          <div class="user-wrapper">
            <img src="{{asset('img/bg-img.png')}}" class="bg-img">
            <img class="_image" src="{{ asset('img/member-placeholder.png') }}">
          </div>
        </div>
      </div>
      <div class="col-md-8">
        <div class="row user-main-name">
            <div class="col-md-8">
              <div class="main-name-info">
                <h2>
                  {{ $users->f_name }} {{ $users->m_name }} {{ $users->l_name }}
                </h2>
                  <i class="fa fa-map-marker fa-lg" aria-hidden="true"></i>
                  {{ $users->email }} {{ $users->address2 }}
              </div>              
            </div>
            <div class="col-md-4">
              <div class="message-user">
                {!! link_to(route('scouts.create', $users->id), 'Message applicant', ['class' => 'btn btn-primary']) !!}
              </div>
            </div>  
        </div>
      </div>
    </div>
  </div>

  <div class="row">
    <div class="col-md-3">
        <div class="infra-user-photo">
          <h4 id="infra-user-about">About:</h4>
          <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Commodi nobis atque, fuga qui quia. Natus tempora, suscipit quod rerum nesciunt voluptatibus vitae impedit, quibusdam sapiente inventore, nostrum, vero amet assumenda!
          </p>
          <h5>
            Date created: {{ date(' M. j, Y ',strtotime($users->created_at)) }}
          </h5>
        </div>      
    </div>
    <div class="col-md-8">
      <div class="infra-user-photo">
          <h4 id="infra-user-cont">Contact information:</h4>
          <div class="row">
            <div class="col-sm-3">
              <ul class="infra-user-cont-tag">
                <li>Phone:</li>
                <li>Email:</li>
                <li>Address:</li>
                <li>Site:</li>                                                
              </ul>              
            </div>
            <div class="col-sm-9">
              <ul>
                <li>{{ $users->phone_number }} 361-6111</li>
                <li>{{ $users->email }}</li>
                <li>{{ $users->address1 }} H. Abellana Street, Talamban Cebu City, Philippines, 6000</li>
                <li>{{ $users->url }} https://www.codetinerant.com</li>                                                
              </ul>              
            </div>
          </div>
      </div>

      <div class="infra-user-photo" style="margin-top: 10px;">
          <h4 id="infra-user-cont">Basic Information</h4>
          <div class="row">
            <div class="col-sm-3">
              <ul class="infra-user-cont-tag">
                <li>Birthday:</li>
                <li>Gender:</li>
                <li>Nationality:</li>
              </ul>              
            </div>
            <div class="col-sm-9">
              <ul>
                <li>{{ $users->birth_date }}</li>
                <li>{{ $users->gender }} Male</li>
                <li>{{ $users->nationality }} Filipino</li>
              </ul>              
            </div>
          </div>
      </div>

    </div>
  </div>

<!-- <div class="row user_index_show">
    <div class="col-md-12">
        <div class="row">
            <div class="col-md-8">
                <h3>
                    {{ $users->f_name }} {{ $users->m_name }} {{ $users->l_name }}
                </h3>                
            </div>
            <div class="col-md-4">
                <h3>
                    <i class="fa fa-envelope fa-md" aria-hidden="true"></i>            
                    {{ $users->email }}
                </h3>
            </div>
        </div>
                 <div class="row">
                    <div class="col-md-6">
                         <h4 class="resume-info-sub-title">
                            <i class="fa fa-user" aria-hidden="true"></i>
                                Applicant basic info: 
                         </h4>
                        <div class="form-group row">
                          <label class="col-sm-4 col-form-label">First name</label>
                          <div class="col-sm-8">
                            {{ $users->f_name }}
                          </div>
                        </div>
                        <div class="form-group row">
                          <label class="col-sm-4 col-form-label">Middle name</label>
                          <div class="col-sm-8">
                            {{ $users->m_name }}
                          </div>
                        </div>
                        <div class="form-group row">
                          <label class="col-sm-4 col-form-label">Last name</label>
                          <div class="col-sm-8">
                            {{ $users->l_name }}
                          </div>
                        </div>                                                
                        <div class="form-group row">
                          <label class="col-sm-4 col-form-label">Gender</label>
                          <div class="col-sm-8">
                            {{ $users->gender }}
                          </div>
                        </div>
                        <div class="form-group row">
                          <label class="col-sm-4 col-form-label">Birth date</label>
                          <div class="col-sm-8">
                            {{ $users->birth_date }}
                          </div>
                        </div>
                        <div class="form-group row">
                          <label class="col-sm-4 col-form-label">Address</label>
                          <div class="col-sm-8">
                            {{ $users->address1 }}
                          </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                         <h4 class="resume-info-sub-title">
                            <i class="fa fa-graduation-cap" aria-hidden="true"></i>
                                Education 
                         </h4>
                        <div class="form-group row">
                          <label class="col-sm-4 col-form-label">University</label>
                          <div class="col-sm-8">
                            {{ $users->university }}
                          </div>
                        </div>
                        <div class="form-group row">
                          <label class="col-sm-4 col-form-label">Field of study</label>
                          <div class="col-sm-8">
                            {{ $users->field_of_study }}
                          </div>
                        </div>
                        <div class="form-group row">
                          <label class="col-sm-4 col-form-label">Program of study</label>
                          <div class="col-sm-8">
                            {{ $users->program_of_study }}
                          </div>
                        </div>                        
                    </div>
                 </div>
          </div>
</div>
<hr>
<h3>Objective:</h3>

{{ $users->objective }}

<h3>Applicant details:</h3>
<div class = "body">email : {{ $users->email }}</div>
<div class = "body">Home Address : {{ $users->address1 }}</div>
<div class = "body">Permanent Address : {{ $users->address2 }}</div>
<div class = "body">Postal : {{ $users->postal }}</div>
<div class = "body">Birthdate : {{ $users->birth_date }}</div>
<div class = "body">nationality : {{ $users->nationality }}</div>
<div class = "body">country : {{ $users->country }}</div>
<div class = "body">phone_number : {{ $users->phone_number }}</div>
<div class = "body">Gender : {{ $users->gender }}</div>

<br>

 -->
{{-- {!! link_to(action('ScoutsController@create', $users->id), 'Scout', ['class' => 'btn btn-primary']) !!} --}}
</div>

@endsection
