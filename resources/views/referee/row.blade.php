<tr data-referee_id="{{ $referee->id }}" hidden>
<!-- **********************  (C) mgr inż. Bartłomiej Trojnar; 18.10.2022 ********************** -->
   <td>{{ $lp }}</td>
   <td>{{ $referee->first_name }}</td>
   <td><a href="{{ route('sedzia.show', $referee->id) }}">{{ $referee->last_name }}</a></td>
   <td><a href="{{ route('panstwo.show', $referee->country_id) }}">{{ $referee->country->name }}</a></td>
   <td>{{ $referee->district }}</td>
   <td>{{ $referee->date_of_birth }}</td>
   <td>{{ $referee->active }}</td>
   <td class="small">{{ substr($referee->created_at, 0, 10) }}</td>
   <td class="small">{{ substr($referee->updated_at, 0, 10) }}</td>
   <td class="editDestroy">
      <button data-referee_id="{{ $referee->id }}" class="edit"><i class="fa fa-edit"></i></button>
      <button data-referee_id="{{ $referee->id }}" class="destroy"><i class="fas fa-remove"></i></button>
   </td>
</tr>