@extends('layout')
@section('content')
   <h2 style="text-align:right">Free Business quiz</h2>
   <p>Learn Business Tips through the quiz session</p>
   <div class="container" id="container">
       <div class="row" style="background:skyblue; border-radius:5px;">
    
    <h5><marquee>Business Quiz. To help you understand Business Formular</marquee></h5>
       </div>
       <br>
       <p id = "Question"><i style="font-weight:bolder">1.</i>&nbsp;&nbsp;What is the capital of Nigeria?</p>
       <input type="text" id="answer-box1"  value="" >
       <p id="result1"></p>
       <button class="btn btn-sm btn-default" id="button">Submit</button>
       <br>

       <br>
       <p id = "Question2"><i style="font-weight:bolder">2.</i>&nbsp;&nbsp;What full meaaning of SME?</p>
       <input type="text" id="answer-box2"  value="" >
       <p id="result2"></p>
       <button class="btn btn-sm btn-default" id="button2">Submit</button>
   </div>

@endsection
