@if( !empty( $links ) )
  {{ $countries->links() }}
@endif

<h2>{{ $subTitle }}</h2>
<table id="countries">
  <thead>
    <tr>
      <th>id</th>
      <th><a class="order" href="{{ route('panstwo.order', 'symbol') }}">symbol
        @if( session()->get('CountryOrder[0]') == 'symbol' )
          @if( session()->get('CountryOrder[1]') == 'asc' )
            <i class="fa fa-sort-alpha-asc"></i>
          @else
            <i class="fa fa-sort-alpha-desc"></i>
          @endif
        @else
            <i class="fa fa-sort"></i>
        @endif
      </a></th>
      <th><a class="order" href="{{ route('panstwo.order', 'name') }}">nazwa
        @if( session()->get('CountryOrder[0]') == 'name' )
          @if( session()->get('CountryOrder[1]') == 'asc' )
            <i class="fa fa-sort-alpha-asc"></i>
          @else
            <i class="fa fa-sort-alpha-desc"></i>
          @endif
        @else
            <i class="fa fa-sort"></i>
        @endif
      </a></th>
      <th><a class="order" href="{{ route('panstwo.order', 'continent') }}">kontynent
        @if( session()->get('CountryOrder[0]') == 'continent' )
          @if( session()->get('CountryOrder[1]') == 'asc' )
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
    @foreach($countries as $country)
      <tr>
        <td>{{ $country->id }}</td>
        <td>{{ $country->symbol }}</td>
        <td><a href="{{ route('panstwo.show', $country->id) }}">{{ $country->name }}</a></td>
        <td>{{ $country->continent }}</td>
        <td class="edit"><a class="btn btn-primary" href="{{ route('panstwo.edit', $country->id) }}">
          <i class="fa fa-edit"></i>
        </a></td>
        <td class="destroy">
          <form action="{{ route('panstwo.destroy', $country->id) }}" method="post" id="delete-form-{{$country->id}}">
            {{ csrf_field() }}
            {{ method_field('DELETE') }}
            <button class="btn btn-primary"><i class="fa fa-remove"></i></button>
          </form>
        </td>
      </tr>
    @endforeach

    <tr class="create"><td colspan="6">
        <a class="btn btn-primary" href="{{ route('panstwo.create') }}"><i class="fa fa-plus"></i></a>
    </td></tr>
  </tbody>
</table>