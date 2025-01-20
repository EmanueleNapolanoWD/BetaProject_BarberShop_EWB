<x-layout>
    <main>
        <section>
            <h2>Panoramica Dipendenti</h2>
            <div class="container">
                <div class="row">
                    @if($employees->isEmpty())
                    <p>Non ci sono dipendenti</p>
                    @else
                    @foreach($employees as $employee)
                    <div class="d-flex flex-row">
                    <p>{{$employee->name}}</p>
                    <p>{{$employee->status}}</p>
                    <p></p>

                    </div>
                    @endforeach
                    @endif
                </div>
            </div>
        </section>
        <section class="p-4">
            <livewire:add-employee :services="$services"/>
        </section>
    </main>
</x-layout>