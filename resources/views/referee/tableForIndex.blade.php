<!-------------------- (C) mgr inż. Bartłomiej Trojnar; (III) maj 2021 -------------------->
<table id="referees">
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
         <th>operacje</th>
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
         <tr data-referee_id="{{$referee->id}}">
         <tr>
            <td>{{ $loop->iteration }}</td>
            <td>{{ $referee->first_name }}</td>
            <td><a href="{{ route('sedzia.show', $referee->id) }}">{{ $referee->last_name }}</a></td>
            <td><a href="{{ route('panstwo.show', $referee->country_id) }}">{{ $referee->country->name }}</a></td>
            <td>{{ $referee->district }}</td>
            <td>{{ $referee->date_of_birth }}</td>
            <td>{{ $referee->active }}</td>
            <td>{{ $referee->created_at }}</td>
            <td>{{ $referee->updated_at }}</td>
            <td class="edit destroy c">
               <button class="edit btn btn-primary" data-referee_id="{{ $referee->id }}"><i class="fa fa-edit"></i></button>
               <button class="destroy btn btn-primary" data-referee_id="{{ $referee->id }}"><i class="fas fa-remove"></i></button>
            </td>
         </tr>
       @endforeach

      <tr class="create"><td colspan="10"><button id="showCreateRow" class="btn btn-primary"><i class="fa fa-plus"></i></button>
   </tbody>
</table>