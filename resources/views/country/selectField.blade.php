<select name="country_id">
  <option value="0">- wybierz państwo -</option>
  @foreach($countries as $country)
    @if($country->id == $countrySelected)
      <option selected="selected" value="{{$country->id}}">
        {{$country->symbol}} ({{$country->name}})
      </option>
    @else
      <option value="{{$country->id}}">
        {{$country->symbol}} ({{$country->name}})
      </option>
    @endif
  @endforeach
</select>