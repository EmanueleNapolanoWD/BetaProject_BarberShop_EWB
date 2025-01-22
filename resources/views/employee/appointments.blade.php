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

                        @php
                        $foundAppointment = false;
                        @endphp
                        @foreach ($appointments as $appointment)
                        @php
                        $appointmentDate = $appointment->appointment_date->format('d-m-Y');
                        $startTime = $appointment->start;
                        $endTime = $appointment->end;
                        @endphp
                        @if ($hour >= $startTime && $hour <= $endTime && $appointmentDate==$date->format('d-m-Y'))
                            <td value="{{$date}}">
                                <span class="text-danger">{{ $appointment->name }}</span>
                            </td>
                            @php
                            $foundAppointment = true;
                            @endphp
                            @break
                            @endif
                            @endforeach
                            @if (!$foundAppointment)
                            <td value="{{$date}}">
                                <div value="{{$hour}}">
                                
                                    <a href="{{ route('create_reservation_from_employee',[$date->format('d-m-Y'),$hour]) }}">
                                        <button class="btn btn-success">Prenota</button>
                                    </a>
                                </div>
                            </td>
                            @endif

                            @endforeach
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </section>
    </main>
</x-layout>