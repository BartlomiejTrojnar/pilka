@if( !empty( $links ) )
  {{ $countries->links() }}
@endif

<h2>{{ $subTitle }}</h2>
<table id="countries">
  <thead>
    <tr>
      <th>id</th>
      <th><a href="{{ route('panstwo.orderBy', 'symbol') }}">symbol</a></th>
      <th><a href="{{ route('panstwo.orderBy', 'name') }}">nazwa</a></th>
      <th><a href="{{ route('panstwo.orderBy', 'continent') }}">kontynent</a></th>
      <th colspan="2">+/-</th>
    </tr>
  </thead>

  <tbody>
    @foreach($countries as $country)
      <tr>
        <td>{{ $country->id }}</td>
        <td>{{ $country->symbol }}</td>
        <td><a href="{{ route('panstwo.show', $country->id) }}">{{ $country->name }}</a></td>
        <td>{{ $country->continent }}</td>
        <td class="edit"><a class="btn btn-primary" href="{{ route('panstwo.edit', $country->id) }}">
            <img class="edit" src="{{ asset('css/zmiana.png') }}" alt="--">
        </a></td>
        <td class="destroy">
          <form action="{{ route('panstwo.destroy', $country->id) }}" method="post" id="delete-form-{{$country->id}}">
            {{ csrf_field() }}
            {{ method_field('DELETE') }}
            <button class="btn btn-primary"><img class="destroy" src="{{ asset('css/minus.png') }}" /></button>
          </form>
        </td>
      </tr>
    @endforeach

    <tr class="create"><td colspan="6">
        <a class="btn btn-primary" href="{{ route('panstwo.create') }}"><img class="create" src="{{ asset('css/plus.png') }}" /></a>
    </td></tr>
  </tbody>
</table>