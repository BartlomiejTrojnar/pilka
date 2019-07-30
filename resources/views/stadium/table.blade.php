@if( !empty( $links ) )
  {{ $stadiums->render() }}
@endif

<h2>{{ $subTitle }}</h2>
<table id="stadiums">
  <thead>
    <tr>
      <th>id</th>
      <th><a class="order" href="{{ route('stadion.order', 'city') }}">miasto
        @if( session()->get('StadiumOrder[0]') == 'city' )
          @if( session()->get('StadiumOrder[1]') == 'asc' )
            <i class="fa fa-sort-alpha-asc"></i>
          @else
            <i class="fa fa-sort-alpha-desc"></i>
          @endif
        @else
            <i class="fa fa-sort"></i>
        @endif
      </a></th>

      <th><a class="order" href="{{ route('stadion.order', 'name') }}">nazwa
        @if( session()->get('StadiumOrder[0]') == 'name' )
          @if( session()->get('StadiumOrder[1]') == 'asc' )
            <i class="fa fa-sort-alpha-asc"></i>
          @else
            <i class="fa fa-sort-alpha-desc"></i>
          @endif
        @else
            <i class="fa fa-sort"></i>
        @endif
      </a></th>

      <th><a class="order" href="{{ route('stadion.order', 'capacity') }}">pojemność
        @if( session()->get('StadiumOrder[0]') == 'capacity' )
          @if( session()->get('StadiumOrder[1]') == 'asc' )
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
  </thead>

  <tbody>
    @foreach($stadiums as $stadium)
      <tr>
        <td>{{ $loop->iteration }}</td>
        <td>{{ $stadium->city }}</td>
        <td><a href="{{ route('stadion.show', $stadium->id) }}">{{ $stadium->name }}</a></td>
        <td>{{ $stadium->capacity }}</td>
        <td>{{ $stadium->created_at }}</td>
        <td>{{ $stadium->updated_at }}</td>

        <td class="edit"><a class="btn btn-primary" href="{{ route('stadion.edit', $stadium->id) }}">
          <i class="fa fa-edit"></i>
        </a></td>
        <td class="destroy">
          <form action="{{ route('stadion.destroy', $stadium->id) }}" method="post" id="delete-form-{{$stadium->id}}">
            {{ csrf_field() }}
            {{ method_field('DELETE') }}
            <button class="btn btn-primary"><i class="fa fa-trash"></i></button>
          </form>
        </td>
      </tr>
    @endforeach

    <tr class="create"><td colspan="9">
        <a class="btn btn-primary" href="{{ route('stadion.create') }}"><i class="fa fa-plus"></i></a>
    </td></tr>
  </tbody>
</table>