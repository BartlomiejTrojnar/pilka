<!-- **********************  (C) mgr inż. Bartłomiej Trojnar; 17.10.2022 ********************** -->
<tr class="editRow" data-referee_id="{{ $referee->id }}">
   <form action="{{ route('sedzia.update', $referee->id) }}" method="post" role="form">
      {{ csrf_field() }}
      {{ method_field('PATCH') }}
      <td colspan="2">
         <input type="hidden" name="id" value="{{$referee->id}}" />
         <input type="hidden" name="lp" value="{{$lp}}" />
         <input type="text" name="first_name" size="20" maxlength="25" value="{{$referee->first_name}}" />
      </td>
      <td><input type="text" name="last_name" size="20" maxlength="25" value="{{$referee->last_name}}" /></td>
      <td><?php   print_r($countrySF);  ?></td>
      <td><input type="text" name="district" size="20" maxlength="25" value="{{$referee->district}}" /></td>
      <td><input type="date" name="date_of_birth" value="{{$referee->date_of_birth}}" /></td>
      <td><input type="checkbox" name="active" value="{{$referee->active}}" /></td>

      <!-- komórka z przyciskami potwierdzenia zmiany i anulowania -->
      <td colspan="3" class="editRowButtons">
         <button data-referee_id="{{ $referee->id }}" class="update">zapisz zmiany</button>
         <button data-referee_id="{{ $referee->id }}" class="cancelUpdate">anuluj</button>
      </td>
   </form>
</tr>