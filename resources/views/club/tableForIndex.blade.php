@if( !empty( $links ) )
  {{ $clubs->links() }}
@endif

<table id="clubs">
   <thead>
      <tr>
         <th>id</th>
         <?php
            echo view('layouts.thSorting', ["thName"=>"nazwa",  "routeName"=>"club.orderBy", "field"=>"name", "sessionVariable"=>"ClubOrderBy"]);
            echo view('layouts.thSorting', ["thName"=>"miasto", "routeName"=>"club.orderBy", "field"=>"city", "sessionVariable"=>"ClubOrderBy"]);
            echo view('layouts.thSorting', ["thName"=>"rok założenia", "routeName"=>"club.orderBy", "field"=>"year_of_establishment", "sessionVariable"=>"ClubOrderBy"]);
            echo view('layouts.thSorting', ["thName"=>"państwo", "routeName"=>"club.orderBy", "field"=>"country_id", "sessionVariable"=>"ClubOrderBy"]);
         ?>
         <th>operacje</th>
      </tr>
   </thead>

   <tbody>
      @foreach($clubs as $club)
         <tr data-club_id="{{$club->id}}">
            <td>{{ $club->id }}</td>
            <td><a href="{{ route('klub.show', $club->id) }}">{{ $club->name }}</a></td>
            <td>{{ $club->city }}</td>
            <td>{{ $club->year_of_establishment }}</td>
            <td><a href="{{ route('panstwo.show', $club->country_id) }}">{{ $club->country->symbol }}</a></td>

            <td class="edit destroy c">
               <button data-club_id="{{ $club->id }}" class="edit btn btn-primary"><i class="fa fa-edit"></i></button>
               <button data-club_id="{{ $club->id }}" class="destroy btn btn-primary"><i class="fas fa-remove"></i></button>
            </td>

            <td class="edit"><a class="btn btn-primary" href="{{ route('klub.edit', $club->id) }}">
               <i class="fa fa-edit"></i>
            </a></td>
            <td class="destroy">
               <form action="{{ route('klub.destroy', $club->id) }}" method="post" id="delete-form-{{$club->id}}">
                  {{ csrf_field() }}
                  {{ method_field('DELETE') }}
                  <button class="btn btn-primary"><i class="fa fa-trash"></i></button>
               </form>
            </td>
         </tr>
      @endforeach

      <tr class="create"><td colspan="6"><button id="showCreateRow" class="btn btn-primary"><i class="fa fa-plus"></i></button>
   </tbody>
</table>