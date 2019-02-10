@if( !empty( $links ) )
  {{ $clubs->links() }}
@endif

<h2>{{ $subTitle }}</h2>
<table id="clubs">
  <thead>
    <tr>
      <th>id</th>
      <th><a href="{{ route('klub.orderBy', 'name') }}">nazwa</a></th>
      <th><a href="{{ route('klub.orderBy', 'city') }}">miasto</a></th>
      <th><a href="{{ route('klub.orderBy', 'year_of_establishment') }}">rok założenia</a></th>
      <th><a href="{{ route('klub.orderBy', 'country_id') }}">państwo</a></th>
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
            <img class="edit" src="{{ asset('css/zmiana.png') }}" alt="--">
        </a></td>
        <td class="destroy">
          <form action="{{ route('klub.destroy', $club->id) }}" method="post" id="delete-form-{{$club->id}}">
            {{ csrf_field() }}
            {{ method_field('DELETE') }}
            <button class="btn btn-primary"><img class="destroy" src="{{ asset('css/minus.png') }}" /></button>
          </form>
        </td>
      </tr>
    @endforeach

    <tr class="create"><td colspan="7">
        <a class="btn btn-primary" href="{{ route('klub.create') }}"><img class="create" src="{{ asset('css/plus.png') }}" /></a>
    </td></tr>
  </tbody>
</table>