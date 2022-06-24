@extends('base') 

@section('main') 
<div class="row"> 
<div class="col-sm-12"> 
 

 

<h1>Contact Details</h1> 

<div> 

  <a href="/contacts">Back</a> 

</div> 

 

  <strongvFirst Name:</strong> 

  <p>{{ $contact->first_name }}</p> 

  <strong>Last Name:</strong> 

  <p>{{ $contact->last_name }}</p> 

  <strong>Email:</strong> 

  <p>{{ $contact->email }}</p> 

 </div> 

</div> 