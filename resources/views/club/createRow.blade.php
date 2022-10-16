<!------------------------ (C) mgr inż. Bartłomiej Trojnar; (III) czerwiec 2021 ------------------------>
<tr id="createRow">
   <form action="{{ route('klub.store') }}" method="post" role="form">
      {{ csrf_field() }}
      <td colspan="2"><input type="text" name="name" size="20" maxlength="25" /></td>
      <td><input type="text" name="city" size="15" maxlength="15" /></td>
      <td><input type="text" name="year_of_establishment" size="4" maxlength="4" /></td>
      <td>
        <select name="country_id" size="1">
            @foreach($countries as $country)
              <option value="{{$country->id}}">{{$country->name}}</option>
            @endforeach
          </select>
      </td>

      <!-- komórka z przyciskami dodawania i anulowania -->
      <td class="c" colspan="4" style="width: 175px;">
         <button id="add" class="btn btn-primary">dodaj</button>
         <button id="cancelAdd" class="btn btn-primary">anuluj</button>
      </td>
   </form>
</tr>