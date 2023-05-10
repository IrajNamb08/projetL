<x-admin-layout>
    @if(!isset($user))
    @php
    $user = Auth::user()
    @endphp
    @endif
    <div class="container-fluid px-2 px-md-4">
        <div class="card card-body mx-3 mx-md-4 mt-n6">
          <div class="row gx-4 mb-2 px-3">
            <div class="col-auto my-auto">
              <div class="h-100">
                <h5 class="mb-1">
                  {{$user->name}} {{$user->prenom}}
                </h5>
                <p class="mb-0 font-weight-normal text-sm">
                    {{$user->email}} / {{$user->id}}
                </p>
              </div>
            </div>
            <div class="col-lg-4 col-md-6 my-sm-auto ms-sm-auto me-sm-0 mx-auto mt-3">
              <div class="nav-wrapper position-relative end-0 text-right" style="text-align: right;">
                  <a href="{{route('profil.utilisateur',$user->id)}}" class="btn btn-success font-weight-bold ms-3 mb-0 text-xs" data-toggle="tooltip" data-original-title="Modifier mon profil">
                      <i class="fa fa-pencil me-2"></i>  Modifier profil
                  </a>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="row">
              <div class="col-12 col-xl-12">
                <div class="card card-plain h-100">
                  <div class="card-header pb-0 p-3">
                    <div class="row">
                      <div class="col-md-12 d-flex align-items-center">
                        <h6 class="mb-0">Information sur son profil</h6>
                      </div>
                    </div>
                  </div>
                  <div class="card-body p-3">
                    <div class="row">
                        <div class="col-sm-6">
                            <ul class="list-group">
                                <li class="list-group-item border-0 ps-0 pt-0 text-sm"><strong class="text-dark">Nom complet:</strong> &nbsp; <span class="text-uppercase">{{$user->name}}</span> {{$user->prenom}}</li>
                                <li class="list-group-item border-0 ps-0 text-sm"><strong class="text-dark">Téléphone:</strong> &nbsp; {{$user->telephone}}</li>
                                <li class="list-group-item border-0 ps-0 text-sm"><strong class="text-dark">E-mail:</strong> &nbsp; {{$user->email}}</li>
                                <li class="list-group-item border-0 ps-0 text-sm"><strong class="text-dark">Adresse:</strong> &nbsp; {{$user->adresse}}</li>
                            </ul>
                        </div>
                        <div class="col-sm-6">
                            <ul class="list-group">
                                <li class="list-group-item border-0 ps-0 pt-0 text-sm"><strong class="text-dark">Numéro CIN:</strong> &nbsp; {{$user->cin}}</li>
                                @if(!$user->is_admin())
                                <li class="list-group-item border-0 ps-0 text-sm"><strong class="text-dark">Membre depuis:</strong> &nbsp; {{$user->created_at->format('d M Y')}}</li>
                                @endif
                            </ul>
                        </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
    </div>
</x-admin-layout>