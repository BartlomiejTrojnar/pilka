<tr id="createRow">
<!-- **********************  (C) mgr inż. Bartłomiej Trojnar; 16.10.2022 ********************** -->
   <form action="{{ route('zawodnik.store') }}" method="post" role="form">
      {{ csrf_field() }}
      <td colspan="2"><input type="text" name="first_name" size="20" maxlength="25" /></td>
      <td><input type="text" name="last_name" size="20" maxlength="25" /></td>
      <td><?php  print_r($countrySF);  ?></td>
      <td><input type="date" name="date_of_birth" /></td>
      <td><input type="text" name="city_of_birth" size="12" maxlength="15" /></td>
      <td><input type="number" name="matches" size="3" maxlength="3" /></td>
      <td><input type="number" name="minutes" size="4" maxlength="5" /></td>
      <td><input type="number" name="goals" size="3" maxlength="4" placeholder="0" /></td>
      <!-- komórka z przyciskami dodawania i anulowania -->
      <td class="create" colspan="4">
         <button id="add">dodaj</button>
         <button id="cancelAdd">anuluj</button>
      </td>
   </form>
</tr>