<tr id="createRow">
<!-- **********************  (C) mgr inż. Bartłomiej Trojnar; 31.01.2023 ********************** -->
<form action="{{ route('rozgrywki.store') }}" method="post" role="form">
   {{ csrf_field() }}
      <td colspan="2"><input type="text" name="name" /></td>
      <td><input type="text" name="" size="5"></td>
      <td><input type="text" name="" size="5"></td>
      <td><input type="text" name="" size="5"></td>
      <td><input type="text" name="" size="5"></td>

      <!-- komórka z przyciskami dodawania i anulowania -->
      <td class="c" colspan="4" style="width: 175px;">
         <button id="add" class="btn btn-primary">dodaj</button>
         <button id="cancelAdd" class="btn btn-primary">anuluj</button>
      </td>
   </form>
</tr>