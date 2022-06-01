@props(['place'])
<?php
$date = Carbon\Carbon::now();
$now = strtotime($date);
$userAgent = $_SERVER['HTTP_USER_AGENT'];
$response = Http::withHeaders([
    'domain' => 'her-i.no',
    'contact' => 'admin@her-i.no',
])
    ->withUserAgent($userAgent)
    ->acceptJson()
    ->get('https://api.met.no/weatherapi/nowcast/2.0/complete?lat=' . $place->lat . '&lon=' . $place->lon);
$obj = json_decode($response);

$time = Http::withHeaders([
    'domain' => 'her-i.no',
    'contact' => 'admin@her-i.no',
])
    ->withUserAgent($userAgent)
    ->acceptJson()
    ->get('https://api.met.no/weatherapi/sunrise/2.0/.json?date=' . $date->format('Y-m-d') . '&lat=' . $place->lat . '&lon=' . $place->lon . '&offset=+02:00');
$objTime = json_decode($time);

$sunrise = isset($objTime->location->time[0]->sunrise->time) ? 'Soloppgang: ' . date('H:i', strtotime($objTime->location->time[0]->sunrise->time)) : null;
$sunset = isset($objTime->location->time[0]->sunset->time) ? 'Solnedgang: ' . date('H:i', strtotime($objTime->location->time[0]->sunset->time)) : null;

$symbol_code = isset($obj->properties->timeseries[0]->data->next_1_hours->summary->symbol_code) ? $obj->properties->timeseries[0]->data->next_1_hours->summary->symbol_code : 'cloudy';
$weatherIcon = asset('assets/img/icons/weather/' . $symbol_code . '.svg');

$precipitation_rate = isset($obj->properties->timeseries[0]->data->instant->details->precipitation_rate) ? 'Nedbør: ' . $obj->properties->timeseries[0]->data->instant->details->precipitation_rate . ' mm' : null;
$air_temperature = isset($obj->properties->timeseries[0]->data->instant->details->air_temperature) ? $obj->properties->timeseries[0]->data->instant->details->air_temperature . '°' : null;
$wind_speed = isset($obj->properties->timeseries[0]->data->instant->details->wind_speed) ? $obj->properties->timeseries[0]->data->instant->details->wind_speed . ' m/s' : null;
?>
<div class="col-12">
    <div class="card h-md-100 mb-3">
        <div class="card-header d-flex flex-between-center pb-0">
            <h6 class="mb-0">Været her i {{ $place->title }}</h6>
            <div class="fs--2 float-end">
                <a href="https://api.met.no/" target="_blank">Data from MET Norway</a>
            </div>
        </div>
        <div class="card-body pt-2">
            <div class="row g-0 h-100 align-items-center">
                <div class="col">
                    <div class="d-flex align-items-center"><img class="me-3" src="{{ $weatherIcon }}" alt=""
                            height="60">
                        <div>
                            <div class="fs--2 fw-semi-bold">{{ $precipitation_rate }}</div>
                            <div class="fs--2 fw-semi-bold">{{ $sunrise }}</div>
                            <div class="fs--2 fw-semi-bold">{{ $sunset }}</div>
                        </div>
                    </div>
                </div>
                <div class="col-auto text-center ps-2">
                    <div class="fs-4 fw-normal font-sans-serif text-primary mb-1 lh-1">
                        {{ $air_temperature }}
                    </div>
                    <div class="fs--1 text-800">
                        {{ $wind_speed }}</div>
                </div>
            </div>

        </div>
    </div>
</div>
