<div>
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
    <form wire:submit='store' method="POST">
        @csrf
        @if(!Auth::check())
        <div>
            <label for="name">Nome</label>
            <input type="text" wire:model='name' id="">
            <div class="error">
                @error('name')
                <span class="text-danger">{{$message}}</span>
                @enderror
            </div>
        </div>
        <div>
            <label for="name">Phone</label>
            <input type="tel" wire:model='cellphone' id="">
            <div class="error">
                @error('cellphone')
                <span class="text-danger">{{$message}}</span>
                @enderror
            </div>
        </div>
        <div>
            <label for="name">E-mail</label>
            <input type="email" wire:model='email' id="">
            <div class="error">
                @error('email')
                <span class="text-danger">{{$message}}</span>
                @enderror
            </div>
        </div>
        <div>
            <label for="name">Barbiere</label>
            <select wire:model='employee_id' id="">
                @foreach ($employees as $employee)
                <option value="{{$employee->id}}">{{$employee->name}}</option>
                @endforeach
            </select>
        </div>
        <div>
            <label for="name">Servizio</label>
            <select wire:model='service_id' id="">
                @foreach ($services as $service)
                <option value="{{$service->id}}">{{$service->name}}</option>
                @endforeach
            </select>
        </div>
        <div>
            <label for="name">Data</label>
            <input type="datetime-local" name="employee" wire:model='appointment_date' id="">
        </div>
        @else
        <div>
            <label for="name">Barbiere</label>
            <select wire:model='employee_id' id="">
                @foreach ($employees as $employee)
                <option value="{{$employee->id}}">{{$employee->name}}</option>
                @endforeach
            </select>
            <div class="error">
                @error('employee_id')
                <span class="text-danger">{{$message}}</span>
                @enderror
            </div>
        </div>
        <div>
            <label for="name">Servizio</label>
            <select wire:model='service_id' id="">
                @foreach ($services as $service)
                <option value="{{$service->id}}">{{$service->name}}</option>
                @endforeach
            </select>
            <div class="error">
                @error('service_id')
                <span class="text-danger">{{$message}}</span>
                @enderror
            </div>
        </div>
        <div>
            <label for="name">Data</label>
            <input type="datetime-local" name="employee" wire:model='appointment_date' id="">
        </div>
        @endif
        <button type="submit" class="btn btn-dark">Prenota</button>
    </form>
</div>