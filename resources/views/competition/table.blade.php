@if( !empty( $links ) )
  {{ $competitions->links() }}
@endif

<h2>{{ $subTitle }}</h2>
<table id="competitions">
  <thead>
    <tr>
      <th>id</th>
      <th><a class="order" href="{{ route('rozgrywki.order', 'name') }}">nazwa
        @if( session()->get('CompetitionOrder[0]') == 'competition' )
          @if( session()->get('CompetitionOrder[1]') == 'asc' )
            <i class="fa fa-sort-alpha-asc"></i>
          @else
            <i class="fa fa-sort-alpha-desc"></i>
          @endif
        @else
            <i class="fa fa-sort"></i>
        @endif
      </a></th>


      <th colspan="2">operacje</th>
    </tr>
  </thead>

  <tbody>
    @foreach($competitions as $competition)
      <tr>
        <td>{{ $competition->id }}</td>
        <td><a href="{{ route('rozgrywki.show', $competition->id) }}">{{ $competition->competition }}</a></td>
        <td>{{ $competition->season }}</td>
        <td>{{ $competition->MP }}</td>
        <td>{{ $competition->league }}</td>
        <td>{{ $competition->cup }}</td>

        <td class="edit"><a class="btn btn-primary" href="{{ route('rozgrywki.edit', $competition->id) }}">
          <i class="fa fa-edit"></i>
        </a></td>
        <td class="destroy">
          <form action="{{ route('rozgrywki.destroy', $competition->id) }}" method="post" id="delete-form-{{$competition->id}}">
            {{ csrf_field() }}
            {{ method_field('DELETE') }}
            <button class="btn btn-primary"><i class="fa fa-trash"></i></button>
          </form>
        </td>
      </tr>
    @endforeach

    <tr class="create"><td colspan="11">
        <a class="btn btn-primary" href="{{ route('rozgrywki.create') }}"><i class="fa fa-plus"></i></a>
    </td></tr>
  </tbody>
</table>