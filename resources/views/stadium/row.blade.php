<tr data-stadium_id="{{ $stadium->id }}" hidden>
<!-- **********************  (C) mgr inż. Bartłomiej Trojnar; 28.12.2022 ********************** -->
   <td class="lp">{{ $lp }}</td>
   <td>{{ $stadium->city }}</td>
   <td>{{ $stadium->name }}</td>
   <td>{{ $stadium->capacity }}</td>
   <td>{{ substr($stadium->created_at, 0, 10) }}</td>
   <td>{{ substr($stadium->updated_at, 0, 10) }}</td>
   <td class="editDestroy">
      <button data-stadium_id="{{ $stadium->id }}" class="edit"><i class="fa fa-edit"></i></button>
      <button data-stadium_id="{{ $stadium->id }}" class="destroy"><i class="fas fa-remove"></i></button>
   </td>
</tr>