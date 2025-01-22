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
            <select wire:model='service_id' id="">
                <option value="null">Scegli servizio</option>
                @foreach ($services as $service)
                <option value="{{$service->id}}">{{$service->name}}</option>
                @endforeach
            </select>
        </div>
        <button type="submit" class="btn btn-dark">Prenota</button>
    </form>
</div>