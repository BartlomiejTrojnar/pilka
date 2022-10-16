<tr data-club_id="{{ $club->id }}">
   <!-- dane klubu -->
   <td>{{ $club->id }}</td>
   <td>{{ $club->name }}</td>
   <td>{{ $club->city }}</td>
   <td>{{ $club->year_of_establishment }}</td>
   <td>{{ $club->country->name }}</td>

   <!-- modyfikowanie i usuwanie -->
   <td class="destroy edit c">
      <button class="edit btn btn-primary" data-club_id="{{ $club->id }}"><i class="fa fa-edit"></i></button>
      <button class="destroy btn btn-primary" data-club_id="{{ $club->id }}"><i class="fas fa-remove"></i></button>
   </td>
</tr>