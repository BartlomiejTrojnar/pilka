<table id="referees">
  <thead>
    <tr>
      <th>id</th>
      <th><a class="order" href="{{ route('sedzia.order', 'first_name') }}">imiona
        @if( session()->get('RefereeOrder[0]') == 'first_name' )
          @if( session()->get('RefereeOrder[1]') == 'asc' )
            <i class="fa fa-sort-alpha-asc"></i>
          @else
            <i class="fa fa-sort-alpha-desc"></i>
          @endif
        @else
            <i class="fa fa-sort"></i>
        @endif
      </a></th>
      <th><a class="order" href="{{ route('sedzia.order', 'last_name') }}">nazwisko
        @if( session()->get('RefereeOrder[0]') == 'last_name' )
          @if( session()->get('RefereeOrder[1]') == 'asc' )
            <i class="fa fa-sort-alpha-asc"></i>
          @else
            <i class="fa fa-sort-alpha-desc"></i>
          @endif
        @else
            <i class="fa fa-sort"></i>
        @endif
      </a></th>
      <th>państwo</th>
      <th>okręg</th>
      <th>data urodzenia</th>
      <th>aktywny</th>
      <th>data wpisania</th>
      <th>data aktualizacji</th>
      <th colspan="2">+/-</th>
    </tr>

    @if(isset($countrySelectField))
    <tr>
      <td colspan="3"></td>
      <td><?php  print_r($countrySelectField);  ?></td>
      <td colspan="7"></td>
    </tr>
    @endif
  </thead>

  <tbody>
    @foreach($referees as $referee)
      <tr>
        <td>{{ $loop->iteration }}</td>
        <td>{{ $referee->first_name }}</td>
        <td><a href="{{ route('sedzia.show', $referee->id) }}">{{ $referee->last_name }}</a></td>
        <td><a href="{{ route('panstwo.show', $referee->country_id) }}">{{ $referee->country->name }}</a></td>
        <td>{{ $referee->district }}</td>
        <td>{{ $referee->date_of_birth }}</td>
        <td>{{ $referee->active }}</td>
        <td>{{ $referee->created_at }}</td>
        <td>{{ $referee->updated_at }}</td>
        <td class="edit"><a class="btn btn-primary" href="{{ route('sedzia.edit', $referee->id) }}">
          <i class="fa fa-edit"></i>
        </a></td>
        <td class="destroy">
          <form action="{{ route('sedzia.destroy', $referee->id) }}" method="post" id="delete-form-{{$referee->id}}">
            {{ csrf_field() }}
            {{ method_field('DELETE') }}
            <button class="btn btn-primary"><i class="fa fa-trash"></i></button>
          </form>
        </td>
      </tr>
    @endforeach

    <tr class="create"><td colspan="11">
        <a class="btn btn-primary" href="{{ route('sedzia.create') }}"><i class="fa fa-plus"></i></a>
    </td></tr>
  </tbody>
</table>