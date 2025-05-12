<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Weather App</title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">

</head>
@extends('layouts.app')

<body>
    @section('content')
    <div>
        <h2>Weather App</h2>
        <label class="label" for="city">Enter city name</label>
        <form method="get" action="{{ route('weather') }}">
            <input type="text" name="city" class="input" placeholder="e.g., London" id="city"
                autocomplete="off" value="{{ $city }}" />
            <button type="submit" class="btn btn-default">Get Weather</button>
        </form>
    </div>
    @if ($error)
        <div class="alert" style="color: var(--accent-1); margin-top: 1em;">
            {{ $error }}
        </div>
    @elseif (!empty($weatherData))
        <h3>Weather in {{ $weatherData['name'] }}</h3>
        <table>
            <thead>
                <tr>
                    <th>Attributes</th>
                    <th>Values</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>Temperature</td>
                    <td>{{ $weatherData['main']['temp'] }} °C</td>
                </tr>
                <tr>
                    <td>Weather</td>
                    <td>{{ $weatherData['weather'][0]['description'] }}</td>
                </tr>
                <tr>
                    <td>Humidity</td>
                    <td>{{ $weatherData['main']['humidity'] }}%</td>
                </tr>
                <tr>
                    <td>Wind Speed</td>
                    <td>{{ $weatherData['wind']['speed'] }}m/s</td>
                </tr>
            </tbody>
        </table>
       
    @endif
    @endsection
</body>

</html>
