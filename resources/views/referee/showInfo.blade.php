<h2>Informacje o sędzim</h2>

<table>
  <tr>
    <th>imiona</th>
    <td>{{ $referee->first_name }}</td>
  </tr>
  <tr>
    <th>nazwisko</th>
    <td>{{ $referee->last_name }}</td>
  </tr>
  <tr>
    <th>państwo</th>
    <td><a href="{{ route('panstwo.show', $referee->country_id) }}">{{ $referee->country->name }}</a></td>
  </tr>
  <tr>
    <th>okręg</th>
    <td>{{ $referee->district }}</td>
  </tr>
  <tr>
    <th>data urodzenia</th>
    <td>{{ $referee->date_of_birth }}</td>
  </tr>
  <tr>
    <th>aktywny</th>
    <td>{{ $referee->active }}</td>
  </tr>

  <tr>
    <th>mecze</th>
    <td>??</td>
  </tr>
</table>
