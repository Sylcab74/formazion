@extends('layouts.layout')

@section('title', 'Person')

@section('content')
    <h1>Assign employees to session</h1>

    @if ($errors)
      <ul>
        @foreach($errors as $error)
          <li>{{$error}}</li>
        @endforeach
      </ul>
    @endif

    <form action="/person/assignSession/{{$student->getId()}}" method="POST">
      <select name="formation" id="formation">
        @foreach($formations as $formation)
          <option value="{{$formation->getId()}}">{{$formation->getName()}}</option>
        @endforeach
      </select>

      <select name="session" id="session">
        {{-- @foreach($sessions as $session)
          <option value="{{$session->getId()}}">{{$session}}</option>
        @endforeach --}}
      </select>

      <input type="submit" value="Submit">
    </form>
@endsection

@section('javascript')
<script>

document.addEventListener('DOMContentLoaded', () => {
  const formation = document.querySelector('#formation');
  const session = document.querySelector('#session');
  session.style.display = "none";


  const formationChange =  async e => {
    const formData = new FormData();
    formData.append('session', e.target.value);
    
    try {
      const response = await fetch(window.location.origin + '/person/getSession', {
          method: 'POST',
          mode:"cors",
          body : formData
      });
      if (response.ok) {
          const data = await response.json();
          session.style.display = "block";
          console.log(data);
          
          data.response.forEach(item => {
              session.innerHTML += ` <option value="${item.id}">${item.starting} - ${item.ending}</option>`;
          })

      } else {
          console.error(response.status);
      }
  } catch(e) {
      console.error(e);
  }
  }
  
  formation.addEventListener('change', e => formationChange(e))
});

</script>
@endsection