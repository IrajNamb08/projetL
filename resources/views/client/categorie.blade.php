<div class="widget catagory mb-50">
    <!-- Widget Title -->
    <h6 class="widget-title mb-30">Catagories</h6>

    <!--  Catagories  -->
    <div class="widget-desc">
        @foreach($categories as $categorie)
            <div class="form-check">
                <input class="form-check-input filtre" @if(isset($request->categorie) && in_array($categorie->id,$request->categorie))
                checked @endif name="categorie[]" type="checkbox" value="{{$categorie->id}}" id="categorie-{{$categorie->id}}">
                <label class="form-check-label"  for="categorie-{{$categorie->id}}">{{$categorie->categorie}}</label>
            </div>
        @endforeach
    </div>
   
</div>