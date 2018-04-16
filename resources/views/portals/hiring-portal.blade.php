@extends('layouts.app')

@section('content')

<style type="text/css">
  *{
    line-height: initial!important;
  }
  .landing-image{
    background:url("https://images.unsplash.com/photo-1448932223592-d1fc686e76ea?ixlib=rb-0.3.5&s=990bfb15aef2718e2488c1c36452afc4&auto=format&fit=crop&w=1498&q=80") center center / cover no-repeat fixed rgba(0, 0, 0, 0.7); height:450px;
    margin-top: -20px;
    position: relative;
  }

  .pricing-panel{
    min-height: 450px;
    padding-top: 10px;
    padding-bottom: 50px;
    background: #1679a3;
  }

  .bottom-image{
    height:450px;
    position: relative;
    overflow: hidden;
    text-align: center;
    background: #00ff614d;
  }

  .bottom-image .background-img{
    position: absolute;
    left: 50%;
    top: 50%;
    transform: translateY(-50%) translateX(-50%);
    width: 100%;
    opacity: 0.3;
    min-width: 700px;
  }

  .absolut-center{
    position: absolute;
    left: 50%;
    top:50%;
    transform: translateY(-50%) translateX(-50%);
  }

  .max-width-500{
    max-width: 500px;
    width: 100%;
  }

  .price-tile{
    text-align: center;
    background: #f9f9f9;
    border: 2px solid #f5f5f5;
    padding: 40px 40px 50px;
    border-radius: 4px;
    margin-bottom: 40px;
    position: relative;
  }

  .price-tile .pricing-button{
    position: absolute;
    top: 100%;
    left: 50%;
    transform: translateY(-50%)translateX(-50%);
    border: 1px solid;
    padding: 10px 20px;
    font-weight: bold;
    cursor: pointer;
    border-radius: 4px;
    max-width:120px;
    width: 100%;
  }

  .pricing{
    position: relative;
    display: inline-block;
    padding-left: 20px;
  }

  .price-tile .description{
    margin-top: 20px;
  }

  .pricing .currency{
    position: absolute;
    left: 0px;
    top: -20px;
    font-size: 20px;
    color: #1679a3;
  }

  .pricing-tile .dash{
    font-size: 100px;
    color:#cecece;
    margin-top: -60px;
    margin-bottom: -30px;
  }

  .pricing .price-num{
    font-size: 50px;
  }

  .register-bttn{
    padding: 10px 40px;
    border:1px solid;
    font-size: 20px;
    font-weight: bold;
    border-radius: 5px;
  }

  .eee-bg-text{
    display: inline;
    background: #eee;
  }

</style>
<div class="landing-image">
  <div class="absolut-center">
    <span class="eee-bg-text" style="font-size: 50px; padding:10px; font-weight: bold;">Hire faster and effeciently.</span>
  </div>
</div>
<div class="container" style="text-align: center; margin-top:20px;">
  <div style="max-width: 800px; margin:auto;">
    <h2>Integrated sourcing</h2>
    <h4>
      Next level recruitment where Job Ads and Talent Search are integrated to make it easier and faster for you to source.
    </h4>
    <div class="row" style="margin-top: 50px;">
      <div class="col-sm-6">
        <p class="fa-list-alt fa" style="font-size: 100px; color:#1679a3;"></p>
        <h3 style="margin:0px;">Hiring Ads</h3>
        <div>
          Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
          tempor incididunt ut labore et dolore magna aliqua.
        </div>
      </div> 
      <div class="col-sm-6">
        <p class="fa-search fa" style="font-size: 100px; color:#1679a3;"></p>
        <h3 style="margin:0px;">Talent Search</h3>
        <div>
          Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
          consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
          cillum dolore eu fugiat nulla pariatur.
        </div>
      </div> 
    </div>
  </div>
</div>
<div style="transform: translateY(100px);">
  <div class="pricing-panel">
    <center>
      <h2 style="margin:20px; color: white;">Plans</h2>
    </center>
    <div class="container">
      <div class="row">
        <div class="col-md-3">
          <div class="price-tile">
            <h3>MONTHLY</h3>
            <div class="dash">-</div>
            <br>
            <div class="pricing">
              <div class="currency">
                ₱
              </div>
              <div class="price-num">100</div>
            </div>
            <div class="description">
              <h5>
                Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                tempor incididunt ut labore et dolore magna aliqua.
              </h5>
            </div>
            <div class="pricing-button orange-bttn">
              Start Plan
            </div>
          </div>
        </div>
        <div class="col-md-3">
          <div class="price-tile">
            <h3>MONTHLY</h3>
            <div class="dash">-</div>
            <br>
            <div class="pricing">
              <div class="currency">
                ₱
              </div>
              <div class="price-num">100</div>
            </div>
            <div class="description">
              <h5>
                Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                tempor incididunt ut labore et dolore magna aliqua.
              </h5>
            </div>
            <div class="pricing-button orange-bttn">
              Start Plan
            </div>
          </div>
        </div>
        <div class="col-md-3">
          <div class="price-tile">
            <h3>MONTHLY</h3>
            <div class="dash">-</div>
            <br>
            <div class="pricing">
              <div class="currency">
                ₱
              </div>
              <div class="price-num">100</div>
            </div>
            <div class="description">
              <h5>
                Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                tempor incididunt ut labore et dolore magna aliqua.
              </h5>
            </div>
            <div class="pricing-button orange-bttn">
              Start Plan
            </div>
          </div>
        </div>
        <div class="col-md-3">
          <div class="price-tile">
            <h3>MONTHLY</h3>
            <div class="dash">-</div>
            <br>
            <div class="pricing">
              <div class="currency">
                ₱
              </div>
              <div class="price-num">100</div>
            </div>
            <div class="description">
              <h5>
                Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                tempor incididunt ut labore et dolore magna aliqua.
              </h5>
            </div>
            <div class="pricing-button orange-bttn">
              Start Plan
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="bottom-image">
    <img class="background-img" src="https://images.unsplash.com/photo-1501228349589-c88664efb8b1?ixlib=rb-0.3.5&s=7398e0048350e751dfac951fd31933bf&auto=format&fit=crop&w=1500&q=80">
    <div class="max-width-500 absolut-center" style="color: white;">
      <h1>Get Started</h1>
      <div style="margin-top:50px;">
        <button type="button" class="register-bttn blue-bttn">Register</button>
      </div>
    </div>
  </div>
</div>

@endsection
