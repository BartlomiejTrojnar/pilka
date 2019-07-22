<h2>Informacje o klubie</h2>

<table>
  <tr>
    <th>nazwa</th>
    <td>{{ $club->name }}</td>
  </tr>
  <tr>
    <th>miasto</th>
    <td>{{ $club->city }}</td>
  </tr>
  <tr>
    <th>rok założenia</th>
    <td>{{ $club->year_of_establishment }}</td>
  </tr>

  <tr>
    <th>państwo</th>
    <td>{{ $club->country->name }}</td>
  </tr>

  <tr>
    <th>zawodnicy</th>
    <td>liczba?</td>
  </tr>
  <tr>
    <th>mecze</th>
    <td>liczba?</td>
  </tr>
</table>
