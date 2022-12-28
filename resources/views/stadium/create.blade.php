<!-- **********************  (C) mgr inż. Bartłomiej Trojnar; 28.12.2022 ********************** -->
<tr id="createRow">
   <form action="{{ route('stadion.store') }}" method="post" role="form">
      {{ csrf_field() }}
      <td colspan="2"><input type="text" name="city" size="15" maxlength="15" /></td>
      <td><input type="text" name="name" size="22" maxlength="25" /></td>
      <td><input type="text" name="capacity" size="5" maxlength="5" /></td>

      <!-- komórka z przyciskami dodawania i anulowania -->
      <td class="create" colspan="3">
         <button id="add">dodaj</button>
         <button id="cancelAdd">anuluj</button>
      </td>
   </form>
</tr>