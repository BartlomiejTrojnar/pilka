@if( !empty( $links ) )
  {{ $stadiums->render() }}
@endif

<h2>{{ $subTitle }}</h2>
<table id="stadiums">
  <thead>
    <tr>
      <th>id</th>
      <th>imiona</th>
      <th>państwo</th>
      <th>okręg</th>
      <th>data urodzenia</th>
      <th>aktywny</th>
      <th>data wpisania</th>
      <th>data aktualizacji</th>
      <th colspan="2">+/-</th>
    </tr>
  </thead>

  <tbody>
    @foreach($stadiums as $stadium)
      <tr>
        <td>{{ $loop->iteration }}</td>
        <td>{{ $stadium }}</td>

        <td class="edit"><a class="btn btn-primary" href="{{ route('stadion.edit', $stadium->id) }}">
          <i class="fa fa-edit"></i>
        </a></td>
        <td class="destroy">
          <form action="{{ route('stadion.destroy', $stadium->id) }}" method="post" id="delete-form-{{$stadium->id}}">
            {{ csrf_field() }}
            {{ method_field('DELETE') }}
            <button class="btn btn-primary"><i class="fa fa-remove"></i></button>
          </form>
        </td>
      </tr>
    @endforeach

    <tr class="create"><td colspan="9">
        <a class="btn btn-primary" href="{{ route('stadion.create') }}"><i class="fa fa-plus"></i></a>
    </td></tr>
  </tbody>
</table>