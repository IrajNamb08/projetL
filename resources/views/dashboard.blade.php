<x-admin-layout>
    
          <!-- top tiles -->
          <div class="col-md-12" style="display: inline-block;" >
            <div class="tile_count">
              <div class="col-md-4 tile_stats_count">
                <span class="count_top"><i class="fa fa-user"></i> Nombre des clients</span>
                <div class="count">{{sizeof($users)}}</div>
              </div>
              <div class="col-md-4 tile_stats_count">
                <span class="count_top"><i class="fa fa-product-hunt"></i> Nombre des produits</span>
                <div class="count">{{sizeof($produits)}}</div>
              </div>
              <div class="col-md-4 tile_stats_count">
                <span class="count_top"><i class="fa fa-cart-plus"></i> Nombres commandes</span>
                <div class="count green">{{sizeof($commandes)}}</div>
              </div>
            </div>
          </div>
  
           
            <br><br>
  
            <div class="row">
  
  
              <div class="col-md-4 col-sm-4 ">
                <div class="x_panel tile fixed_height_320">
                  <div class="x_title">
                    <h2>4 derniers produits</h2>
                    <ul class="nav navbar-right panel_toolbox">
                      <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                      
                    </ul>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                   
                      <div class="widget_summary">
                        <table class="table table-striped jambo_table">
                          <thead class="text-center">
                              <tr>
                                <th>Nom</th>
                                <th>Prix</th>
                              </tr>
                          </thead>
                          <tbody>
                            @foreach($lastProduits as $lastProduit)
                              <tr>
                                  <td>{{$lastProduit->nom}}</td>
                                  <td>{{$lastProduit->prix}} Ar</td>
                              </tr>
                            @endforeach
                          </tbody>
                        </table>
                      </div>
  
                   
                    </div>
                  </div>
              </div>
              <div class="col-md-4 col-sm-4 ">
                <div class="x_panel tile fixed_height_320">
                  <div class="x_title">
                    <h2>4 derniers commandes</h2>
                    <ul class="nav navbar-right panel_toolbox">
                      <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                      
                    </ul>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                   
                    <div class="widget_summary">
                      <table class="table table-striped jambo_table">
                        <thead class="">
                            <tr>
                              <th>Date</th>
                              <th class="text-right">N°commande</th>
                            </tr>
                        </thead>
                        <tbody>
                          @foreach($lastCommandes as $lastCommande)
                            <tr>
                                <td>{{$lastCommande->getDate()}}</td>
                                <td class="text-right">N°{{$lastCommande->id}}</td>
                            </tr>
                          @endforeach
                        </tbody>
                      </table>
                    </div>
  
                   
                    </div>
                  </div>
              </div>
              <div class="col-md-4 col-sm-4 ">
                <div class="x_panel tile fixed_height_320">
                  <div class="x_title">
                    <h2>4 derniers clients</h2>
                    <ul class="nav navbar-right panel_toolbox">
                      <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                      
                    </ul>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                   
                    <div class="widget_summary">
                      <table class="table table-striped jambo_table">
                        <thead class="">
                            <tr>
                              <th>Prénom</th>
                              <th class="text-right">Télephone</th>
                            </tr>
                        </thead>
                        
                          <tbody>
                            @foreach($lastUsers as $lastUser)
                                @if(!$lastUser->is_admin())
                                  <tr>
                                      <td>{{$lastUser->prenom}}</td>
                                      <td class="text-right">{{$lastUser->telephone}}</td>
                                  </tr>
                                @endif
                            @endforeach
                          </tbody>
                        
                      </table>
                    </div>
  
                   
                    </div>
                  </div>
              </div>
              
  
            </div>
  
  
          
</x-admin-layout>