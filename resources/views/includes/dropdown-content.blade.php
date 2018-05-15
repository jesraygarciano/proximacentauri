@if (in_array($skills[$i]->id, $languages_ids))
    <option value={{$skills[$i]->id}} selected=selected>{{$skills[$i]->category}}</option>
@else
    <option value={{$skills[$i]->id}}>{{$skills[$i]->category}}</option>
@endif
