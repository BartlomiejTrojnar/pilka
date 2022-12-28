<table id="referees">
<!-- **********************  (C) mgr inż. Bartłomiej Trojnar; 18.10.2022 ********************** -->
   <thead>
      <tr>
         <th>id</th>
         <?php
            echo view('layouts.thSorting', ["thName"=>"imiona", "routeName"=>"sedzia.orderBy", "field"=>"first_name", "sessionVariable"=>"RefereeOrderBy"]);
            echo view('layouts.thSorting', ["thName"=>"nazwisko", "routeName"=>"sedzia.orderBy", "field"=>"last_name", "sessionVariable"=>"RefereeOrderBy"]);
         ?>
         <th>państwo</th>
         <th>okręg</th>
         <th>data urodzenia</th>
         <th>aktywny</th>
         <th>data wpisania</th>
         <th>data aktualizacji</th>
         <th>zmień / usuń</th>
      </tr> 

      @if(isset($countrySelectField))
         <tr>
            <td colspan="3"></td>
            <td><?php  print_r($countrySelectField);  ?></td>
            <td colspan="6"></td>
         </tr>
      @endif
   </thead>

   <tbody>
      @foreach($referees as $referee)
         <tr data-referee_id="{{ $referee->id }}">
            <td>{{ $n=$loop->iteration }}</td>
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
       @endforeach

      <tr class="create"><td colspan="10"><button id="showCreateRow"><i class="fa fa-plus"></i></button>
   </tbody>
</table>
<input id="countReferees" type="text" value="@if(!empty($n)) {{ $n }} @else 0 @endif" />