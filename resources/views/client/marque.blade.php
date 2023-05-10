<div class="widget brands mb-50">
    <!-- Widget Title -->
    <h6 class="widget-title mb-30">Marques</h6>
    
        @foreach($marques as $marque) 
            <div class="widget-desc">
                <!-- Single Form Check -->
                <div class="form-check">
                    <input class="form-check-input filtre" @if(isset($request->marque) && in_array($marque->id,$request->marque))
                    checked @endif name="marque[]" type="checkbox" value="{{$marque->id}}" id="marque-{{$marque->id}}">
                    <label class="form-check-label" for="marque-{{$marque->id}}">{{$marque->marque}}</label>
                </div>
            </div> 
        @endforeach
    
    
</div>