<div class="navbar-nav align-items-center">
    <div class="nav-item d-flex align-items-center">
      <i class="bx bx-search fs-4 lh-0"></i>
      <input
        type="text"
        class="form-control border-0 shadow-none"
        placeholder="Recherche..."
        wire:model.debounce.500ms="search"
      />
    </div>
    
  </div>
  <div class="absolute border bg-gray-100 text-md w-56 mt-1">
  @if(strlen($search) )
    <div>
        @if(count($users)> 0)
        @foreach ($users as $user)
            <p>
                {{$user->nom}}
                {{$user->prenom}}
            </p>
        @endforeach
       @endif
    </div>
    @endif
</div>