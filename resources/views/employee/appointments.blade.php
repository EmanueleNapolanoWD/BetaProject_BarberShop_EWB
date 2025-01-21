<x-layout>
    <main>
        <section>
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>Orari</th>
                        @foreach ($dates as $date)
                        <th>{{ $date->format('d/m/Y') }}</th>
                        @endforeach
                    </tr>
                </thead>
                <tbody>
                    @foreach ($hours as $hour)
                    <tr>
                        <td>{{ $hour }}</td>
                        @foreach ($dates as $date)
                        <td>
                            @php
                            $matchingAppointments = $appointments->filter(function($appointment) use ($hour, $date) {
                            return $appointment->appointment_time == $hour && $appointment->appointment_date->isSameDay($date);
                            });
                            @endphp
                            @if ($matchingAppointments->isNotEmpty())
                            <!-- Mostra tutti gli appuntamenti corrispondenti -->
                            @foreach ($matchingAppointments as $appointment)
                            <span class="text-danger">{{ $appointment->name }}</span><br>
                            @endforeach
                            @else
                            <button class="btn btn-success">Prenota</button>
                            @endif
                        </td>
                        @endforeach
                    </tr>
                    @endforeach
                </tbody>
            </table>

        </section>
    </main>
</x-layout>