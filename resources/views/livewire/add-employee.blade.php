<div class="container">
    @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif
    <div>
        @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
        @endif
    </div>
    <div class="row d-flex align-items-center justify-content-center">
        <div class="col-12">
            <h4 class="text-center">Aggiungi dipendente</h4>
        </div>
        <div class="col-11 col-md-6 p-5">
            <form wire:submit='store' method="POST">
                @csrf
                <select wire:model='user' id="">
                    @foreach($usersEmployee as $user)
                    <option value="{{$user->id}}">
                        {{$user->name}}
                    </option>
                    @endforeach
                </select>
                <div class=" d-flex flex-column align-items-center justify-content-center my-3">
                    <label for="employee_speciality">Specialità</label>
                    <select wire:model='service_id' id="">
                        @foreach($services as $service)
                        <option value="{{$service->id}}">{{$service->name}}</option>
                        @endforeach
                    </select>
                </div>
                <div class=" d-flex flex-column align-items-center justify-content-center my-3">
                    <button class="btn btn-primary" type="submit">Add Employee</button>
                </div>
            </form>
        </div>
    </div>
</div>