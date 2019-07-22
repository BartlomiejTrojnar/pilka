<h2>Informacje o państwie</h2>

<table>
  <tr>
    <th>symbol</th>
    <td>{{ $country->symbol }}</td>
  </tr>
  <tr>
    <th>nazwa</th>
    <td>{{ $country->name }}</td>
  </tr>
  <tr>
    <th>kontynent</th>
    <td>{{ $country->continent }}</td>
  </tr>

  <tr>
    <th>kluby</th>
    <td>{{ count($country->clubs) }}</td>
  </tr>

  <tr>
    <th>sędziowie</th>
    <td>liczba?</td>
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
