<x-app-layout>
    <div class="container-fluid py-4">
        <div class="row">
          <div class="col-12">
            <div class="card my-4">
              <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
                <div class="bg-gradient-secondary shadow-secondary border-radius-lg pt-2 pb-1">
                  <h6 class="text-white ps-3">Liste utilisateurs</h6>
                </div>
              </div>
              <div class="card-body px-0 pb-2">
                <div class="table-responsive p-0">
                  <table class="table align-items-center mb-0">
                    <thead>
                      <tr>
                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Nom</th>
                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Prénom</th>
                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Adresse</th>
                        <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">telephone</th>
                        <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">cin</th>
                        <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">email</th>
                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Actions</th>
                      </tr>
                    </thead>
                    <tbody>
                        @foreach($users as $user)
                                <tr>
                                    <td>
                                        <p class="text-xs font-weight-bold mb-0">{{ $user->name }}</p>
                                    </td>
                                    <td>
                                        <p class="text-xs font-weight-bold mb-0">{{ $user->prenom }}</p>
                                    </td>
                                    <td>
                                        <p class="text-xs font-weight-bold mb-0">{{ $user->adresse }}</p>
                                    </td>
                                    <td>
                                        <p class="text-xs font-weight-bold mb-0">{{ $user->telephone }}</p>
                                    </td>
                                    <td>
                                        <p class="text-xs font-weight-bold mb-0">{{ $user->cin }}</p>
                                    </td>
                                    <td>
                                        <p class="text-xs font-weight-bold mb-0">{{ $user->email }}</p>
                                    </td>
                                    <td class="align-middle">
                                        <a href="{{ route('edit.user',$user->id)}}" class="font-weight-bold ms-3 mb-0 text-xs" data-toggle="tooltip" data-original-title="Modifier employé">
                                            <i class="fa fa-pencil">modifier</i>
                                        </a>
                                        <a href="{{ route('suppr.user',$user->id)}}" class="text-danger ms-3 mb-0 font-weight-bold text-xs" data-toggle="tooltip" data-original-title="Supprimer l'employé">
                                            <i class="fa fa-trash">supprimer</i>
                                        </a>
                                    </td>
                                </tr>
                        
                        @endforeach
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
</x-app-layout>
