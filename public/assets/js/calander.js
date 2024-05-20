$(document).ready(function () {
    // Persiapkan data ujian untuk kalender
    var events = [];

    // Iterasi data ujian dari variabel JavaScript
    ujianData.forEach(function (item) {
        events.push({
            startDate: item.tanggal_ujian,
            endDate: item.tanggal_ujian,
            summary: item.judul,
        });
    });

    // Kirimkan data ujian ke kalender
    $("#calendar-doctor").simpleCalendar({
        fixedStartDay: 0,
        disableEmptyDetails: true,
        events: events,
    });
});
