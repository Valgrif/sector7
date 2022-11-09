<x-layout-user>
	<div class="container py-4">
        <div id='calendar'></div>
   </div>
     <script>
        $(document).ready(function () {

        var SITEURL = "{{ url('/') }}";

        $.ajaxSetup({
            headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') //firma
            }
        });

        var calendar = $('#calendar').fullCalendar({
                            editable: true,
                            events: SITEURL + "/app/calendar",
                            displayEventTime: false,
                            editable: true,
                            eventRender: function (event, element, view) {
                                if (event.allDay === 'true') {
                                        event.allDay = true;
                                } else {
                                        event.allDay = false;
                                }
                            },
                            selectable: true,
                            selectHelper: true,
                            select: function (start, end, allDay) {
                                var title = prompt('Event Title:');
                                if (title) {
                                    var start = $.fullCalendar.formatDate(start, "Y-MM-DD");
                                    var end = $.fullCalendar.formatDate(end, "Y-MM-DD");
                                    console.log('title');
                                    $.ajax({
                                        url: SITEURL + "/app/calendarAjax",
                                        data: {
                                            title: title,
                                            start: start,
                                            end: end,
                                            type: 'add'
                                        },
                                        type: "POST",
                                        success: function (data) {
                                            displayMessage("Evento Creado Exitosamente");

                                            calendar.fullCalendar('renderEvent',
                                                {
                                                    id: data.id,
                                                    title: title,
                                                    start: start,
                                                    end: end,
                                                    allDay: allDay
                                                },true);

                                            calendar.fullCalendar('unselect');
                                        }
                                    });
                                }
                            },
                            eventDrop: function (event, delta) {
                                var start = $.fullCalendar.formatDate(event.start, "Y-MM-DD");
                                var end = $.fullCalendar.formatDate(event.end, "Y-MM-DD");

                                $.ajax({
                                    url: SITEURL + '/app/calendarAjax',
                                    data: {
                                        title: event.title,
                                        start: start,
                                        end: end,
                                        id: event.id,
                                        type: 'update'
                                    },
                                    type: "POST",
                                    success: function (response) {
                                        displayMessage("Evento Actualizado Exitosamente");
                                    }
                                });
                            },
                            eventClick: function (event) {
                                var deleteMsg = confirm("¿Desea eliminar este Evento?");
                                if (deleteMsg) {
                                    $.ajax({
                                        type: "POST",
                                        url: SITEURL + '/app/calendarAjax',
                                        data: {
                                                id: event.id,
                                                type: 'delete'
                                        },
                                        success: function (response) {
                                            calendar.fullCalendar('removeEvents', event.id);
                                            displayMessage("Evento Eliminado Exitosamente");
                                        }
                                    });
                                }
                            }

                        });

        });

        function displayMessage(message) {
            toastr.success(message, 'Event');
        }

     </script>
</x-layout-user>
