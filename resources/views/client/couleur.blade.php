<div class="widget color mb-50">
    <!-- Widget Title -->
    <h6 class="widget-title mb-30">Color</h6>
    <div class="widget-desc">
        <ul class="d-flex">
            <style>
                .couleur:checked + label{
                    border:3px solid green !important;
                }
            </style>
            @foreach($couleurs as $couleur)
                <li><input class="couleur" type="checkbox" name="couleur[]" id="couleur-{{$couleur->id}}" value="{{$couleur->id}}" style="display: none;"><label for="couleur-{{$couleur->id}}" style="border:2px solid {{$couleur->code}};width:30px;height:30px;border-radius:50%;background-color:{{$couleur->code}}"></label></li>
            @endforeach
        </ul>
    </div>
</div>