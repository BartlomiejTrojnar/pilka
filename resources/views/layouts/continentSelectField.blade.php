<select name="continent">
  <option value="0">- wybierz kontynent -</option>
  @foreach($continents as $continent)
    @if($continent == $continentSelected)
      <option selected="selected" value="{{$continent}}">{{$continent}}</option>
    @else
      <option value="{{$continent}}">{{$continent}}</option>
    @endif
  @endforeach
</select>