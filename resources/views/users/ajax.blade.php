@foreach ($users as $user)
    <tr>
        <td>{{$user->name}}</td>
        <td>{{$user->email}}</td>
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
