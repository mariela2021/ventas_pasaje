<div class="sidebar" data-color="orange" data-background-color="white" data-image="{{ asset('material') }}/img/sidebar-1.jpg">
  <!--
      Tip 1: You can change the color of the sidebar using: data-color="purple | azure | green | orange | danger"

      Tip 2: you can also add an image using data-image tag
  -->
  <div class="logo">
    <a class="simple-text logo-normal">
      {{ __('Trans Gusmar') }}
    </a>
  </div>
  <div class="sidebar-wrapper">
    <ul class="nav">
      <li class="nav-item {{ ($activePage == 'profile' || $activePage == 'user-management') ? ' active' : '' }}">
        <div class="collapse show" id="laravelExample">
          <ul class="nav">

          </ul>
        </div>
      </li>
      <li class="nav-item {{$activePage == 'oficina' || $activePage == 'roles' || $activePage == 'personal_oficina' ? 'active' : '' }}">
        @if (auth()->user()->role_id == '1')
        <a class="nav-link" data-toggle="collapse" href="#Oficina" aria-expanded="false">
          <i class="material-icons">apartment</i>
          <p>{{ __('Oficina')}}
            <b class="caret"></b>
          </p>         
        </a>
        <div class="collapse" id="Oficina">
          <ul class="nav">
            <li class="nav-item{{ $activePage == 'oficina' ? ' active' : '' }}">
              <a class="nav-link" href="{{ route('oficina.index') }}">
                <span class="sidebar-mini"><i class="material-icons">apartment</i></span>
                <span class="sidebar-normal">{{ __('Oficina') }}</span>
              </a>
            </li>
            <li class="nav-item{{ $activePage == 'personal_oficina' ? ' active' : '' }}">
              <a class="nav-link" href="{{ route('personal_oficina.index') }}">
                <span class="sidebar-mini"><i class="material-icons">airline_seat_recline_extra</i></span>
                <span class="sidebar-normal">{{ __('Personal de Oficina') }}</span>
              </a>
            </li>
            <li class="nav-item{{ $activePage == 'roles' ? ' active' : '' }}">
              <a class="nav-link" href="{{ route('roles.index') }}">
                <span class="sidebar-mini"><i class="material-icons">supervisor_account</i></span>
                <span class="sidebar-normal">{{ __('Roles') }}</span>
              </a>
            </li>
          </ul>
        </div>
        @endif
      </li>
      <li class="nav-item {{$activePage == 'bus' || $activePage == 'tipo_bus' || $activePage == 'bus_personal' ? 'active' : '' }}">
        @if (auth()->user()->role_id == '2' ||  auth()->user()->role_id == '1')
        <a class="nav-link" data-toggle="collapse" href="#Bus" aria-expanded="false">
          <i class="material-icons">directions_bus_filled</i>
          <p>{{ __('Bus')}}
            <b class="caret"></b>
          </p>         
        </a>
        <div class="collapse" id="Bus">
          
              
          
          <ul class="nav">
            <li class="nav-item{{ $activePage == 'tipo_bus' ? ' active' : '' }}">
              <a class="nav-link" href="{{ route('tipo_bus.index') }}">
                <span class="sidebar-mini"><i class="material-icons">directions_bus_filled</i></span>
                <span class="sidebar-normal">{{ __('Tipo Bus') }}</span>                 
              </a>
            </li>
            <li class="nav-item{{ $activePage == 'bus' ? ' active' : '' }}">
              <a class="nav-link" href="{{ route('bus.index') }}">
                <span class="sidebar-mini"><i class="material-icons">directions_bus</i></span>
                <span class="sidebar-normal">{{ __('Bus') }}</span>                  
              </a>
            </li>
            <li class="nav-item{{ $activePage == 'bus_personal' ? ' active' : '' }}">
              <a class="nav-link" href="{{ route('bus_personal.index') }}">
                <span class="sidebar-mini"><i class="material-icons">airline_seat_recline_extra</i></span>
                <span class="sidebar-normal">{{ __('Personal de Buses') }}</span>  
              </a>
            </li>
          </ul>
          
        </div>
        @endif
      </li>
      <li class="nav-item {{$activePage == 'encomienda' || $activePage == 'detalle_encomienda' ? 'active' : '' }}">
        <a class="nav-link" data-toggle="collapse" href="#Encomienda" aria-expanded="false">
          <i class="material-icons">local_mall</i>
          <p>{{ __('Encomiendas')}}
            <b class="caret"></b>
          </p>         
        </a>
        <div class="collapse" id="Encomienda">
          <ul class="nav">
            <li class="nav-item{{ $activePage == 'encomienda' ? ' active' : '' }}">
              <a class="nav-link" href="{{ route('encomienda.index') }}">
                <span class="sidebar-mini"><i class="material-icons">local_mall</i></span>
                <span class="sidebar-normal">{{ __('Encomienda') }}</span>
              </a>
            </li>
            <li class="nav-item{{ $activePage == 'detalle_encomienda' ? ' active' : '' }}">
              <a class="nav-link" href="{{ route('detalle_encomienda.index') }}">
                <span class="sidebar-mini"><i class="material-icons">description</i></span>
                <span class="sidebar-normal">{{ __('Detalle de Encomienda') }}</span>                
              </a>
            </li>
          </ul>
        </div>
      </li>
      <li class="nav-item {{$activePage == 'itinerario' ? 'active' : '' }}">
        @if (auth()->user()->role_id == '2' ||  auth()->user()->role_id == '1')
        <a class="nav-link" data-toggle="collapse" href="#Itinerario" aria-expanded="false">
          <i class="material-icons">alt_route</i>
          <p>{{ __('Itinerario')}}
            <b class="caret"></b>
          </p>         
        </a>
        <div class="collapse" id="Itinerario">
          <ul class="nav">
            <li class="nav-item{{ $activePage == 'itinerario' ? ' active' : '' }}">
              <a class="nav-link" href="{{ route('itinerario.index') }}">
                <span class="sidebar-mini"><i class="material-icons">alt_route</i></span>
                <span class="sidebar-normal">{{ __('Itinerario') }}</span>
              </a>
            </li>
          </ul>
        </div>
        @endif
      </li>
      <li class="nav-item {{$activePage == 'pasajero' || $activePage == 'venta_pasaje_bus' || $activePage == 'venta_pasaje' ? 'active' : '' }}">
        <a class="nav-link" data-toggle="collapse" href="#Pasaje" aria-expanded="false">
          <i class="material-icons">task</i>
          <p>{{ __('Pasajes')}}
            <b class="caret"></b>
          </p>         
        </a>
        <div class="collapse" id="Pasaje">
          <ul class="nav">
            <li class="nav-item{{ $activePage == 'pasajero' ? ' active' : '' }}">
              <a class="nav-link" href="{{ route('pasajero.index') }}">
                <span class="sidebar-mini"><i class="material-icons">airline_seat_recline_extra</i></span>
                <span class="sidebar-normal">{{ __('Pasajero') }}</span>
              </a>
            </li>
            <li class="nav-item{{ $activePage == 'venta_pasaje' ? ' active' : '' }}">
              <a class="nav-link" href="{{ route('venta_pasaje.index') }}">
                <span class="sidebar-mini"><i class="material-icons">task</i></span>
                <span class="sidebar-normal">{{ __('Venta de Pasajes') }}</span>
              </a>
            </li>
           <!-- <li class="nav-item">
              <a class="nav-link" href="#">
                <span class="sidebar-mini">VPB</span>
                <span class="sidebar-normal"></span>
              </a>
            </li> -->
          </ul>
        </div>
      </li>
    </ul>
  </div>
</div>
