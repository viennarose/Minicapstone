<x-admin-layout>
    <livewire:admin.appointments.index>
</x-admin-layout>

@section('script')
<script>
    window.addEventListener('close-modal', event => {
        $('#appointmentModal').modal('hide');
        $('#updateAppointmentModal').modal('hide');
        $('#deleteAppointmentModal').modal('hide');
    });
    </script>

    <script>
        jQuery.datetimepicker.setDateFormatter('moment')
        $('#picker').datetimepicker({
            timepicker: true,
            datepicker:true,
            format: 'YYYY-MM-DD H:mm',
            hours12: false,
            step: 30,
            disabledWeekDays:[6, 0],
            todayBtn: true,
            minTime:'8:00',
            maxTime:'17:00',
            //disableDate:[''],
            //timeHeightInTimePicker: 25,
            minDate: new Date(),
            todayButton:true,
            scrollTime:true,
            minDateTime:true,

        })
        $('#toggle').on('click', function(){
            $('#picker').datetimepicker('toggle')
        })
        $('#picker').on("change.datetimepicker", function (e){
            let date = $(this).data('appointmentdate');
            //console.log(date);
            eval(date).set('schedule', $('#appointmentSched').val());

        })
    </script>
@endsection