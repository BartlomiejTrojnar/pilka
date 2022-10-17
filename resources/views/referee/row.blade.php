<!-- **********************  (C) mgr inż. Bartłomiej Trojnar; 16.10.2022 ********************** -->
<tr data-referee_id="{{ $referee->id }}">
   <td>{{ $lp }}</td>
   <td>{{ $referee->first_name }}</td>
   <td><a href="{{ route('sedzia.show', $referee->id) }}">{{ $referee->last_name }}</a></td>
   <td><a href="{{ route('panstwo.show', $referee->country_id) }}">{{ $referee->country->name }}</a></td>
   <td>{{ $referee->district }}</td>
   <td>{{ $referee->date_of_birth }}</td>
   <td>{{ $referee->active }}</td>
   <td>{{ $referee->created_at }}</td>
   <td>{{ $referee->updated_at }}</td>
   <td class="edit destroy c">
      <button class="edit btn btn-primary" data-referee_id="{{ $referee->id }}"><i class="fa fa-edit"></i></button>
      <button class="destroy btn btn-primary" data-referee_id="{{ $referee->id }}"><i class="fas fa-remove"></i></button>
   </td>
</tr>