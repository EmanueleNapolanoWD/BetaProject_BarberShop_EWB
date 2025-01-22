<div>
    <div>
        @if (session()->has('error'))
        <div class="alert alert-danger">
            {{ session('error') }}
        </div>
        @endif

        @if (session()->has('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
        @endif
    </div>
    <form wire:submit='store' method="POST" id="formReservation">
        @csrf
        @if(!Auth::check())
        <div>
            <label for="name">Nome
                <input type="text" wire:model='name' id="">
            </label>
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
            <label for="employee">Barbiere</label>
            <select wire:model='employee_id' id="">
                @foreach ($employees as $employee)
                <option value="{{$employee->id}}">{{$employee->name}}</option>
                @endforeach
            </select>
        </div>
        <div>
            <label for="service_id">Servizio</label>
            <select wire:model='service_id' id="">
                @foreach ($services as $service)
                <option value="{{$service->id}}">{{$service->name}}</option>
                @endforeach
            </select>
        </div>
        <div>
            <label for="data">Data</label>
            <input type="date" name="employee" wire:model='appointment_date' id="">
        </div>
        <div>
            <label for="time">Time</label>
            <select wire:model='appointment_time' id="">
                @foreach ($hours as $hour)
                <option value="{{$hour}}">{{$hour}}</option>
                @endforeach
            </select>
        </div>
        @elseif (Auth::user()->role == 'employee')
        <div>
            <label for="name">Nome
                <input type="text" wire:model='name' id="">
            </label>
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
            <label for="service_id">Servizio</label>
            <select wire:model='service_id' id="" disabled>
                @foreach ($services as $service)
                <option value="{{$service->id}}">{{$service->name}}</option>
                @endforeach
            </select>
        </div>
        <div>
            <label for="data">Data</label>
            <input type="date" name="employee" wire:model='appointment_date' id="">
        </div>
        <div>
            <label for="time">Time</label>
            <select wire:model='appointment_time' id="">
                @foreach ($hours as $hour)
                <option value="{{$hour}}">{{$hour}}</option>
                @endforeach
            </select>
        </div>
        @else
        <div>
            <label for="employee">Barbiere</label>
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
            <label for="service_id">Servizio</label>
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
            <label for="data">Data</label>
            <input type="date" name="employee" wire:model='appointment_date' id="">
        </div>
        <div>
            <label for="time">Time</label>
            <select wire:model='appointment_time' id="">
                @foreach ($hours as $hour)
                <option value="{{$hour}}">{{$hour}}</option>
                @endforeach
            </select>
        </div>
        @endif
        <button type="submit" class="btn btn-dark">Prenota</button>
    </form>
</div>