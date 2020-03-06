@if( !empty( $links ) )
  {{ $players->render() }}
@endif

<h2>{{ $subTitle }}</h2>
<table id="players">
  <thead>
    <tr>
      <th>id</th>
      <th><a class="order" href="{{ route('zawodnik.order', 'first_name') }}">imiona
        @if( session()->get('PlayerOrder[0]') == 'first_name' )
          @if( session()->get('PlayerOrder[1]') == 'asc' )
            <i class="fa fa-sort-alpha-asc"></i>
          @else
            <i class="fa fa-sort-alpha-desc"></i>
          @endif
        @else
            <i class="fa fa-sort"></i>
        @endif
      </a></th>
      <th><a class="order" href="{{ route('zawodnik.order', 'last_name') }}">nazwisko
        @if( session()->get('PlayerOrder[0]') == 'last_name' )
          @if( session()->get('PlayerOrder[1]') == 'asc' )
            <i class="fa fa-sort-alpha-asc"></i>
          @else
            <i class="fa fa-sort-alpha-desc"></i>
          @endif
        @else
            <i class="fa fa-sort"></i>
        @endif
      </a></th>

      <th><a class="order" href="{{ route('zawodnik.order', 'country_id') }}">państwo
        @if( session()->get('PlayerOrder[0]') == 'country_id' )
          @if( session()->get('PlayerOrder[1]') == 'asc' )
            <i class="fa fa-sort-alpha-asc"></i>
          @else
            <i class="fa fa-sort-alpha-desc"></i>
          @endif
        @else
            <i class="fa fa-sort"></i>
        @endif
      </a></th>

      <th><a class="order" href="{{ route('zawodnik.order', 'date_of_birth') }}">data urodzenia
        @if( session()->get('PlayerOrder[0]') == 'date_of_birth' )
          @if( session()->get('PlayerOrder[1]') == 'asc' )
            <i class="fa fa-sort-alpha-asc"></i>
          @else
            <i class="fa fa-sort-alpha-desc"></i>
          @endif
        @else
            <i class="fa fa-sort"></i>
        @endif
      </a></th>

      <th><a class="order" href="{{ route('zawodnik.order', 'city_of_birth') }}">miejsce urodzenia
        @if( session()->get('PlayerOrder[0]') == 'city_of_birth' )
          @if( session()->get('PlayerOrder[1]') == 'asc' )
            <i class="fa fa-sort-alpha-asc"></i>
          @else
            <i class="fa fa-sort-alpha-desc"></i>
          @endif
        @else
            <i class="fa fa-sort"></i>
        @endif
      </a></th>

      <th><a class="order" href="{{ route('zawodnik.order', 'matches') }}">mecze
        @if( session()->get('PlayerOrder[0]') == 'matches' )
          @if( session()->get('PlayerOrder[1]') == 'asc' )
            <i class="fa fa-sort-alpha-asc"></i>
          @else
            <i class="fa fa-sort-alpha-desc"></i>
          @endif
        @else
            <i class="fa fa-sort"></i>
        @endif
      </a></th>

      <th><a class="order" href="{{ route('zawodnik.order', 'minutes') }}">minuty
        @if( session()->get('PlayerOrder[0]') == 'minutes' )
          @if( session()->get('PlayerOrder[1]') == 'asc' )
            <i class="fa fa-sort-alpha-asc"></i>
          @else
            <i class="fa fa-sort-alpha-desc"></i>
          @endif
        @else
            <i class="fa fa-sort"></i>
        @endif
      </a></th>

      <th><a class="order" href="{{ route('zawodnik.order', 'goals') }}">gole
        @if( session()->get('PlayerOrder[0]') == 'goals' )
          @if( session()->get('PlayerOrder[1]') == 'asc' )
            <i class="fa fa-sort-alpha-asc"></i>
          @else
            <i class="fa fa-sort-alpha-desc"></i>
          @endif
        @else
            <i class="fa fa-sort"></i>
        @endif
      </a></th>

      <th>data wpisania</th>
      <th>data aktualizacji</th>
      <th colspan="2">+/-</th>
    </tr>

    @if(isset($countrySelectField))
    <tr>
      <td colspan="3"></td>
      <td><?php  print_r($countrySelectField);  ?></td>
      <td colspan="9"></td>
    </tr>
    @endif
  </thead>

  <tbody>
    @foreach($players as $player)
      <tr>
        <td>{{ $loop->iteration }}</td>
        <td>{{ $player->first_name }}</td>
        <td><a href="{{ route('zawodnik.show', $player->id) }}">{{ $player->last_name }}</a></td>
        <td><a href="{{ route('panstwo.show', $player->country_id) }}">{{ $player->country->name }}</a></td>
        <td>{{ $player->date_of_birth }}</td>
        <td>{{ $player->city_of_birth }}</td>
        <td>{{ $player->matches }}</td>
        <td>{{ $player->minutes }}</td>
        <td>{{ $player->goals }}</td>
        <td>{{ $player->created_at }}</td>
        <td>{{ $player->updated_at }}</td>
        <td class="edit"><a class="btn btn-primary" href="{{ route('zawodnik.edit', $player->id) }}">
          <i class="fa fa-edit"></i>
        </a></td>
        <td class="destroy">
          <form action="{{ route('zawodnik.destroy', $player->id) }}" method="post" id="delete-form-{{$player->id}}">
            {{ csrf_field() }}
            {{ method_field('DELETE') }}
            <button class="btn btn-primary"><i class="fa fa-trash"></i></button>
          </form>
        </td>
      </tr>
    @endforeach

    <tr class="create"><td colspan="13">
        <a class="btn btn-primary" href="{{ route('zawodnik.create') }}"><i class="fa fa-plus"></i></a>
    </td></tr>
  </tbody>
</table>