<h2>Informacje o zawodniku</h2>

<table>
   <tr>
      <th>Imie</th>
      <td style="font-size: 1.25em; font-weight: bold;">{{ $player->first_name }}</td>
   </tr>

   <tr>
      <th>Nazwisko</th>
      <td style="font-size: 1.5em; font-weight: bold;">{{ $player->last_name }}</td>
   </tr>

   <tr>
      <th>data urodzenia</th>
      <td>{{ $player->date_of_birth }}</td>
   </tr>

   <tr>
      <th>miasto urodzenia</th>
      <td>{{ $player->city_of_birth }}</td>
   </tr>

   <tr>
      <th>państwo</th>
      <td><a href="{{ route('panstwo.show', $player->country_id) }}">{{ $player->country->name }}</a></td>
   </tr>

   <tr>
      <th>mecze</th>
      <td>{{ $player->matches }}</td>
   </tr>

   <tr>
      <th>minuty</th>
      <td>{{ $player->minutes }}</td>
   </tr>

   <tr>
      <th>gole</th>
      <td>{{ $player->goals }}</td>
   </tr>

   <tr>
      <th>wprowadzono</th>
      <td class="created">{{ substr($player->created_at, 0, 10) }}</td>
   </tr>
   <tr>
      <th>zaktualizowano</th>
      <td class="updated">{{ substr($player->updated_at, 0, 10) }}</td>
   </tr>
</table>


<p><a href="{{url('zawodnicy/'.$player->id.'/edit')}}"><span class="glyphicon glyphicon-edit"></span> Edycja </a></p>
<p><a href="{{url('zawodnicy/'.$player->id.'/delete')}}"><span class="glyphicon glyphicon-trash"></span> Usunięcie </a></p>
