<!-- **********************  (C) mgr inż. Bartłomiej Trojnar; 16.10.2022 ********************** -->
<tr id="createRow">
   <form action="{{ route('sedzia.store') }}" method="post" role="form">
      {{ csrf_field() }}
      <td colspan="2"><input type="text" name="first_name" size="20" maxlength="25" /></td>
      <td><input type="text" name="last_name" size="20" maxlength="25" /></td>
      <td><?php  print_r($countrySF);  ?></td>
      <td><input type="text" name="district" size="20" maxlength="25" /></td>
      <td><input type="date" name="date_of_birth" /></td>
      <td><input type="checkbox" name="active" /></td>

      <!-- komórka z przyciskami dodawania i anulowania -->
      <td class="create" colspan="4">
         <button id="add">dodaj</button>
         <button id="cancelAdd">anuluj</button>
      </td>
   </form>
</tr>