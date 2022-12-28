<tr class="editRow" data-stadium_id="{{ $stadium->id }}" hidden>
<!-- **********************  (C) mgr inż. Bartłomiej Trojnar; 28.12.2022 ********************** -->
   <form action="{{ route('stadion.update', $stadium->id) }}" method="post" role="form">
      {{ csrf_field() }}
      {{ method_field('PATCH') }}
      <td colspan="2">
         <input type="hidden" name="id" value="{{ $stadium->id }}" />
         <input type="hidden" name="lp" value="{{ $lp }}" />
         <input type="text" name="city" size="20" maxlength="25" value="{{ $stadium->city }}" />
      </td>
      <td><input type="text" name="name" size="20" maxlength="25" value="{{ $stadium->name }}" /></td>
      <td><input type="number" name="capacity" size="5" value="{{ $stadium->capacity }}" /></td>

      <!-- komórka z przyciskami potwierdzenia zmiany i anulowania -->
      <td colspan="3" class="editRowButtons">
         <button data-stadium_id="{{ $stadium->id }}" class="update">zapisz zmiany</button>
         <button data-stadium_id="{{ $stadium->id }}" class="cancelUpdate">anuluj</button>
      </td>
   </form>
</tr>