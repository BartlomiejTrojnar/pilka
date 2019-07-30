@if( !empty( $links ) )
  {{ $clubs->links() }}
@endif

<h2>{{ $subTitle }}</h2>
<table id="clubs">
  <thead>
    <tr>
      <th>id</th>
      <th><a class="order" href="{{ route('klub.order', 'name') }}">nazwa
        @if( session()->get('ClubOrder[0]') == 'name' )
          @if( session()->get('ClubOrder[1]') == 'asc' )
            <i class="fa fa-sort-alpha-asc"></i>
          @else
            <i class="fa fa-sort-alpha-desc"></i>
          @endif
        @else
            <i class="fa fa-sort"></i>
        @endif
      </a></th>
      <th><a class="order" href="{{ route('klub.order', 'city') }}">miasto
        @if( session()->get('ClubOrder[0]') == 'city' )
          @if( session()->get('ClubOrder[1]') == 'asc' )
            <i class="fa fa-sort-alpha-asc"></i>
          @else
            <i class="fa fa-sort-alpha-desc"></i>
          @endif
        @else
            <i class="fa fa-sort"></i>
        @endif
      </a></th>
      <th><a class="order" href="{{ route('klub.order', 'year_of_establishment') }}">rok założenia
        @if( session()->get('ClubOrder[0]') == 'year_of_establishment' )
          @if( session()->get('ClubOrder[1]') == 'asc' )
            <i class="fa fa-sort-alpha-asc"></i>
          @else
            <i class="fa fa-sort-alpha-desc"></i>
          @endif
        @else
            <i class="fa fa-sort"></i>
        @endif
      </a></th>
      <th><a class="order" href="{{ route('klub.order', 'country_id') }}">państwo
        @if( session()->get('ClubOrder[0]') == 'country_id' )
          @if( session()->get('ClubOrder[1]') == 'asc' )
            <i class="fa fa-sort-alpha-asc"></i>
          @else
            <i class="fa fa-sort-alpha-desc"></i>
          @endif
        @else
            <i class="fa fa-sort"></i>
        @endif
      </a></th>
      <th colspan="2">+/-</th>
    </tr>
  </thead>

  <tbody>
    @foreach($clubs as $club)
      <tr>
        <td>{{ $club->id }}</td>
        <td><a href="{{ route('klub.show', $club->id) }}">{{ $club->name }}</a></td>
        <td>{{ $club->city }}</td>
        <td>{{ $club->year_of_establishment }}</td>
        <td><a href="{{ route('panstwo.show', $club->country_id) }}">{{ $club->country->symbol }}</a></td>
        <td class="edit"><a class="btn btn-primary" href="{{ route('klub.edit', $club->id) }}">
          <i class="fa fa-edit"></i>
        </a></td>
        <td class="destroy">
          <form action="{{ route('klub.destroy', $club->id) }}" method="post" id="delete-form-{{$club->id}}">
            {{ csrf_field() }}
            {{ method_field('DELETE') }}
            <button class="btn btn-primary"><i class="fa fa-trash"></i></button>
          </form>
        </td>
      </tr>
    @endforeach

    <tr class="create"><td colspan="11">
        <a class="btn btn-primary" href="{{ route('klub.create') }}"><i class="fa fa-plus"></i></a>
    </td></tr>
  </tbody>
</table>