var dateParse = function($date) {
    $parse = Date.parse($date);
    $date = new Date($parse);
    $time = $date.toLocaleString("UTC", {
        hour: "numeric",
        minute: "numeric",
        hour12: true
    });
    $month = $date.toLocaleString("default", { month: "long" });
    $year = $date.getFullYear();
    $day = $date.getDate();

    $data = {
        date: `${$day} ${$month} ${$year}`,
        time: `${$time}`
    };
    return $data;
};
