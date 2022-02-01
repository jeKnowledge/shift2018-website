@extends('layouts.platform')

@section('content')
    <script src="https://cdn.jsdelivr.net/npm/clipboard@1/dist/clipboard.min.js"></script>
    <h2>Utilizadores</h2>
    <div class="section section-large">
      <div class="section-left section-text">
        <table class="table fw">
          <thead>
            <tr>
                <td>Nome</td>
                <td>Email</td>
                <td>Role</td>
                <td>&nbsp;</td>
            </tr>
          </thead>
          <tbody id='ajaxOutput'>
            @foreach ($users as $user)
                <tr>
                    <td name="user"/> {{$user->name}}</td>
                    <td id="email_field_{{$user->id}}" name="emails">{{$user->email}}</td>
                    @if($user->isShifter())
                        <td>Shifter</ld>
                    @elseif($user->isAdmin())
                        <td>Admin</ld>
                    @elseif($user->isStaff())
                        <td>Staff</ld>
                    @elseif($user->isPartner())
                        <td>Partner</ld>
                    @elseif($user->isUser())
                        <td>User</ld>
                    @else
                        <td>&nbsp;</td>
                    @endif
                    <td class="t-right">
                        <a href="{{route('users.show', ['user' => $user->id])}}">Detalhes</a> |
                        <a href="{{route('users.edit', ['user' => $user->id])}}">Editar</a>
                    </td>
                </tr>
            @endforeach
          </tbody>
      </table>
    </div>

    <div class="section-right section-text">
      <h3> Procurar utilizador </h3>

      {{ csrf_field() }}

      <div class="field">
        <label>Nome do Utilizador:</label>
        <input name="name" class="input" placeholder="Nome do Utilizador">
      </div>

      <div class="field">
        <label>Tipo de Utilizador</label>

        <select name="type">
          <option value="" selected="selected">Any</option>

          <option value="1">Shifter</option>

          <option value="4">User</option>

          <option value="2">Partner</option>

          <option value="3">Staff</option>
        </select>
      </div>

      <button onclick='advancedSearch()' class="button">Procurar</button>

    </div>

    <script>
      function advancedSearch(){
        let data = {
          _token: $('[name="_token"]')[0].value,
          name: $('[name="name"]')[0].value,
          type: $('[name="type"]')[0].value
        }

        $.post('/platform/users/search', data, (res) => {
          $('#ajaxOutput')[0].innerHTML = res;
        });
      }
    </script>

@endsection
