<!-- **********************  (C) mgr inż. Bartłomiej Trojnar; 16.10.2022 ********************** -->
{{ $stadiums->render() }}

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
      <th>zmień / usuń</th>
   </tr>
</thead>

<tbody>
   @foreach($stadiums as $stadium)
   <tr data-stadium_id="{{ $stadium->id }}">
      <td>{{ $n=$loop->iteration }}</td>
      <td>{{ $stadium->city }}</td>
      <td><a href="{{ route('stadion.show', $stadium->id) }}">{{ $stadium->name }}</a></td>
      <td>{{ $stadium->capacity }}</td>
      <td>{{ substr($stadium->created_at, 0, 10) }}</td>
      <td>{{ substr($stadium->updated_at, 0, 10) }}</td>
      <td class="editDestroy">
         <button data-stadium_id="{{ $stadium->id }}" class="edit"><i class="fa fa-edit"></i></button>
         <button data-stadium_id="{{ $stadium->id }}" class="destroy"><i class="fas fa-remove"></i></button>
      </td>
   </tr>
   @endforeach

   <tr class="create"><td colspan="7"><button id="showCreateRow"><i class="fa fa-plus"></i></button>
</tbody>
</table>

<input id="countStadiums" hidden value="@if(!empty($n)) {{ $n }} @else 0 @endif" />